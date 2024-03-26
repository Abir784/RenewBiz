<?php
session_start();
include '../db.php';
$id = $_GET['id'];
$user_id=$_SESSION['login_user_id'];
$if_exists="SELECT EXISTS (SELECT * FROM buyer WHERE user_id = '$user_id') as buyer";
$exists_result_done=mysqli_query($dbconnect,$if_exists);
$exists_result=mysqli_fetch_assoc($exists_result_done);
$data=$exists_result['buyer'];
if ($data){
    $select_query="SELECT * FROM buyer WHERE user_id='$user_id'";
    $buyer_select_query_result=mysqli_query($dbconnect,$select_query);
    $buyer=mysqli_fetch_assoc($buyer_select_query_result);
    $bid=$buyer['id'];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("d-m-y h:i:s");

    $if_product_exists="SELECT EXISTS (SELECT * FROM carts WHERE (product_id = '$id' and buyer_id = '$bid')) as cart";
    $product_exists=mysqli_query($dbconnect,$if_product_exists);
    $product_exists_result=mysqli_fetch_assoc($product_exists);
    $product_data=$product_exists_result['cart'];

    //buyer id, product id exists in cart table
    if ($product_data){

        $query = "UPDATE carts SET quantity=quantity+1 WHERE (product_id = '$id' and buyer_id = '$bid')";
        $insert_query_result = mysqli_query($dbconnect,$query);
        $_SESSION['success']='Added Successfully';
        header('location:../add_to_cart.php?id='.$id);

    //buyer id exist, product id doesnt exist in cart table
    } else{
        
        $query = "INSERT INTO carts(product_id,quantity,buyer_id,created_at) VALUES('$id',1,'$bid','$created_at')";
        $insert_query_result = mysqli_query($dbconnect,$query);
        $_SESSION['success']='Added Successfully';
        header('location:../add_to_cart.php?id='.$id);
    }

//buyer id doesn't exists in buyer table
}else{
    header('location:../buyer_reg/buyer_reg.php');
}

$cart_select_query="SELECT * FROM buyer WHERE user_id='$user_id'";
$buyer_cart_select_query_result=mysqli_query($dbconnect,$cart_select_query);
$buyer_cart=mysqli_fetch_assoc($buyer_cart_select_query_result);
$bid=$buyer_cart['id'];
$quantity=1;
date_default_timezone_set('Asia/Dhaka');
$created_at = date("d-m-y h:i:s");
$query = "INSERT INTO carts(product_id,quantity,buyer_id,created_at) VALUES('$id','$quantity','$bid''$created_at')";
$insert_query_result = mysqli_query($dbconnect,$query);
$_SESSION['success']='Added Successfully';
header('location:../add_to_cart.php?id='.$id);


?>