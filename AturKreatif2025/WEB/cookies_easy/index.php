<?php
$flag = "AKCTF25{ch0c_ch1p_c00k13s_4r3_my_fav0ur1t3}";
$showFlag = false;

if (isset($_COOKIE['C0||oo||keys']) && ($_COOKIE['C0||oo||keys'] === 'true' || $_COOKIE['C0||oo||keys'] === '1')) {
    $showFlag = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C0||oo||keys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #ffcc80;">
    <div class="container text-center">
        <h1 id="typing-text" class="mb-4"></h1>

        <?php if ($showFlag): ?>
            <div class="alert alert-success mt-3">🎉 Congrats! Here is your flag: <strong><?php echo $flag; ?></strong></div>
        <?php endif; ?>
    </div>
    <script src="script.js"></script>
</body>

</html>