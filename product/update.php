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
    $id=$_POST['id'];
    $name=$_POST['name'];
    $desp=$_POST['description'];
    $uploaded_file=$_FILES['product_image'];
    $price=$_POST['price'];
    $category_id=$_POST['category'];
    $user_id=$_SESSION['login_user_id'];
    date_default_timezone_set('Asia/Dhaka');
    $updated_at = date("y-m-d h:i:s");
    $query = "UPDATE product SET category_id = '$category_id', name = '$name', description = '$desp', price = '$price', updated_at = '$updated_at' WHERE id = '$id'";
    $update_query = mysqli_query($dbconnect,$query);
    if($_FILES['product_image']['error']==0){
        $file_name=$uploaded_file['name'];
        $after_explode=explode('.',$file_name);
        $extention=end($after_explode);
        $allowed_extention=array('jpg','jpeg','png');
        if(in_array($extention,$allowed_extention)){
            if($uploaded_file['size']<20000000){
                $select_photo_query="SELECT image FROM product WHERE id='$id'";
                $select_photo_query_result=mysqli_query($dbconnect,$select_photo_query);
                $photo=mysqli_fetch_assoc($select_photo_query_result);
                if($photo['image'] != '0.jpg'){
                    unlink('../images/product/'.$photo['image']);
                }
                $new_file_name=$id.'.'.$extention;
                $new_location='../images/product/'.$new_file_name;
                move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                $image_update_query="UPDATE product SET image='$new_file_name' WHERE id='$id'";
                $image_update_query_result=mysqli_query($dbconnect,$image_update_query);
            }else{
                $error['product_image']='Invalid Size';
                $_SESSION['error']=$error;
                header('location:edit.php?id='.$id);
            }
        }else{
                $error['product_image']='Invalid extention';
                $_SESSION['error']=$error;
                header('location:edit.php?id='.$id);
        }
    }
    $_SESSION['success']='Product Updated Successfully';
    header('location:edit.php?id='.$id);
    
   

}else{
    $_SESSION['error']=$error;
    header('location:edit.php?id='.$id);
}


?>

?>