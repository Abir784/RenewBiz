<?php
$page='Category';
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$user_id=$_SESSION['login_user_id'];

?>
<div class="container">
  <!-- Muse Section, Py 4, Py Md 5 -->
 
  <!-- Muse Section, Pt 4 -->
  <section class="muse-section pt-4">
    <div class="row">
      <div class="col-lg-12">
         <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        
                        <th>Category</th>
                        
                        
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>

            </table>
        
         </div>   
       </div>
    </div>
  </section>
</div>


<?php
include '../page_includes/dashboard_footer.php';

?>
<?php if(isset($_SESSION['delete_done'])) {?>
<script>
  $(document).ready(function(){
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Deleted Successfully",
    showConfirmButton: false,
    timer: 750
      });
});
</script>
<?php } unset($_SESSION['delete_done'])?>
