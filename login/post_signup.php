<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_query = "SELECT * FROM user WHERE email = '$email'";
    $check_result = mysqli_query($dbconnect, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error1'] = 'Signup failed. Email already exists.';
        header('location:signup.php'); 
        
    }else{

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO user (email, password, role) VALUES ('$email', '$hashed_password', 1)";
        $insert_result = mysqli_query($dbconnect, $insert_query);

    if ($insert_result) {
        $_SESSION['success']='Signup successful! You can now login.';
        header('location:../dashboard/dashboard.php'); 
    } else {
        $_SESSION['error1'] = 'Signup failed. Error: ';
        header('location:signup.php'); 
        
    }

    }

    
} else {
    header('location:signup.php');
    
}
?>
