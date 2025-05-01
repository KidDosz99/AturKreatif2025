<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flag - SQLi Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="flag.css">
</head>

<body>
    <!-- <div class="quote-container">
        <p class="moving-quote">🏁 "You’ve made it through time and flaws. But can you find them all?"</p>
    </div> -->

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card flag-card">
            <h2>Congratulations!</h2>
            <p class="flag-text">Your flag is:</p>
            <div class="flag-box">AKCTF25{W3lc0m3_t0_SQL_1nj3ct10n_sh33sh}</div>
        </div>
    </div>
</body>

</html>