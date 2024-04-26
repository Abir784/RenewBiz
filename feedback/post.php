<?php
session_start();
include '../db.php';
$user_id =$_SESSION['login_user_id'];

$check_query = "SELECT * FROM buyer WHERE user_id = '$user_id'";
$check_result = mysqli_query($dbconnect, $check_query);
$after_assoc= mysqli_fetch_assoc($check_result);
$product_id = $_POST['product_id'];
$comment = $_POST['comment'];
$rating = $_POST['rate'];
$buyer_id =$after_assoc['id'];
date_default_timezone_set('Asia/Dhaka');
$created_at = date("y-m-d h:i:s");
$field_names = ["comment"=>"do comment", "rate"=>"rating required"];
$error =[];

foreach($field_names as $key=>$value){
    if (empty($_POST[$key])){
        $error[$key] = $value;
        }
    }

    if(count($error)==0){
        $insert_query = "INSERT INTO buyer_feedback(buyer_id, product_id, comment, rating, created_at) VALUES ('$buyer_id','$product_id','$comment',$rating, '$created_at')";
        $insert_query_result =mysqli_query($dbconnect,$insert_query);
        $_SESSION['success']='feedback inserted';
        header('location:../add_to_cart.php?id='.$product_id);

    }else{
        $_SESSION['error']=$error;
        header('location:../add_to_cart.php?id='.$product_id);
    }



?>