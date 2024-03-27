<?php
session_start();
include '../db.php';
$user_id=$_SESSION['login_user_id'];
$buyer_id_query="SELECT * FROM buyer WHERE user_id=$user_id";
$buyer_id_done=mysqli_query($dbconnect,$buyer_id_query);
$buyer=mysqli_fetch_assoc($buyer_id_done);
$buyer_id=$buyer['id'];

if(isset($_POST["confirm_order"])){
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

  }
} elseif(isset($_POST['save'])){
    $posts=$_POST;
    $n=((count($posts)-1)/3);
    for ($i=0;$i<$n;$i++){
      $quantity=$posts['quantity'.$i+1];
      $product_id=$posts['id'.$i+1];
      $cart_id=$posts['cart_id'.$i+1];
      date_default_timezone_set('Asia/Dhaka');
      $created_at = date("d-m-y h:i:s");
      $query="UPDATE carts SET quantity= $quantity WHERE id=$cart_id";
      $insert_query_result = mysqli_query($dbconnect,$query);
    }

}
header("location:cart.php");


//status 0 = pending order
//status 1 = confirmed order by seller
//status 2 = order delivered

?>
