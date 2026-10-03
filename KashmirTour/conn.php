<?php
$host = "sql212.infinityfree.com";   // Database Host from InfinityFree
$user = "if0_40181202";              // Database Username
$pass = "YOUR_DB_PASSWORD";          // Database Password (not vPanel password)
$db   = "if0_40181202_epiz_40177598_kashmir";     // Database Name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

