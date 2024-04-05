<?php
$page = 'Category';
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$user_id = $_SESSION['login_user_id'];


$category_select_query = "SELECT * FROM category";
$categories = mysqli_query($dbconnect, $category_select_query);
?>

<div class="container">
    <!-- Muse Section, Py 4, Py Md 5 -->

    <!-- Muse Section, Pt 4 -->
    <section class="muse-section pt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <table class="table card-table table-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $key => $category): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $category['name'] ?></td>
                                    <td>
                                      
                                        <img src="../images/category/<?= $category['image'] ?>" width="50px" height="50px" alt="<?= $category['name'] ?> Image">
                                    </td>
                                    <td class="text-center">
                                    <a href="update.php?id=<?= $category['id'] ?>" class="btn btn-info btn-sm">Update</a>
                                    <td><a href="delete_p.php?id=<?=$category['id']?>" class="btn btn-danger" id="alertButton">Delete</a></td>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include '../page_includes/dashboard_footer.php'; 
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

