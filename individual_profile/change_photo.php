<!-- if($_FILES['change_photo']['error']==0){
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
            } -->