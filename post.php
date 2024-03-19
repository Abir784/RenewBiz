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
        header('location:buyer_reg.php'); 
        
    }else{
        date_default_timezone_set('Asia/Dhaka');
        $created_at = date("d-m-y h:i:s");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO user (email, password, role,created_at) VALUES ('$email', '$hashed_password', 2,'$created_at')";
        $insert_result = mysqli_query($dbconnect, $insert_query);
        

    if ($insert_result) {
        $_SESSION['success']='Signup successful! You can now login.';
        header('location:../dashboard/dashboard.php'); 
    } else {
        $_SESSION['error1'] = 'Signup failed. Error: ';
        header('location:buyer_reg.php'); 
        
    }

    }

    
} else {
    header('location:buyer_reg.php');
    
}
?>