<?php
require_once "conn.php";

if(isset($_POST['email']) && isset($_POST['tour'])){
    $email = $conn->real_escape_string($_POST['email']);
    $tour = $conn->real_escape_string($_POST['tour']);
    
    $sql = "INSERT INTO bookings (email, tour) VALUES ('$email', '$tour')";
    if($conn->query($sql)){
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
