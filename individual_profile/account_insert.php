<?php
session_start();
include '../db.php';
$field_names = ["name"=>"Full Name Required","address"=>"Address Required","phn_no"=>"Phone Number Required","business_name"=>"Business Nane Required","business_industry"=>"Business Industry Required"];
$error = [];
foreach($field_names as $key=>$value){
    if (empty($_POST[$key])){
        $error[$key] = $value;
    }
}
$id=$_SESSION['login_user_id'];
$user_select_query="SELECT * FROM user WHERE id='$id'";
$user_select_query_result=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_select_query_result);
$role=$user['role'];

if(count($error)==0){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phn_no = $_POST['phn_no'];
    $business_name = $_POST['business_name'];
    $business_industry = $_POST['business_industry'];
   
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("d-m-y h:i:s");
    if ($role == 2){
        echo 'skjdnf';
        die();
        $query = "INSERT INTO buyer(user_id,name,address,phone_number,business_name,business_industry,created_at) VALUES('$id','$name','$address','$phn_no','$business_name','$business_industry','$created_at')";
        $insert_query_result = mysqli_query($dbconnect,$query);
    }else{
        $query = "INSERT INTO seller(user_id,name,address,phone_number,business_name,business_industry,created_at) VALUES('$id','$name','$address','$phn_no','$business_name','$business_industry','$created_at')";
        $insert_query_result = mysqli_query($dbconnect,$query);

    }
    $_SESSION['success']='Inserted Successfully';
    header('location:../dashboard/dashboard.php');
}else{
    $_SESSION['error']=$error;
    header('location:account-profile.php');
}


?>