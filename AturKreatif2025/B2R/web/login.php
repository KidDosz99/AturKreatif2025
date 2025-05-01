<?php
session_start();
include 'jwt_utils.php';

// Auto issue JWT if not exist
if (!isset($_COOKIE['magic-token'])) {
    $payload = ['user' => 'guest'];
    $token = generate_jwt($payload);
    setcookie('magic-token', $token, time() + 3600, "/");
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_COOKIE['magic-token'])) {
        $error = "Token missing.";
    } else {
        $payload = validate_jwt($_COOKIE['magic-token']);
        if ($payload && isset($payload['user']) && $payload['user'] === 'admin') {
            $_SESSION['loggedin'] = true;
            header("Location: index");
            exit;
        } else {
            $error = "Unauthorized | usim-berjanji-pada-ibunda---2025";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Secure Zone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-black text-light">
    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="card shadow-lg bg-dark border-info" style="width: 22rem;">
            <div class="card-body">
                <h3 class="card-title text-center text-info">🔐 Agent Login</h3>
                <?php if (isset($error)) { echo "<div class='alert alert-danger mt-3'>$error</div>"; } ?>
                <form method="post" class="mt-4">
                    <input type="submit" value="Login" class="btn btn-info w-100">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
