<?php
include '../db.php';
$id=$_GET['id'];
$select_product_query="SELECT status FROM product WHERE id='$id'";
$select_product_query_result=mysqli_query($dbconnect,$select_product_query);
$product_status=mysqli_fetch_assoc($select_product_query_result);
if ($product_status['status']==1){
    $update_status="UPDATE product SET status=0 WHERE id='$id'";
}else{
    $update_status="UPDATE product SET status=1 WHERE id='$id'";
}
$update_result=mysqli_query($dbconnect,$update_status);
header('location:show_product.php');

?>