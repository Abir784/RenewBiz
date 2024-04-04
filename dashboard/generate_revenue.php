<?php
include '../db.php';

require '../vendor/autoload.php';
$user_id=$_GET['id'];
//product details for renvenue
$join_product_order_table_seller="SELECT o.id as order_id,o.total_price as total_price,p.name as product_name,o.weight as quantity,o.updated_at as delivery_date From product p,orders o WHERE (o.product_id = p.id and p.user_id ='$user_id' and o.status=2);";
$join_product_order_table_seller_result= mysqli_query($dbconnect,$join_product_order_table_seller);
// sller details
$seller_select_query="SELECT * FROM seller WHERE user_id = '$user_id'";
$seller_select_query_result=mysqli_query($dbconnect,$seller_select_query);
$seller=mysqli_fetch_assoc($seller_select_query_result);

$seller_details='<b>Seller Name:</b> '.$seller['name'].'<br><b>Phone No:</b> '.$seller['phone_number'].'<br><b>Business Name:</b> '.$seller['business_name'].'<br><b>Address:</b> '.$seller['address'].'<br><b>Business Industry:</b> '.$seller['business_industry'];

$data="";
$grand_total=0;
foreach($join_product_order_table_seller_result as $seller_orders){
    $grand_total+=$seller_orders['total_price'];
    $data.="<tr>"."<td>".'#'.$seller_orders['order_id']."</td>"."<td>".$seller_orders['product_name']."</td>"."<td>".$seller_orders['quantity']."</td>"."<td>".$seller_orders['total_price']."<td>".$seller_orders['delivery_date']."</td>"."</td>"."</tr>";
};
use Dompdf\Dompdf;
$dompdf = new Dompdf();


$html = '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1" /><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script><title>Revenue Report</title><link rel="icon" href="../favicon.ico" type="image/x-icon" /><style>.invoice-box table {width: 100%;line-height: inherit;text-align: left;border-collapse: collapse;} .invoice-box table td {padding: 5px;vertical-align: top;} .invoice-box table tr td:nth-child(2) {text-align: right;} .invoice-box table tr.top table td {padding-bottom: 20px;} .invoice-box table tr.top table td.title {font-size: 45px;line-height: 45px;color: #333;} .invoice-box table tr.information table td {padding-bottom: 40px;} .invoice-box table tr.heading td {background: rgb(159, 99, 99);border-bottom: 1px solid #ddd;font-weight: bold;} .invoice-box table tr.details td {padding-bottom: 20px;} .invoice-box table tr.item td {border-bottom: 1px solid #eee;} .invoice-box table tr.item.last td {border-bottom: none;} .invoice-box table tr.total td:nth-child(2) {border-top: 2px solid #eee;font-weight: bold;} @media only screen and (max-width: 600px) {.invoice-box table tr.top table td {width: 100%;display: block;text-align: center;} .invoice-box table tr.information table td {width: 100%;display: block;text-align: center;}}</style></head><body><div class="invoice-box"><div class="row"><div class="col-lg-12"><div class="card"><div class="card-body"><pre><h3 style="margin-left:150px">RenewBIz-  Grow Business and Nature</h3><h4 style="margin-left:260px"><u>Revenue Report</u></h4>'.$seller_details .'</pre><table class="table table-light" border="1"><thead class="thead-light"><tr><th>Order Id</th><th>Product Name</th><th>Qunatity</th><th>Total Price</th><th>Delivery Date</th></tr></thead><tbody>'. $data .'</tbody></table><h3 style="margin-left:220px;">Total Revenue: '.$grand_total.' Taka</h3></div></div></div></div></div></div></body></html>';


$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); 
$dompdf->render(); 
$dompdf->stream('Revenue Report Of '.$seller['name']);

?>