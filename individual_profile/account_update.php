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
        $query = "UPDATE buyer SET name = '$name',address = '$address',phn_no = '$phn_no',business_name = '$business_name',business_industry = '$business_industry',updated_at = '$updated_at' WHERE id = '$id'";
        $update_query_result = mysqli_query($dbconnect,$query);
        if($_FILES['change_photo']['error']==0){
            $file_name=$uploaded_file['name'];
            $after_explode=explode('.',$file_name);
            $extention=end($after_explode);
            $allowed_extention=array('jpg','jpeg','png');
            if(in_array($extention,$allowed_extention)){
                if($uploaded_file['size']<20000000){
                    $new_file_name=$id.'.'.$extention;
                    $new_location='../images/product/'.$new_file_name;
                    move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                    $image_update_query="UPDATE buyer SET image='$new_file_name' WHERE id='$id'";
                    $image_update_query_result=mysqli_query($dbconnect,$image_update_query);
                }else{
                    $error['change_photo']='Invalid Size';
                    $_SESSION['error']=$error;
                    header('location:account-profile.php?id='.$id);
                }
                
            }else{
                $error['change_photo']='Invalid extention';
                $_SESSION['error']=$error;
                header('location:account-profile.php?id='.$id);
            }
        }
        $_SESSION['success']='Photo Updated Successfully';
        header('location:account-profile.php?id='.$id);
    //seller
    }else{
        $query = "UPDATE seller SET name = '$name',address = '$address',phn_no = '$phn_no',business_name = '$business_name',business_industry = '$business_industry',updated_at = '$updated_at' WHERE id = '$id'";
        $update_query_result = mysqli_query($dbconnect,$query);
        if($_FILES['change_photo']['error']==0){
            $file_name=$uploaded_file['name'];
            $after_explode=explode('.',$file_name);
            $extention=end($after_explode);
            $allowed_extention=array('jpg','jpeg','png');
            if(in_array($extention,$allowed_extention)){
                if($uploaded_file['size']<20000000){
                    $new_file_name=$id.'.'.$extention;
                    $new_location='../images/product/'.$new_file_name;
                    move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                    $image_update_query="UPDATE buyer SET image='$new_file_name' WHERE id='$id'";
                    $image_update_query_result=mysqli_query($dbconnect,$image_update_query);
                }else{
                    $error['change_photo']='Invalid Size';
                    $_SESSION['error']=$error;
                    header('location:account-profile.php?id='.$id);
                }
                
            }else{
                $error['change_photo']='Invalid extention';
                $_SESSION['error']=$error;
                header('location:account-profile.php?id='.$id);
            }
        }
        $_SESSION['success']='Photo Updated Successfully';
        header('location:account-profile.php?id='.$id);
    }
}else{
    $_SESSION['error']=$error;
    header('location:account-profile.php?id='.$id);
}
?>

<?php
include '../page_includes/dashboard_footer.php';
?>