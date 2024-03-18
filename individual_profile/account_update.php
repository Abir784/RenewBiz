<?php
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phn_no = $_POST['phn_no'];
$business_name = $_POST['business_name'];
$business_industry = $_POST['business_industry'];
?>

<?php
include '../page_includes/dashboard_footer.php';
?>