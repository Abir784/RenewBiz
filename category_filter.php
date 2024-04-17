<?php
include 'session_check.php';
include 'db.php';

$category_id =$_GET['id'];

$product_select="SELECT p.id as id,p.image as image,p.name as name,p.price as price,i.weight as weight FROM product p,inventory i WHERE i.product_id=p.id and p.status=1 and category_id='$category_id'";
$products=mysqli_query($dbconnect,$product_select);

include 'page_includes/index_header.php';
?>

<?php
include 'page_includes/index_footer.php';
?>