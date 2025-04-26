from flask import Flask, render_template, render_template_string, request, session, redirect, url_for, abort
import sqlite3
import secrets
import hashlib
import os

app = Flask(__name__)
app.secret_key = secrets.token_hex(32)

def get_db():
    conn = sqlite3.connect('users.db')
    conn.row_factory = sqlite3.Row
    return conn

def init_db():
    conn = get_db()
    c = conn.cursor()
    c.execute('''CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NULL)''')
    
    c.execute('''CREATE TABLE IF NOT EXISTS posts (
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        user_id INTEGER NOT NULL, 
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users (id)
    )''')
    
    # Add replies table
    c.execute('''CREATE TABLE IF NOT EXISTS replies (
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        post_id INTEGER NOT NULL, 
        user_id INTEGER NOT NULL, 
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES posts (id),
        FOREIGN KEY (user_id) REFERENCES users (id)
    )''')

    admin_pass = secrets.token_hex(16) 
    admin_hash = hashlib.sha256(admin_pass.encode()).hexdigest()
    
    c.execute('INSERT OR IGNORE INTO users (username, password) VALUES (?, ?)',
              ('admin', admin_hash))
    
    conn.commit()
    conn.close()

@app.route('/')
def home():
    conn = get_db()
    c = conn.cursor()
    
    c.execute('''
        SELECT p.id, p.title, p.created_at, u.username,
               (SELECT COUNT(*) FROM replies WHERE post_id = p.id) as reply_count
        FROM posts p
        JOIN users u ON p.user_id = u.id
        ORDER BY p.created_at DESC
        LIMIT 10
    ''')
    posts = c.fetchall()
    
    conn.close()
    return render_template('home.html', posts=posts)

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        
        conn = get_db()
        c = conn.cursor()
        
        try:
            c.execute("INSERT INTO users (username, password) VALUES (?, ?)",
                     [username, password])
            conn.commit()
            conn.close()
            return redirect(url_for('login'))
        except sqlite3.IntegrityError:
            conn.close()
            error = "Username already exists"
            return render_template('register.html', error=error)
    
    return render_template('register.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        
        conn = get_db()
        c = conn.cursor()
        c.execute("SELECT * FROM users WHERE username = ? AND password = ?", [username, password])
        user = c.fetchone()
        conn.close()
        
        if user:
            session['user_id'] = user['id']
            session['username'] = user['username']
            return redirect(url_for('home'))
        else:
            error = "Invalid username or password"
            return render_template('login.html', error=error)
    
    return render_template('login.html')

@app.route('/logout')
def logout():
    session.clear()
    return redirect(url_for('home'))

@app.route('/create_post', methods=['GET', 'POST'])
def create_post():
    if 'user_id' not in session:
        return redirect(url_for('login'))
    
    if request.method == 'POST':
        title = request.form['title']
        content = request.form['content']
        
        conn = get_db()
        c = conn.cursor()
        
        c.execute('''
            INSERT INTO posts (user_id, title, content)
            VALUES (?, ?, ?)
        ''', [session['user_id'], title, content])
        
        conn.commit()
        conn.close()
        
        return redirect(url_for('home'))
    
    return render_template('create_post.html')

@app.route('/post/<int:post_id>')
def view_post(post_id):
    conn = get_db()
    c = conn.cursor()
    
    # Get the post
    c.execute('''
        SELECT p.*, u.username
        FROM posts p
        JOIN users u ON p.user_id = u.id
        WHERE p.id = ?
    ''', [post_id])
    post = c.fetchone()
    
    if not post:
        conn.close()
        abort(404)
    
   # Get replies for this post
    c.execute('''
        SELECT r.*, u.username
        FROM replies r
        JOIN users u ON r.user_id = u.id
        WHERE r.post_id = ?
        ORDER BY r.created_at ASC
    ''', [post_id])
    replies = c.fetchall()
    
    conn.close()
    return render_template('post.html', post=post, replies=replies)

@app.route('/reply/<int:post_id>', methods=['POST'])
def reply(post_id):
    if 'user_id' not in session:
        return redirect(url_for('login'))
    
    content = request.form['content']
    
    if not content.strip():
        return redirect(url_for('view_post', post_id=post_id))
    
    conn = get_db()
    c = conn.cursor()
    
    # Check if post exists
    c.execute("SELECT id FROM posts WHERE id = ?", [post_id])
    post = c.fetchone()
    
    if not post:
        conn.close()
        abort(404)
    
    # Add the reply
    c.execute('''
        INSERT INTO replies (post_id, user_id, content)
        VALUES (?, ?, ?)
    ''', [post_id, session['user_id'], content])
    
    conn.commit()
    conn.close()
    
    return render_template_string(f'''
        {{% extends "base.html" %}}
        {{% block content %}}
        <div class="nav">
            <a href="/">KiddoszForums</a>
            <a href="/post/{post_id}">Back to Post</a>
        </div>
        
        <div class="header-section">
            <h2>Reply Submitted</h2>
        </div>
        
        <div class="info-box">
            <p>Your reply has been posted:</p>
            <div class="post-content">
                <div class="post-body">
                    {content}
                </div>
            </div>
            <p>You will be redirected to the post in 1 seconds...</p>
        </div>
        
        <script>
            setTimeout(function() {{
                window.location.href = "/post/{post_id}";
            }}, 1000);
        </script>
        {{% endblock %}}
    ''')


@app.route('/admin')
def admin():
    flag_section = ''
    if session.get('username') == 'admin':
        flag = os.getenv('DYN_FLAG', 'AKCTF25{j1nj4_0wn3d_4g41n}')
        flag_section = f'<div class="admin-section"><h3>Admin Section</h3><p>Flag: {flag}</p></div>'
    return render_template('admin.html', flag_section=flag_section)

if __name__ == '__main__':
    init_db()
    app.run(host='0.0.0.0',debug=True)
