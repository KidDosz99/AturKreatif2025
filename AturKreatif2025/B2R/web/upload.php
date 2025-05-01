<?php
include 'auth.php';

function isAllowed($filename) {
    // ✅ Allow only if ends with .php.jpg or .php.jpeg or .php.png
    return preg_match('/\.php\.(jpg|jpeg|png)$/i', $filename);
}

if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];

    if (!isAllowed($filename)) {
        $msg = "<span class='text-danger'>❌ Invalid file extension.</span>";
    } else {
        $target = "uploads/" . basename($filename);
        move_uploaded_file($_FILES['file']['tmp_name'], $target);
        $msg = "✅ File uploaded: <a href='$target' class='link-info'>$target</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-info">📂 Upload Panel</h2>
        <p class="text-muted">Only agents who know the trick can upload their tools.</p>
        <?php if (isset($msg)) echo "<div class='alert alert-warning'>$msg</div>"; ?>
        <form method="post" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <input type="file" name="file" class="form-control">
            </div>
            <input type="submit" value="Upload" class="btn btn-outline-info">
            <a href="index" class="btn btn-outline-secondary ms-2">← Back</a>
        </form>
    </div>
</body>
</html>
