<?php
session_start();
$start=$_POST['start'];
$end=$_POST['end'];
include '../db.php';
$user_id=$_SESSION['login_user_id'];
$join_product_order_table="SELECT o.id as order_id,p.image as product_image,p.name as product_name, o.created_at as order_date ,o.status as order_status From product p,orders o WHERE (o.product_id = p.id and p.user_id = $user_id and o.created_at BETWEEN '$start' AND '$end')";
$join_product_order_table_result= mysqli_query($dbconnect,$join_product_order_table);

$data='';
foreach($join_product_order_table_result as $orders){ 
    if($orders['order_status']==0){
        $st='<td><span class="avatar-status avatar-sm-status avatar-offline position-relative me-1 bottom-0 end-0">&nbsp;</span> Pending</td>';
    }elseif($orders['order_status'] == 1){
        $st='<td><span class="avatar-status avatar-sm-status avatar-warning position-relative me-1 bottom-0 end-0">&nbsp;</span> Accepted</td>';
    }elseif($orders['order_status'] == 2) {
        $st='<td> <span class="avatar-status avatar-sm-status avatar-success position-relative me-1 bottom-0 end-0">&nbsp;</span> Delivered</td>';
    }else{
        $st='<td><span class="avatar-status avatar-sm-status avatar-danger position-relative me-1 bottom-0 end-0">&nbsp;</span> Declined</td>';
    }
    $data.='<tr><td><img src="../images/product/'.$orders['product_image'].'" width="50px" height="50px" alt=""></td><td>'.$orders['product_name'].'</td>'.'<td>'.date_format(date_create($orders['order_date']),'d-M-y h:i A').'</td>'.$st.'<td><a href="../order/seller_side_order_details.php?id='.$orders['order_id'].'"> See order details</a></td>'.'</tr>';
}
echo $data;
?>
 