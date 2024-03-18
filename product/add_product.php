<?php
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$id=$_SESSION['login_user_id'];
$user_select_query= "SELECT * FROM user WHERE id='$id'";
$user_query=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_query);

//getting category 
$category_select_query="SELECT * FROM category";
$categories=mysqli_query($dbconnect,$category_select_query);




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
                Add Product
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
 
  <!-- Muse Section, Pt 4 -->
  <section class="muse-section pt-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
            <h5 class="mb-0">Product info</h5>
          </div>
          <div class="px-4 px-md-5 py-4">
            <form action="post.php" method="post" enctype="multipart/form-data"> 
              <?php if(isset($_SESSION['success'])) {?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['success']?>
                </div>

              <?php }unset($_SESSION['success']) ?>
              <div class="row">
                  <div class="col-md-6">
                    <div class="mb-4">
                      <label class="form-label form-label-lg">Product Name</label>
                      <input type="text" class="form-control form-control-xl"  name="name">
                    </div>
                      <?php if(isset($_SESSION['error']['name'])) {?>
                        <div class="alert alert-danger" role="alert">
                          <?=$_SESSION['error']['name']?>
                        </div>
                    <?php }unset($_SESSION['error']['name']) ?>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-4">
                      <label class="form-label form-label-lg">Product Category </label>
                      <select name="category" id="" class="form-control form-control-xl">
                         <option value="">--Select Category--</option>
                         <?php foreach($categories as $category) {?>

                          <option value="<?=$category['id']?>"><?=$category['name']?></option>

                          <?php }?>
                      </select>
                      <?php if(isset($_SESSION['error']['category'])) {?>
                        <div class="alert alert-danger" role="alert">
                          <?=$_SESSION['error']['category']?>
                        </div>
                       <?php }unset($_SESSION['error']['category']) ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-4">
                      <label class="form-label form-label-lg">Description</label>
                      <textarea name="description" rows="3" class="form-control form-control-xl" placeholder="Message"> </textarea>
                      <?php if(isset($_SESSION['error']['description'])) {?>
                        <div class="alert alert-danger" role="alert">
                          <?=$_SESSION['error']['description']?>
                        </div>
                       <?php }unset($_SESSION['error']['description']) ?>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                      <label class="form-label form-label-lg">Product Image</label>
                      <input type="file" class="form-control form-control-xl" name="product_image">
                    </div>
                    
                  </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Product Price (per unit)</label>
                    <input type="number" class="form-control form-control-xl" name="price">
                  </div>
                  <?php if(isset($_SESSION['error']['price'])) {?>
                        <div class="alert alert-danger" role="alert">
                          <?=$_SESSION['error']['price']?>
                        </div>
                       <?php }unset($_SESSION['error']['price']) ?>
                </div>
                </div>
              
                <div class="col-md-12 py-2">
                  <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
</section>












<?php
include '../page_includes/dashboard_footer.php';
?>