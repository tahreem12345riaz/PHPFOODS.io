<?php
include('../includes/connect.php');
include('../function/common_function.php');
error_reporting(0);

if(isset($_GET['userid'])){
    $userid=$_GET['userid'];
    

}
///geTTING TOTAL ITEMS AND TOTAL PRICES OF ALL ITEMS IN THE CARD/////
$getipaddress=getIPAddress();
$total_prices=0;
$cart_query_prices="Select * from cart_details where Ip_Address='$getipaddress'";
$result_cart_prices=mysqli_query($con,$cart_query_prices);
  $invoicesnumber=mt_rand();
$status='pending';
$count_product=mysqli_num_rows($result_cart_prices);
while($row_prices=mysqli_fetch_array($result_cart_prices)){
    $product_id=$row_prices['product_id'];
    $select_product="select * from products where product_id='$product_id'";
    $run_prices=mysqli_query($con,$select_product);
    while($row_product_prices=mysqli_fetch_array($run_prices)){
        $product_prices=array($row_product_prices['Product_Prices']);
        $product_values=array_sum($product_prices);
        $total_prices+=$product_values;
    }
}
/////GETTING QUANTITY FROM CART //////
$get_cart="select * from cart_details";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0)
{
$quantity=1;
$subtotal=$total_prices;
}else{
$quantity=$quantity;
$subtotal=$total_prices*$quantity;
}
$insert_orders="Insert into users_orders (userid,amountdue,invoicesnumber,totalproducts,orderdate,orderstatus)
values ($userid,$subtotal,$invoicesnumber,$count_product,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
echo "<script>alert('orders are submit successfully')";
echo "<script>alert('profile.php','_self')</script>";
}
///pendrING ORDERS/////
$insertpendingorders="Insert into orderpending (userid,invoicesnumber,product_id,quantity,orderstatus) values
('$userid','$invoicesnumber','$product_id','$quantity','$status')";
$result_pendingorders=mysqli_query($con,$insertpendingorders);

///DELETEING ITEMS FROM CART ////////
$emptycard="delete from  cart_details where Ip_Address='$getipaddress'";
$resultdelete=mysqli_query($con,$emptycard);
?>
