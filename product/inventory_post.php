<?php
include '../db.php';
$id=$_POST['id'];
$weight=$_POST['weight'];
$if_inventory_exists="SELECT EXISTS (SELECT * FROM inventory WHERE product_id = '$id') as inventory_exists";
$inventory_exists_result=mysqli_query($dbconnect,$if_inventory_exists);
$inventory_exists=mysqli_fetch_assoc($inventory_exists_result)['inventory_exists'];
date_default_timezone_set('Asia/Dhaka');
$created_at = date("d-m-y h:i:s");
if (empty($weight)){
    header('location:add_inventory.php?id='.$id);

}else if($inventory_exists){
    $update_inventory="UPDATE inventory SET weight = weight+'$weight', updated_at = '$created_at' WHERE product_id = '$id';";
    $update_inventory_result=mysqli_query($dbconnect,$update_inventory);

}else{
    $insert_inventory="INSERT INTO inventory(product_id,weight,created_at) VALUES('$id','$weight','$created_at')";
    $insert_inventory_result=mysqli_query($dbconnect,$insert_inventory);
}
header('location:add_inventory.php?id='.$id);


?>