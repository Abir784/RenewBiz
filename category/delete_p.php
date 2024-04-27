<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_photo_query="SELECT image FROM category WHERE id='$id'";
$select_photo_query_result=mysqli_query($dbconnect,$select_photo_query);
$photo=mysqli_fetch_assoc($select_photo_query_result);
if($photo['image'] != '0.jpg'){
    unlink('../images/product/'.$photo['image']);
}
$delete_category="DELETE FROM category WHERE id='$id'";

$delete_category_query=mysqli_query($dbconnect,$delete_category);
$_SESSION['delete_done']='Deleted Succecfully';
header('location:show_category.php');
