<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5 text-center">
        <h1 class="display-5 fw-bold text-info">Welcome, Agent</h1>
        <p class="lead">Access your upload control panel below.</p>
        <a href="upload" class="btn btn-outline-info me-2">🔗 Go to Upload</a>
        <a href="logout" class="btn btn-outline-danger">🚪 Logout</a>
    </div>
</body>
</html>
