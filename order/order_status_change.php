<?php

include '../session_check.php';
include '../db.php';
$order_id=$_POST['order_id'];
date_default_timezone_set('Asia/Dhaka');
$updated_at = date("d-m-y h:i:s");
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
    $_SESSION['success']="Order Delivered";

}

header('location:seller_side_order_details.php?id='.$order_id);


?>