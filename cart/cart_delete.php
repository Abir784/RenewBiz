<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_from_cart="DELETE FROM carts WHERE id='$id'";

$delete_from_cart_query=mysqli_query($dbconnect,$delete_from_cart);

$_SESSION['delete_done']='Deleted Succecfully';
header('location:cart.php');


?>