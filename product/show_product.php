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
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $key=>$product){?>

                    <tr>
                        <td><?=$key+1?></td>
                        <td><img src="../images/product/<?=$product['product_image']?>" width="50px" height="50px" alt="<?=$product['product_image']?>"></td>
                        <td><?=$product['p_name']?></td>
                        <td><?=$product['category_name']?></td>
                        <td><?=$product['price']?></td>
                        <td><?=$product['p_description']?></td>
                        <?php if($product['p_status']==1) {?>
                        <td><a href="status_change.php?id=<?=$product['id']?>" class="btn btn-success">Live</a></td>
                        <?php } else {?>
                        <td><a href="status_change.php?id=<?=$product['id']?>" class="btn btn-danger">Offline</a></td>
                        <?php }?>
                        <td><a href="delete.php?id=<?=$product['id']?>" class="btn btn-danger" id="alertButton">Delete</a></td>
                        <td><a href="edit.php?id=<?=$product['id']?>" class="btn btn-primary"> Edit </a></td>
                        <td><a href="add_inventory.php?id=<?=$product['id']?>" class="btn btn-info"> Inventory </a></td>
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
