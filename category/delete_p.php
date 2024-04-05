<?php
session_start();
include '../db.php';
$id=$_GET['id'];

$delete_category="DELETE FROM category WHERE id='$id'";

$delete_category_query=mysqli_query($dbconnect,$delete_category);
$_SESSION['delete_done']='Deleted Succecfully';
header('location:show_category.php');
