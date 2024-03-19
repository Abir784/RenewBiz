<?php
session_start();
include '../db.php';

$field_names = ["name"=>"Full Name Required","email"=>"Email Required","address"=>"Address Required","phn_no"=>"Phone Number Required","business_name"=>"Business Nane Required","business_industry"=>"Business Industry Required"];
$error = [];
foreach($field_names as $key=>$value){
    if (empty($_POST[$key])){
        $error[$key] = $value;
    }
}
if(count($error)==0){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phn_no = $_POST['phn_no'];
    $business_name = $_POST['business_name'];
    $business_industry = $_POST['business_industry'];
    $user_id=$_SESSION['login_user_id'];
    $role=$_SESSION['login_done'];
    date_default_timezone_set('Asia/Dhaka');
    $updated_at = date("d-m-y h:i:s");
    //buyer
    if ($role == 2){
        $query = "UPDATE buyer SET name = '$name',address = '$address',phone_number = '$phn_no',business_name = '$business_name',business_industry = '$business_industry',updated_at = '$updated_at' WHERE id = '$id'";
        $update_query_result = mysqli_query($dbconnect,$query);
        
        $_SESSION['success']='Updated Successfully';
        header('location:account-profile.php?id='.$id);
    }else{
        $query = "UPDATE seller SET name = '$name',address = '$address',phone_number= '$phn_no',business_name = '$business_name',business_industry = '$business_industry',updated_at = '$updated_at' WHERE id = '$id'";
        $update_query_result = mysqli_query($dbconnect,$query);
        
        $_SESSION['success']='Updated Successfully';
        header('location:account-profile.php?id='.$id);
    }
}else{
    $_SESSION['error']=$error;
    header('location:account-profile.php?id='.$id);
}
?>

