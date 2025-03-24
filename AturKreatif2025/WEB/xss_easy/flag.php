<?php
session_start();

if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST'])) {
    http_response_code(403);
    die("<style>body { background: #0d0d0d; height: 100vh; margin: 0; display: flex; justify-content: center; align-items: center; } .container { max-width: 600px; background: rgba(20, 20, 20, 0.95); padding: 30px; border-radius: 10px; box-shadow: 0 0 15px #00ffcc; text-align: center; color: #00ffcc; font-family: 'Courier New', Courier, monospace; }</style><body><div class='container'><h2>Access Denied</h2><p>Haha, don't try to cheat! 😉</p></div></body>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flag Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            background: #0d0d0d;
            color: #fff;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            width: 100%;
        }

        .container {
            max-width: 600px;
            background: rgba(20, 20, 20, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px #00ffcc;
            text-align: center;
        }

        h2,
        p {
            color: #ffffff !important;
            /* Warna putih */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Congratulations!</h2>
        <p>Here is your flag:</p>
        <div class="alert alert-success"><strong>Flag:</strong> AKCTF25{54y_hy3_t0_cr0s5_s!t3_scr!pt!ng}</div>
    </div>
</body>

</html>