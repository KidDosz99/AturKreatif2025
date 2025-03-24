<?php
if (isset($_POST['comment'])) {
    $comment = $_POST['comment']; // Tiada sanitization - Terdedah kepada XSS
} else {
    $comment = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H4ck3r Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #0d0d0d;
            color: #fff;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 700px;
            background: rgba(20, 20, 20, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px #00ffcc;
            text-align: center;
        }

        .comment-box {
            background: #1a1a1a;
            color: #00ffcc;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .btn-primary {
            background-color: #00ffcc;
            border: none;
        }

        .btn-primary:hover {
            background-color: #009977;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>H4ck3r Forum</h2>
        <p>Join the discussion and share your hacking knowledge ^^</p>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="comment" class="form-label">Your sharing:</label>
                <textarea class="form-control bg-dark text-light" id="comment" name="comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Post Comment</button>
        </form>

        <?php if (!empty($comment)) : ?>
            <div class="comment-box">
                <strong>User:</strong> <span id="user-comment"><?php echo $comment; ?></span>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(() => {
            if (document.getElementById('user-comment').innerHTML.includes('<script>')) {
                fetch('flag.php')
                    .then(response => response.text())
                    .then(flag => {
                        document.body.innerHTML += `<div class='container mt-3'><div class='alert alert-success text-center' role='alert'><strong>Flag:</strong> ${flag}</div></div>`;
                    });
            }
        }, 500);
    </script>
</body>

</html>