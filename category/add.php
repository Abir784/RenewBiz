<?php
$page='Category';
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$id=$_SESSION['login_user_id'];
$user_select_query= "SELECT * FROM user WHERE id='$id'";
$user_query=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_query);
?>

<!-- Main Content -->
<div class="container">
  <!-- Muse Section, Py 4, Py Md 5 -->
  <!-- Muse Section, Pt 4 -->
  <section class="muse-section pt-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
            <h5 class="mb-0">Add Category </h5>
          </div>
          <div class="px-4 px-md-5 py-4">
            <form action="#" method="post" enctype="multipart/form-data"> 
              <?php if(isset($_SESSION['success'])) {?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['success']?>
                </div>

              <?php }unset($_SESSION['success']) ?>
              <div class="row">
                  <div class="col-md-6">
                    <div class="mb-4">
                      <label class="form-label form-label-lg">Category Name</label>
                      <input type="text" class="form-control form-control-xl"  name="name">
                    </div>
                      <?php if(isset($_SESSION['error']['name'])) {?>
                        <div class="alert alert-danger" role="alert">
                          <?=$_SESSION['error']['name']?>
                        </div>
                    <?php }unset($_SESSION['error']['name']) ?>
                  </div>
                  
                  
                <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                      <label class="form-label form-label-lg">Product Image</label>
                      <input type="file" class="form-control form-control-xl" name="product_image">
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