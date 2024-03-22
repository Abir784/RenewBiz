<?php
session_start();
include '../db.php';
$id = $_GET['id'];
$user_id=$_SESSION['login_user_id'];
$cart_select_query="SELECT * FROM buyer WHERE user_id='$user_id'";
$buyer_cart_select_query_result=mysqli_query($dbconnect,$cart_select_query);
$buyer_cart=mysqli_fetch_assoc($buyer_cart_select_query_result);
$bid=$buyer_cart['id'];
$quantity=1;
date_default_timezone_set('Asia/Dhaka');
$created_at = date("d-m-y h:i:s");
$query = "INSERT INTO carts(product_id,quantity,buyer_id,created_at) VALUES('$id','$quantity','$bid''$created_at')";
$insert_query_result = mysqli_query($dbconnect,$query);
$_SESSION['success']='Added Successfully';
header('location:../add_to_cart.php?id='.$id);

?>