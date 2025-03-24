<?php
session_start(); // Gunakan session untuk authentication

$servername = "db";
$username = "root";
$password = "root";
$dbname = "sqli_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
