<?php
session_start();
include '../db.php';
$id=$_POST['id'];
$user_select_query="SELECT * FROM user WHERE id='$id'";
$user_select_query_result=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_select_query_result);
$role=$user['role'];
$error=[];
date_default_timezone_set('Asia/Dhaka');
$updated_at = date("d-m-y h:i:s");

if(!empty($_POST['password'])){
    //password present, img ase
    if($_FILES['image']['error']==0){
      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $query = "UPDATE user SET password='$password',updated_at='$updated_at' WHERE id='$id'";
      $update_query_result = mysqli_query($dbconnect,$query);
  
      $id = $user['id'];
      $uploaded_file = $_FILES['image'];
      $uploaded_name = $uploaded_file['name'];
      $nice = explode('.',$uploaded_name);
      $extension = end($nice);
      $allowed_extensions = ["jpg","png","jpeg"];  
      if(in_array($extension,$allowed_extensions)){
        if($uploaded_file['size']<300000000){
            if($user['image'] != 'avatar1.svg'){
                $file_location = '../images/user/'.$user['image'];
                unlink($file_location);
            }
          $new_name = $id.'.'.$extension;
          $new_location = "../images/user/".$new_name;
          move_uploaded_file($uploaded_file['tmp_name'],$new_location);
          $image_name_update = "UPDATE user SET image='$new_name' WHERE id='$id'";
          $image_updated_result = mysqli_query($dbconnect,$image_name_update);
          $_SESSION['success']='Updated Successfully';
          header('location:change_photo.php');

        }else{
          $error['image'] = 'Invalid size';
          $_SESSION['error'] = $error;
          header("location:change_photo.php");
        }
      }else{
        $error['image'] = 'Invalid extension';
        $_SESSION['error'] = $error;
        header('location:change_photo.php');

      }
    //password ase, image nai
    }else{
      $_SESSION['success']='Updated Successfully';
      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $query = "UPDATE user SET password='$password',updated_at='$updated_at' WHERE id='$id'";
      $update_query_result = mysqli_query($dbconnect,$query);
      header('location:change_photo.php');    
    }
}else{
    //password nai, image ase

  if($_FILES['image']['error']==0){
      $uploaded_file = $_FILES['image'];
      $uploaded_name = $uploaded_file['name'];
      $nice = explode('.',$uploaded_name);
      $extension = end($nice);
      $allowed_extensions = ["jpg","png","jpeg"];
      if(in_array($extension,$allowed_extensions)){
          if($uploaded_file['size']<300000000){
            if($user['image'] != 'avatar1.svg'){
                $file_location = '../images/user/'.$user['image'];
                unlink($file_location);
            }
              $new_name = $id.'.'.$extension;
              $new_location = "../images/user/".$new_name;
              move_uploaded_file($uploaded_file['tmp_name'],$new_location);
              $image_name_update = "UPDATE user SET image='$new_name' WHERE id='$id'";
              $image_updated_result = mysqli_query($dbconnect,$image_name_update);
              $_SESSION['success']='Updated Successfully';
              header('location:change_photo.php');
          }else{
              $error['image'] = 'Invalid size';
              $_SESSION['error'] = $error;
              header("location:change_photo.php");
          }
      }else{
          $error['image'] = 'Invalid extension';
          $_SESSION['error'] = $error;
          header('location:change_photo.php');
      }
  //image nai password nai
  }else{
      $id = $after_assoc['id'];
      $_SESSION['success']='Updated Successfully';
      header('location:change_photo.php');
  }
}







?>