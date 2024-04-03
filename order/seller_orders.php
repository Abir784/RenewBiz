<?php
$page = " Seller Orders";
include '../session_check.php';
include '../db.php';
include '../page_includes/dashboard_header.php';
$join_product_order_table="SELECT o.id as order_id,p.image as product_image,p.name as product_name, o.created_at as order_date ,o.status as order_status From product p,orders o WHERE (o.product_id = p.id and p.user_id = $user_id)";
$join_product_order_table_result= mysqli_query($dbconnect,$join_product_order_table);
?>

<div class="container">
            <div class="d-flex align-items-center px-4 py-3">
              <h6 class="card-header-title mb-0">Goals</h6>
              <div class="ms-auto">
                <select class="form-select form-select-sm mb-2">
                  <option>Status</option>
                </select>

                <select class="form-select form-select-sm">
                  <option>Date</option>
                </select>
              </div>
            </div>
    <table class="table card-table table-nowrap">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($join_product_order_table_result as $orders){ ?>
            <tr>
                <td><img src="../images/product/<?=$orders['product_image']?>" width="50px" height="50px" alt=""></td>
                <td><?=$orders['product_name']?></td>
                <td><?php
                echo date_format(date_create($orders['order_date']),'d-M-y h:i A')?></td>
                <?php if($orders['order_status']==0){ ?>
                   <td><span class="avatar-status avatar-sm-status avatar-offline position-relative me-1 bottom-0 end-0">&nbsp;</span> Pending</td>
                <?php } elseif($orders['order_status'] == 1) {?>
                    <td><span class="avatar-status avatar-sm-status avatar-warning position-relative me-1 bottom-0 end-0">&nbsp;</span> Accepted</td>
                <?php } elseif($orders['order_status'] == 2) {?>
                    <td> <span class="avatar-status avatar-sm-status avatar-success position-relative me-1 bottom-0 end-0">&nbsp;</span> Delivered</td>
                <?php }else{?>
                    <td><span class="avatar-status avatar-sm-status avatar-danger position-relative me-1 bottom-0 end-0">&nbsp;</span> Declined</td>
                <?php }?>
                <td><a href="../order/seller_side_order_details.php?id=<?=$orders['order_id']?>"> See order details</a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

</div>

















<?php
include '../page_includes/dashboard_footer.php';
?>