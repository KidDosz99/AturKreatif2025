<?php

$secret = 's3cr3t_k3y_j4w5_un1v3rs4l';

if (isset($_COOKIE['JWT'])) {
    $jwtParts = explode('.', $_COOKIE['JWT']);

    if (count($jwtParts) === 3) {
        list($base64UrlHeader, $base64UrlPayload, $base64UrlSignature) = $jwtParts;

        $header = json_decode(base64_decode(strtr($base64UrlHeader, '-_', '+/')), true);
        $payload = json_decode(base64_decode(strtr($base64UrlPayload, '-_', '+/')), true);
        $signature = base64_decode(strtr($base64UrlSignature, '-_', '+/'));
        $expectedSignature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $secret, true);

        if (is_array($payload) && isset($payload['role'])) {
            if (hash_equals($signature, $expectedSignature) && $payload['role'] === 'admin') {
                showPage("Welcome admin! Here is the flag: <br> AKCTF25{j4ws_4t_univ3rs4l_studi0_j4p4n_w4s_4m4zing}");
            } elseif ($payload['role'] === 'admin') {
                showPage("You are not admin. admin know the password");
            } elseif ($payload['role'] === 'user') {
                showUserPage();
            } else {
                setUserJWT($secret);
            }
        } else {
            showUserPage(); // fallback to user if no role
        }
    } else {
        showUserPage(); // malformed JWT
    }
} else {
    setUserJWT($secret);
}

function setUserJWT($secret)
{
    $jwt = generateJWT(['role' => 'user'], $secret);
    setcookie('JWT', $jwt, time() + (86400 * 30), "/");
    showUserPage();
}

function showPage($message)
{
    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>JaWsTsss</title>
    <!-- my sign is: s3cr3t_k3y_j4w5_un1v3rs4l -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            background-image: url("j4wstzzz.png");
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-middle">
        <h2 class="w3-animate-top w3-large" style="text-align:center; color:white;">
            $message
        </h2>
        <hr class="w3-border-white" style="margin:auto;width:100%">
    </div>
    <div class="w3-display-bottomleft w3-padding-large">
        <a style="color: white;">Made by k!dd05z</a>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
HTML;
}

function showUserPage()
{
    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>JaWsTsss</title>
    <!-- my sign is: s3cr3t_k3y_j4w5_un1v3rs4l -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            background-image: url("j4wstzzz.png");
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-middle">
        <h2 class="w3-jumbo w3-animate-top" style="text-align: center; color: white;">Only admin get the flag</h2>
        <p class="w3-large w3-center" style="color: white;">Have you guys gone to Universal Studio Japan? There is this attraction called JaWs.</p>
        <p class="w3-xlarge" style="text-align: center;">
            <form action="https://www.youtube.com/watch?v=ILNWBtPxcro" method="post" target="_blank">
                <button type="submit" class="w3-button w3-round w3-black w3-opacity w3-hover-opacity-off" style="padding:8px 60px;">Flag</button>
            </form>
        </p>
    </div>
    <div class="w3-display-bottomleft w3-padding-large">
        <a style="color: white;">Made by k!dd05z</a>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
HTML;
}

function generateJWT($payload, $secret)
{
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode(json_encode($payload)));
    $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $secret, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
}
