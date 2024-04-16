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
    $created_at = date("y-m-d h:i:s");

    $if_product_exists="SELECT EXISTS (SELECT * FROM wishlist WHERE (product_id = '$id' and buyer_id = '$bid')) as wishlist";
    $product_exists=mysqli_query($dbconnect,$if_product_exists);
    $product_exists_result=mysqli_fetch_assoc($product_exists);
    $product_data=$product_exists_result['wishlist'];

    //buyer id, product id exists in cart table
    if ($product_data){
        $query = "UPDATE wishlist SET quantity=quantity+1 WHERE (product_id = '$id' and buyer_id = '$bid')";
        $insert_query_result = mysqli_query($dbconnect,$query);
        $_SESSION['success']='Added To Wishlist Successfully';
        header('location:../add_to_cart.php?id='.$id);

    //buyer id exist, product id doesnt exist in cart table
    } else{
        
        $query = "INSERT INTO wishlist(product_id,quantity,buyer_id,created_at) VALUES('$id',1,'$bid','$created_at')";
        $insert_query_result = mysqli_query($dbconnect,$query);
        $_SESSION['success']='Added to Wishlist Successfully';
        header('location:../add_to_cart.php?id='.$id);
    }

//buyer id doesn't exists in buyer table
}else{
    $_SESSION['error1']="You have to Sign up as buyer to add this product in Wishlist";
    header('location:../buyer_reg/buyer_reg.php');
}
?>