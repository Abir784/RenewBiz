<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_product="DELETE FROM product WHERE id='$id'";

$delete_product_query=mysqli_query($dbconnect,$delete_product);



$_SESSION['delete_done']='Deleted Succecfully';
header('location:show_product.php');





?>