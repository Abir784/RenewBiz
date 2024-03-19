<?php
session_start();
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
//profile page
$id=$_SESSION['login_user_id'];
//$name=$_POST['name'];
$user_select_query="SELECT * FROM user WHERE id='$id'";
$user_select_query_result=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_select_query_result);
//$role=$user['role'];
date_default_timezone_set('Asia/Dhaka');
$updated_at = date("d-m-y h:i:s");

if(!empty($_POST['password'])){
    //password present, img nai
    if($_FILES['image']['error']==0){
      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $query = "UPDATE user SET password='$password',updated_at='$updated_at' WHERE id='$id'";
      $update_query_result = mysqli_query($dbconnect,$query);
      if($after_assoc['image'] != '0.jpg'){
          $file_location = '../images/user/'.$after_assoc['image'];
          unlink($file_location);
      }
      $id = $after_assoc['id'];
      $uploaded_file = $_FILES['image'];
      $uploaded_name = $uploaded_file['name'];
      $nice = explode('.',$uploaded_name);
      $extension = end($nice);
      $allowed_extensions = ["jpg","png","jpeg"];  
      if(in_array($extension,$allowed_extensions)){
        if($uploaded_file['size']<300000000){
          $new_name = $id.'.'.$extension;
          // echo $new_name;
          $new_location = "../images/user/".$new_name;
          move_uploaded_file($uploaded_file['tmp_name'],$new_location);
          $image_name_update = "UPDATE user SET image='$new_name' WHERE id='$id'";
          $image_updated_result = mysqli_query($dbconnect,$image_name_update);
          $_SESSION['success']='Updated Successfully';
          header('location:account-profile.php');

        }else{
          $error['image'] = 'Invalid size';
          $_SESSION['error'] = $error;
          header("location:account-profile.php");
        }
      }else{
        $error['image'] = 'Invalid extension';
        $_SESSION['error'] = $error;
        header('location:account-profile.php');

      }
    //both img and password present
    }else{
      $_SESSION['success']='Updated Successfully';
      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $query = "UPDATE user SET password='$password',updated_at='$updated_at' WHERE id='$id'";
      $update_query_result = mysqli_query($dbconnect,$query);
      
      header('location:account-profile.php');    
    }
}else{
  if($_FILES['image']['error']==0){
      if($after_assoc['image'] != '0.jpg'){
          $file_location = '../images/user/'.$after_assoc['image'];
          unlink($file_location);
      }
      $id = $after_assoc['id'];
      $uploaded_file = $_FILES['image'];
      $uploaded_name = $uploaded_file['name'];
      $nice = explode('.',$uploaded_name);
      $extension = end($nice);
      $allowed_extensions = ["jpg","png","jpeg"];
      if(in_array($extension,$allowed_extensions)){
          //image ase password nai
          if($uploaded_file['size']<300000000){
              $new_name = $id.'.'.$extension;
              $new_location = "../images/user/".$new_name;
              move_uploaded_file($uploaded_file['tmp_name'],$new_location);
              $image_name_update = "UPDATE user SET image='$new_name' WHERE id='$id'";
              $image_updated_result = mysqli_query($dbconnect,$image_name_update);
              $_SESSION['success']='Updated Successfully';
              header('location:account-profile.php');

          }else{
              $error['image'] = 'Invalid size';
              $_SESSION['error'] = $error;
              header("location:account-profile.php");
          }
      }else{
          $error['image'] = 'Invalid extension';
          $_SESSION['error'] = $error;
          header('location:account-profile.php');

      }
  //image nai password nai
  }else{
      $id = $after_assoc['id'];
      $_SESSION['success']='Updated Successfully';
      header('location:account-profile.php');
  }
}

?>

