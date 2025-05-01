<?php
if (isset($_GET['file'])) {
    $file = $_GET['file']; // TAK GUNA basename() — allow traversal
    $base_path = __DIR__ . "/documents/";
    $full_path = realpath($base_path . $file);
    $flag_path = realpath("/var/www/secret_files/PT_flag.txt");

    // ✅ Case 1: File in documents/ folder
    if ($full_path && str_starts_with($full_path, realpath($base_path)) && file_exists($full_path)) {
        echo "<div class='container mt-5 text-center'><pre>" . htmlspecialchars(file_get_contents($full_path)) . "</pre></div>";
    }
    // ✅ Case 2: Exact path to flag (via traversal)
    elseif (realpath($file) === $flag_path || realpath($base_path . $file) === $flag_path) {
        echo "<div class='container mt-5 text-center'><pre>FLAG: " . file_get_contents($flag_path) . "</pre></div>";
    }
    // ❌ Invalid or outside allowed area
    else {
        echo "<div class='container mt-5 text-center'><p class='text-danger'>File not found or not allowed.</p></div>";
    }
} else {
    echo "<div class='container mt-5 text-center'><p class='text-warning'>No file specified.</p></div>";
}
?>

