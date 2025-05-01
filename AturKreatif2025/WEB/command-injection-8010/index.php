<?php
$flag = '';
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    $os = PHP_OS_FAMILY;

    // Execute from /tmp so ls doesn't reveal web files
    if ($os === 'Windows') {
        $output = shell_exec("ping -n 1 " . $ip);
    } else {
        $output = shell_exec("cd /tmp && ping -c 1 " . $ip);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Internal Package Tracker</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background-image: url('background.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .bg-blur {
      background-color: rgba(0, 0, 0, 0.75);
      border-radius: 10px;
      box-shadow: 0 0 30px rgba(0,0,0,0.6);
      padding: 2rem;
      width: 90%;
      max-width: 600px;
    }

    .title {
      text-align: center;
      color: rgba(255, 255, 255, 0.85);
      margin-bottom: 2rem;
    }

    label {
      color: #fff;
    }

    h5 {
      color: #ffc107;
    }
  </style>
</head>
<body>
  <div class="bg-blur">
    <div class="title">
      <h3>📦 Internal Package Tracker</h3>
      <p class="small">Track the location of internal delivery routes across branches.</p>
    </div>

    <form method="GET">
      <label for="ip">Enter Delivery Node IP Address:</label>
      <input type="text" name="ip" class="form-control my-3" placeholder="e.g. 10.10.10.1">
      <button type="submit" class="btn btn-warning w-100">Track Package</button>
    </form>

    <?php if (!empty($output)): ?>
      <hr class="border-light">
      <h5>Tracking Response:</h5>
      <pre class="bg-dark p-3 text-light rounded"><?php echo htmlspecialchars($output); ?></pre>
    <?php endif; ?>
  </div>
</body>
</html>
