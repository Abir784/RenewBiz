<?php
session_start();
include '../db.php';
$user_id=$_SESSION['login_user_id'];


if(isset($_POST["confirm_order_from_cart"])){
  $posts=$_POST;
  $n=((count($posts)-1)/4);
  for ($i=0;$i<$n;$i++){
    $quantity=$posts['quantity'.$i+1];
    $product_id=$posts['id'.$i+1];
    $total_price=$posts['total_price'.$i+1];
    $cart_id=$posts['cart_id'.$i+1];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("d-m-y h:i:s");
    $query="INSERT INTO orders(user_id,product_id,weight,status,total_price,created_at) VALUES('$user_id','$product_id','$quantity',0,'$total_price','$created_at')";
    $insert_query_result = mysqli_query($dbconnect,$query);
    $delete_product= "DELETE FROM carts WHERE id='$cart_id'";
    $cart_delete=mysqli_query($dbconnect,$delete_product);
    $_SESSION['success']="Order Placed !!";
    header("location:cart.php");
  }
} elseif(isset($_POST['save_from_cart'])){
  $posts=$_POST;
  $n=((count($posts)-1)/3);
  for ($i=0;$i<$n;$i++){
    $quantity=$posts['quantity'.$i+1];
    $product_id=$posts['id'.$i+1];
    $cart_id=$posts['cart_id'.$i+1];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("y-m-d h:i:s");
    $query="UPDATE carts SET quantity= $quantity WHERE id=$cart_id";
    $insert_query_result = mysqli_query($dbconnect,$query);
    $_SESSION['success']="Cart Updated !!";
    header("location:cart.php");
  }

} elseif(isset($_POST["confirm_order_from_wishlist"])){
  $posts=$_POST;
  $n=((count($posts)-1)/4);
  for ($i=0;$i<$n;$i++){
    $quantity=$posts['quantity'.$i+1];
    $product_id=$posts['id'.$i+1];
    $total_price=$posts['total_price'.$i+1];
    $wishlist_id=$posts['wishlist_id'.$i+1];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("d-m-y h:i:s");
    $query="INSERT INTO orders(user_id,product_id,weight,status,total_price,created_at) VALUES('$user_id','$product_id','$quantity',0,'$total_price','$created_at')";
    $insert_query_result = mysqli_query($dbconnect,$query);
    $delete_product= "DELETE FROM wishlist WHERE id='$wishlist_id'";
    $wishlist_delete=mysqli_query($dbconnect,$delete_product);
    $_SESSION['success']="Order Placed !!";
    header("location:wishlist.php");

  }

} elseif(isset($_POST['save_from_wishlist'])){
  $posts=$_POST;
  $n=((count($posts)-1)/3);
  for ($i=0;$i<$n;$i++){
    $quantity=$posts['quantity'.$i+1];
    $product_id=$posts['id'.$i+1];
    $wishlist_id=$posts['wishlist_id'.$i+1];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("y-m-d h:i:s");
    $query="UPDATE wishlist SET quantity= $quantity WHERE id=$wishlist_id";
    $insert_query_result = mysqli_query($dbconnect,$query);
    $_SESSION['success']="Wishlist Updated !!";
    header("location:wishlist.php");

  }
}
?>
