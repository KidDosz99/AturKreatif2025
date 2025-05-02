from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

users = {
    "1": {"name": "Ahmad", "class": "5 Alpha", "age": "17"},
    "2": {"name": "Siti", "class": "5 Beta", "age": "17"},
    "3": {"name": "Ali", "class": "4 Gamma", "age": "16"},
    "4": {"name": "Farah", "class": "4 Delta", "age": "16"},
    "5": {"name": "Zain", "class": "5 Epsilon", "age": "17"},
    "15": {"name": "Hakim", "class": "5 Alpha", "age": "17"},
    "114": {"name": "k!dd05z", "class": "Superuser", "age": "N/A", "flag": "AKCTF25{4cc355_w17h0u7_p3rm15510n}"}
}

@app.route("/api/user", methods=["GET"])
def get_user():
    user_id = request.args.get("id")
    if user_id in users:
        return jsonify(users[user_id])
    return jsonify({"error": "User not found"}), 404

# ✅ Disable cache for all responses
@app.after_request
def add_headers(response):
    response.headers["Cache-Control"] = "no-store, no-cache, must-revalidate, max-age=0"
    response.headers["Pragma"] = "no-cache"
    response.headers["Expires"] = "0"
    return response

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8002)

