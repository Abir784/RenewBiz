<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_photo_query="SELECT image FROM product WHERE id='$id'";
$select_photo_query_result=mysqli_query($dbconnect,$select_photo_query);
$photo=mysqli_fetch_assoc($select_photo_query_result);
$delete_product="DELETE FROM product WHERE id='$id'";
if($photo['image'] != '0.jpg'){
    unlink('../images/product/'.$photo['image']);
}
$delete_product_query=mysqli_query($dbconnect,$delete_product);



$_SESSION['delete_done']='Deleted Succecfully';
header('location:show_product.php');





?>