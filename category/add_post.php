<?php

session_start();

include '../session_check.php';
include '../db.php';
$field_names = ["name"=>"Category Name required or already Exists"];
$error =[];
$name=$_POST["name"];
$check_query = "SELECT * FROM category WHERE name = '$name'";
$check_result = mysqli_query($dbconnect, $check_query);

foreach($field_names as $key=>$value){
    if (empty($_POST[$key]) or mysqli_num_rows($check_result) > 0 ){
        $error[$key] = $value;
        }
    }  
if(count($error)==0){
    $name=$_POST['name'];
    $uploaded_file=$_FILES['product_image'];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("y-m-d h:i:s");
    $query = "INSERT INTO category(name,created_at) VALUES ('$name','$created_at')";
    $insert_query_result = mysqli_query($dbconnect,$query);
    if($_FILES['product_image']['error']==0){
        $id = mysqli_insert_id($dbconnect);
        $file_name=$uploaded_file['name'];
        $after_explode=explode('.',$file_name);
        $extention=end($after_explode);
        $allowed_extention=array('jpg','jpeg','png');
        if(in_array($extention,$allowed_extention)){
            if($uploaded_file['size']<20000000){
                $new_file_name=$id.'.'.$extention;
                $new_location='../images/category/'.$new_file_name;
                move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                $image_update_query="UPDATE category SET image='$new_file_name' WHERE id='$id'";
                $image_update_query_result=mysqli_query($dbconnect,$image_update_query);
            }else{
                $error['product_image']='Invalid Size';
                $_SESSION['error']=$error;
                header('location:add.php');
            }
        }else{
                $error['product_image']='Invalid extention';
                $_SESSION['error']=$error;
                header('location:add.php');
        }
    }
    $_SESSION['success']='Category Added Successfully';
    header('location:add.php');
    
   

}else{
    $_SESSION['error']=$error;
    header('location:add.php');
}


?>



