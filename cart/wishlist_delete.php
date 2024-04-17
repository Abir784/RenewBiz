<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_from_wishlist="DELETE FROM wishlist WHERE id='$id'";

$delete_from_wishlist_query=mysqli_query($dbconnect,$delete_from_wishlist);

$_SESSION['delete_done']='Deleted Succecfully';
header('location:wishlist.php');


?>