<?php
include 'page_includes/index_header.php';
include 'db.php';

$category_id =$_GET['id'];
$product_select="SELECT p.id as id,p.image as image,p.name as name,p.price as price,i.weight as weight FROM product p,inventory i WHERE i.product_id=p.id and p.status=1 and category_id='$category_id'";
$products=mysqli_query($dbconnect,$product_select);
$category_select='SELECT * FROM category';
$categorys=mysqli_query($dbconnect,$category_select);


?>

<div class="container">
    <div class="row">
    <?php foreach($categorys as $category){ ?>
        
        <div class="col-lg-4">
            <div class="swiper-slide">
            <figure class="card border-0 transition-3d-hover mb-0 mb-md-3">
                <a href="category_filter.php?id=<?=$category['id']?>"><img src="images/category/<?=$category['image']?>" class="rounded-6 w-100" alt="img"></a>
                <figcaption class="pt-3 pb-4">
                <h5 class="mb-0 mb-md-3 title-box"><a href="category_filter.php?id=<?=$category['id']?>"><?=$category['name']?></a></h5>
                </figcaption>
            </figure>
        </div>
        </div>
        <?php } ?>    
            </div>
        </div>

    </div>
</div>



<?php
include 'page_includes/index_footer.php';
?>