<?php

include '../session_check.php';
include '../db.php';
$order_id=$_POST['order_id'];
$select_order_query="SELECT product_id,weight FROM orders WHERE id='$order_id'";
$select_order_query_result=mysqli_query($dbconnect,$select_order_query);
$order=mysqli_fetch_assoc($select_order_query_result);
$weight=$order['weight'];
$product_id=$order['product_id'];

date_default_timezone_set('Asia/Dhaka');
$updated_at = date("y-m-d h:i:s");
if(isset($_POST['accept'])){
    $update_status= "UPDATE orders SET status=1 WHERE id='$order_id'";
    $update_status_result= mysqli_query($dbconnect,$update_status);
    $_SESSION['success']="Order Accepted";

}elseif(isset($_POST['decline'])){
    $update_status= "UPDATE orders SET status=3 WHERE id='$order_id'";
    $update_status_result= mysqli_query($dbconnect,$update_status);
    $_SESSION['success']="Order Declined";

}else{
    $update_status= "UPDATE orders SET status=2, updated_at='$updated_at' WHERE id='$order_id'";
    $update_status_result= mysqli_query($dbconnect,$update_status);
    $update_inventory_query="UPDATE inventory set weight=weight-$weight WHERE product_id='$product_id'";
    $update_inventory_query_result=mysqli_query($dbconnect,$update_inventory_query);
    $_SESSION['success']="Order Delivered";

}

header('location:seller_side_order_details.php?id='.$order_id);


?>