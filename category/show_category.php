<?php
$page='Product';
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$user_id=$_SESSION['login_user_id'];
$product_select_query="SELECT p.id,p.name AS p_name, c.name AS category_name,p.price AS price,p.image AS product_image,p.status AS p_status ,p.description AS p_description  FROM product p INNER JOIN Category c ON p.category_id = c.id WHERE user_id=$user_id";
$products=mysqli_query($dbconnect,$product_select_query);

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
                    <?php foreach($products as $key=>$product){?>

                    <tr>
                        <td><?=$key+1?></td>
                        <td><img src="../images/product/<?=$product['product_image']?>" width="50px" height="50px" alt="<?=$product['product_image']?>"></td>
                       
                        <td><?=$product['category_name']?></td>
                       
                        
                        
                        <td><a href="update.php?id=<?=$product['id']?>" class="btn btn-primary"> Update </a></td>
                        <td><a href="delete.php?id=<?=$product['id']?>" class="btn btn-info"> Delete </a></td>
                    </tr>
                    <?php } ?>
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
