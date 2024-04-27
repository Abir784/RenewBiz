<?php
session_start();
include '../db.php';
$field_names = ["name"=>"Product Name required", "description"=>"Description required", "price"=>"Price required",'category'=>'Category Need to be Added'];
$error =[];
foreach($field_names as $key=>$value){
    if (empty($_POST[$key])){
        $error[$key] = $value;
        }
    }  


if(count($error)==0){
    $name=$_POST['name'];
    $desp=$_POST['description'];
    $uploaded_file=$_FILES['product_image'];
    $price=$_POST['price'];
    $category_id=$_POST['category'];
    $user_id=$_SESSION['login_user_id'];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date("y-m-d h:i:s");
    $query = "INSERT INTO product(user_id,category_id,name,status,description,price,created_at) VALUES ('$user_id','$category_id','$name',0,'$desp','$price','$created_at')";

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
                $new_location='../images/product/'.$new_file_name;
                move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                $image_update_query="UPDATE product SET image='$new_file_name' WHERE id='$id'";
                $image_update_query_result=mysqli_query($dbconnect,$image_update_query);
            }else{
                $error['product_image']='Invalid Size';
                $_SESSION['error']=$error;
                header('location:add_product.php');
            }
        }else{
                $error['product_image']='Invalid extention';
                $_SESSION['error']=$error;
                header('location:add_product.php');
        }
    }
    $_SESSION['success']='Product Added Successfully';
    header('location:add_product.php');
    
   

}else{
    $_SESSION['error']=$error;
    header('location:add_product.php');
}


?>