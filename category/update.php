<?php
$page = "Category";
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';

$id = $_SESSION['login_user_id'];

$user_select_query = "SELECT * FROM user WHERE id='$id'";
$user_query = mysqli_query($dbconnect, $user_select_query);
$user = mysqli_fetch_assoc($user_query);

$category_id = $_GET['id'];
$category_select_query = "SELECT * FROM category WHERE id='$category_id'";
$category_query = mysqli_query($dbconnect, $category_select_query);
$category = mysqli_fetch_assoc($category_query);

$_SESSION['category_name'] = $category['name']; 
?>

<div class="container">
    <!-- Muse Section, Py 4, Py Md 5 -->

    <!-- Muse Section, Pt 4 -->
    <section class="muse-section pt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
                        <h5 class="mb-0">Category Info</h5>
                    </div>
                    <div class="px-4 px-md-5 py-4">
                        <form action="update.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_SESSION['success'] ?>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label form-label-lg">Category Name</label>
                                      
                                        <input type="text" class="form-control form-control-xl" value="<?= isset($_SESSION['category_name']) ? $_SESSION['category_name'] : '' ?>" name="name">
                                    </div>
                                  
                                    <?php if (isset($_SESSION['error']['name'])): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['error']['name'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label form-label-lg">Category Image</label>
                                      
                                        <input type="file" class="form-control form-control-xl" name="category_image">
                                    </div>
                                  
                                    <?php if (isset($_SESSION['error']['image'])): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['error']['image'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12 py-2">
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include '../page_includes/dashboard_footer.php'; ?>
