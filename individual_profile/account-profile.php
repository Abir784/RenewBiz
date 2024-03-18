<?php
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
//profile page
$id=$_SESSION['login_user_id'];
$role=$_SESSION['login_done'];

//buyer
if ($role == 2){
  if ($id = ("SELECT id FROM buyer WHERE id='$id'")){
    $buyer_select_query="SELECT * FROM buyer b, user u WHERE b.user_id = u.user_id";
    $buyer_select_query_result=mysqli_query($dbconnect,$buyer_select_query);
    $edit=mysqli_fetch_assoc($buyer_select_query_result);
  }else{
    header("location:account_insert.php");
  }
//seller
}else{
  if ($id = ("SELECT id FROM seller WHERE id='$id'")){
    $seller_select_query="SELECT * FROM seller s, user u WHERE s.user_id = u.user_id";
    $seller_select_query_result=mysqli_query($dbconnect,$seller_select_query);
    $edit=mysqli_fetch_assoc($seller_select_query_result);
  }else{
    header("location:account_insert.php");
  }
}

?>


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
              <h5 class="mb-0">Noell Blue <svg class="ms-1" data-name="Group 1" xmlns="http://www.w3.org/2000/svg" width="16" height="15.25" viewBox="0 0 24 23.25">
                <path d="M23.823,11.991a.466.466,0,0,0,0-.731L21.54,8.7c-.12-.122-.12-.243-.12-.486L21.779,4.8c0-.244-.121-.609-.478-.609L18.06,3.46c-.12,0-.36-.122-.36-.244L16.022.292a.682.682,0,0,0-.839-.244l-3,1.341a.361.361,0,0,1-.48,0L8.7.048a.735.735,0,0,0-.84.244L6.183,3.216c0,.122-.24.244-.36.244L2.58,4.191a.823.823,0,0,0-.48.731l.36,3.412a.74.74,0,0,1-.12.487L.18,11.381a.462.462,0,0,0,0,.732l2.16,2.437c.12.124.12.243.12.486L2.1,18.449c0,.244.12.609.48.609l3.24.735c.12,0,.36.122.36.241l1.68,2.924a.683.683,0,0,0,.84.244l3-1.341a.353.353,0,0,1,.48,0l3,1.341a.786.786,0,0,0,.839-.244L17.7,20.035c.122-.124.24-.243.36-.243l3.24-.734c.24,0,.48-.367.48-.609l-.361-3.413a.726.726,0,0,1,.121-.485Z" fill="#0D6EFD"></path>
                <path data-name="Path" d="M4.036,10,0,5.8,1.527,4.2,4.036,6.818,10.582,0,12,1.591Z" transform="translate(5.938 6.625)" fill="#fff"></path>
              </svg></h5>
              <a href="account_update.php" class="small text-gray-600">Change photo</a>
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
                <a href="account_update.php">Change Password</a>
              </li>
              
            </ul>
            <div class="border-top border-gray-200 p-3">
              <a href="../login/logout.php" class="btn btn-sm btn-primary">Log Out</a>
            </div>
          </div>
        </aside>
      </div>
      <div class="col-lg-9">
        <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
          <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
            <h5 class="mb-0">Basic info</h5>
          </div>
          <div class="px-4 px-md-5 py-4">
            <form action="account_update.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?=$id?>">
              <?php if(isset($_SESSION['success'])){?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['success']?>
                </div>
              <?php }unset($_SESSION['success']) ?>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Full name</label>
                    <input type = "text" class="form-control" name="name" value="<?=$edit['name']?>">
                  </div>
                  <?php if(isset($_SESSION['error']['name'])) {?>
                    <div class="alert alert-danger" role="alert">
                      <?=$_SESSION['error']['name']?>
                    </div>
                  <?php }unset($_SESSION['error']['name']) ?>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Email</label>
                    <input type = "email" class="form-control" name="email" value="<?=$edit['email']?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Address</label>
                    <input type = "address" class="form-control" name="address" value="<?=$edit['address']?>">
                  </div>
                  <?php if(isset($_SESSION['error']['address'])) {?>
                    <div class="alert alert-danger" role="alert">
                      <?=$_SESSION['error']['address']?>
                    </div>
                  <?php }unset($_SESSION['error']['address']) ?>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Phone Number</label>
                    <input type = "phn_no" class="form-control" name="phn_no" value="<?=$edit['phn_no']?>">
                  </div>
                  <?php if(isset($_SESSION['error']['phn_no'])) {?>
                    <div class="alert alert-danger" role="alert">
                      <?=$_SESSION['error']['phn_no']?>
                    </div>
                  <?php }unset($_SESSION['error']['phn_no']) ?>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Business Name</label>
                    <input type = "business_name" class="form-control" name="business_name" value="<?=$edit['business_name']?>">
                  </div>
                  <?php if(isset($_SESSION['error']['business_name'])) {?>
                    <div class="alert alert-danger" role="alert">
                      <?=$_SESSION['error']['business_name']?>
                    </div>
                  <?php }unset($_SESSION['error']['business_name']) ?>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="form-label form-label-lg">Business Industry</label>
                    <input type = "business_industry" class="form-control" name="business_industry" value="<?=$edit['emaibusiness_industry']?>">
                  </div>
                  <?php if(isset($_SESSION['error']['business_industry'])) {?>
                    <div class="alert alert-danger" role="alert">
                      <?=$_SESSION['error']['business_industry']?>
                    </div>
                  <?php }unset($_SESSION['error']['business_industry']) ?>
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
  </section>
</div>
<?php
include '../page_includes/dashboard_footer.php';
?>