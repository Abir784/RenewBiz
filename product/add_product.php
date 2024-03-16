<?php
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$id=$_SESSION['login_user_id'];
$user_select_query= "SELECT * FROM user WHERE id='$id'";
$user_query=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_query);

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
                <li><a class="dropdown-item" href="#">Profile</a></li>
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
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Full name</label>
                    <input type="text" class="form-control form-control-xl" placeholder="Full name" value="Noell Blue">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Email</label>
                    <input type="text" class="form-control form-control-xl" placeholder="Email" value="muse@fabrx.co">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Bio</label>
                    <textarea rows="3" class="form-control form-control-xl" placeholder="Message">We create intuitive user interface and design systems to bridge the gap between your product and customers.</textarea>
                  </div>
                </div>
                <div class="col-md-12 py-2">
                  <a href="#" class="btn btn-lg btn-primary">Work In Progress[Abir]</a>
                </div>
              </div>
            </form>
          </div>
        </div>
</section>












<?php
include '../page_includes/dashboard_footer.php';
?>