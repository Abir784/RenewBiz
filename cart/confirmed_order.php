<?php
session_start();
include '../db.php';

//if(isset($_POST["confirm_order"])){
  //  $total_price=$_POST['total_price'];
//}
//print_r($total_price);
//die();
$user_id=$_SESSION['login_user_id'];
$product_id=$_POST['id'];
$total_price=$_POST['total_price'];
date_default_timezone_set('Asia/Dhaka');
$created_at = date("d-m-y h:i:s");


$query="INSERT INTO orders(user_id,product_id,weight,status,total_price,created_at) VALUES('$user_id','$product_id','$quantity',0,'$total_price','$created_at')";
$insert_query_result = mysqli_query($dbconnect,$query);

//print_r($_POST);
//die();

//order confirm hole order table e insert hobe
//cart table theke delete hobe
// then redirect to cart.php



//status 0 = pending order
//status 1 = confirmed order by seller
//status 2 = order delivered

?>
