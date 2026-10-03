<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

require_once "conn.php";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=bookings.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Email', 'Tour', 'Submitted At'));

$result = $conn->query("SELECT * FROM bookings");

while($row = $result->fetch_assoc()){
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
