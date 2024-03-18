<?php
session_start();
require '../db.php';
$email=$_POST['email'];
$password=$_POST['password'];
$select_query="SELECT * FROM user WHERE email='$email'";
$select_query_result=mysqli_query($dbconnect,$select_query);
$after_assoc= mysqli_fetch_assoc($select_query_result);
$num_rows=mysqli_num_rows($select_query_result);



if ($num_rows==1){
    if(password_verify($password,$after_assoc['password'])){
        $_SESSION['login_user_id']=$after_assoc['id'];
        $_SESSION['log_in']='login succesfully';
        $_SESSION['login_done'] = $after_assoc['role'];
        $_SESSION['role']='role check';
        header('location:../dashboard/dashboard.php');
    }else{
        $_SESSION['error']='Incorrect pass Credentials';
        header('location:login.php');
        
    }
}else{
    $_SESSION['error']='Incorrect email Credentials';
    header('location:login.php');
    
}
?>