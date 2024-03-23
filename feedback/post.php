<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    
    
    $sql = "INSERT INTO feedback (email, password, rating, comment) VALUES ('$email', '$password', '$rating', '$comment')";
    
    if (mysqli_query($dbconnect, $sql)) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbconnect);
    }
}
?>