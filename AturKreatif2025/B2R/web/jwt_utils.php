<?php
function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
    return base64_decode(strtr($data, '-_', '+/'));
}

function generate_jwt($payload, $secret = 'usim-berjanji-pada-ibunda---2025') {
    $header = ['alg' => 'HS256', 'typ' => 'JWT'];

    $segments = [
        base64url_encode(json_encode($header)),
        base64url_encode(json_encode($payload))
    ];

    $signature = hash_hmac('sha256', implode('.', $segments), $secret, true);
    $segments[] = base64url_encode($signature);

    return implode('.', $segments);
}

function validate_jwt($token, $secret = 'usim-berjanji-pada-ibunda---2025') {
    $parts = explode('.', $token);

    if (count($parts) !== 3) return false;

    list($header64, $payload64, $signature64) = $parts;
    $signature_check = base64url_encode(hash_hmac('sha256', "$header64.$payload64", $secret, true));

    if (!hash_equals($signature64, $signature_check)) return false;

    return json_decode(base64url_decode($payload64), true);
}