<!-- Main Content -->
<div class="main-content">
  <div class="header p-0 p-md-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center">
          <div class="col d-flex align-items-center">
            <a href="#" class="back-arrow bg-white circle circle-sm shadow-dark-80 rounded mb-0"><img src="../assets/svg/icons/chevrons-left1.svg" alt="Chevrons"></a>
            <div class="ps-0 ps-md-3">
              <h1 class="h4 mb-0">
                Profile
              </h1>
            </div>
          </div>
          <div class="col-auto d-flex flex-wrap align-items-center">
            <a href="#" class="text-dark h5 mb-0 notification dnd"><img src="../assets/svg/icons/notification.svg" style="width:20px;" alt="Notification"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/setting1.svg" alt="Setting"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/hamburger1.svg" alt="Hamburger"></a>
            <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="../assets/img/templates/avatar1.svg" alt="Avatar">
                <span class="avatar-status avatar-sm-status avatar-danger">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="../individual_profile/account-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-3 bg-gray-200">
  <div class="container">
  <!-- Muse Section, Py 4, Py Md 5 -->
  <section class="muse-section py-4 py-md-5" data-aos="fade-up" data-aos-delay="100">
    <div class="muse-profile rounded-12">
      <img src="../assets/img/pages/account-profile.jpg" class="rounded-12 w-100" alt="Account Profile">

      <a href="#" class="btn btn-sm btn-light position-absolute">Change</a>
    </div>
  </section>

  <!-- Muse Section, Pt 4 -->

    <section class="muse-section pt-4">
    <div class="row">
      <div class="col-lg-3">
        <aside class="muse-aside mb-4" data-aos="fade-up" data-aos-delay="100">
          <div class="border-bottom border-gray-200 pb-3 d-flex align-items-center">
            <span class="avatar avatar-lg avatar-circle avatar-border-lg">
              <img class="avatar-img" src="../assets/img/pages/avatar1.svg" alt="Avatars">
            </span>
            <div class="ps-2">
              <h5 class="mb-0"><?=$edit['name']?> <svg class="ms-1" data-name="Group 1" xmlns="http://www.w3.org/2000/svg" width="16" height="15.25" viewBox="0 0 24 23.25">
                <path d="M23.823,11.991a.466.466,0,0,0,0-.731L21.54,8.7c-.12-.122-.12-.243-.12-.486L21.779,4.8c0-.244-.121-.609-.478-.609L18.06,3.46c-.12,0-.36-.122-.36-.244L16.022.292a.682.682,0,0,0-.839-.244l-3,1.341a.361.361,0,0,1-.48,0L8.7.048a.735.735,0,0,0-.84.244L6.183,3.216c0,.122-.24.244-.36.244L2.58,4.191a.823.823,0,0,0-.48.731l.36,3.412a.74.74,0,0,1-.12.487L.18,11.381a.462.462,0,0,0,0,.732l2.16,2.437c.12.124.12.243.12.486L2.1,18.449c0,.244.12.609.48.609l3.24.735c.12,0,.36.122.36.241l1.68,2.924a.683.683,0,0,0,.84.244l3-1.341a.353.353,0,0,1,.48,0l3,1.341a.786.786,0,0,0,.839-.244L17.7,20.035c.122-.124.24-.243.36-.243l3.24-.734c.24,0,.48-.367.48-.609l-.361-3.413a.726.726,0,0,1,.121-.485Z" fill="#0D6EFD"></path>
                <path data-name="Path" d="M4.036,10,0,5.8,1.527,4.2,4.036,6.818,10.582,0,12,1.591Z" transform="translate(5.938 6.625)" fill="#fff"></path>
              </svg></h5>
              <!--<a href="#" class="small text-gray-600">Change photo</a> -->
              <div class="mb-4">
                <label class="form-label form-label-lg"><a href="change_photo.php">Change Photo</a></label>
              </div>
            </div>
            <button class="navbar-toggler collapsed ms-auto d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
              <svg class="menu-icon" data-name="icons/tabler/hamburger" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                <rect data-name="Icons/Tabler/Hamburger background" width="16" height="16" fill="none"/>
                <path d="M15.314,8H.686A.661.661,0,0,1,0,7.368a.653.653,0,0,1,.593-.625l.093-.006H15.314A.661.661,0,0,1,16,7.368a.653.653,0,0,1-.593.626Zm0-6.737H.686A.661.661,0,0,1,0,.632.654.654,0,0,1,.593.005L.686,0H15.314A.661.661,0,0,1,16,.632a.653.653,0,0,1-.593.625Z" transform="translate(0 4)" fill="#1e1e1e"/>
              </svg>          
              <svg class="menu-close" data-name="icons/tabler/close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                <rect data-name="Icons/Tabler/Close background" width="16" height="16" fill="none"/>
                <path d="M.82.1l.058.05L6,5.272,11.122.151A.514.514,0,0,1,11.9.82l-.05.058L6.728,6l5.122,5.122a.514.514,0,0,1-.67.777l-.058-.05L6,6.728.878,11.849A.514.514,0,0,1,.1,11.18l.05-.058L5.272,6,.151.878A.514.514,0,0,1,.75.057Z" transform="translate(2 2)" fill="#1e1e1e"/>
              </svg>          
            </button>
          </div>
          <div class="collapse navbar-collapse d-lg-block" id="navbarNav2">
            <ul class="sidebar-nav pt-3">
              <li>
                <a href="account-profile.html" class="active">General</a>
              </li>
              <li>
                <a href="change_photo.php">Change Password</a>
              </li>
              
            </ul>
            <div class="border-top border-gray-200 p-3">
              <a href="#" class="btn btn-sm btn-primary">Log Out</a>
            </div>
          </div>
        </aside>
      </div>
      <div class="col-lg-9">
        <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
            <h5 class="mb-0">Change Photo or Password</h5>
            <div class="px-4 px-md-5 py-4">
            <form action="account_update.php" method="post" enctype="multipart/form-data">
              <?php if(isset($_SESSION['success'])){?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['success']?>
                </div>
              <?php }unset($_SESSION['success']) ?>
        
              <div class="row">
                <div class= "mb-3">
                <label for = "" class="form-label"> Profile Picture </label>
                <!--<input type = "hidden" class="form-control" name="id" value="<?=$edit['id']?>">-->
                <input type = "file" class="form-control" name="image">
                </div>
                <div class = "mb-3">
                <label for = "" class="form-label"> Password </label>
                <input type = "password" class="form-control" name="password">
                </div>
                
                <div class="col-md-12 py-2">
                <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
          </div>
         
       </div>          
        </div>
        <br>
        <br class="d-none d-md-block">
      </div>
    </div>
  </section>

</div>


<?php
include '../page_includes/dashboard_footer.php';
?>
