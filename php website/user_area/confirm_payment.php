<?php
include('../includes/connect.php');
//include('../function/common_function.php');
session_start();
//error_reporting(0);
if(isset($_GET['ordersid'])){
$ordersid=$_GET['ordersid'];
$select_data="select * from users_orders where ordersid=$ordersid";
$result=mysqli_query($con,$select_data);
$row_fetch=mysqli_fetch_assoc($result);
$invoicesnumber=$row_fetch['invoicesnumber'];
$amountdue=$row_fetch['amountdue'];
}
if(isset($_POST['confirm_payment'])){
    $Invoices_number=$_POST['Invoices_number'];
    $amount=$_POST['amount'];
    $Payment_mode=$_POST['Payment_mode'];
    $insert_query="insert into user_payment (ordersid,invoicesnumber,amount,Payment_mode) values
    ('$ordersid','$Invoices_number','$amount','$Payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
        echo "<h3 class='text-center text-light'>complete payment successfully</h3>";

    }
    $update_orders="update users_orders set orderstatus='complete ' where ordersid=$ordersid";
    $result_orders=mysqli_query($con,$update_orders);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
     <!-- bootstap-->
     <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
</head>
<body class="bg-warning">
    <div class="container my-5">
        <h1 class="text-center text-danger">PAYMENT CONFIRM</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="Invoices_number" value="<?php echo $invoicesnumber?>">
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-danger">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amountdue?>">
            </div>
           <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="Payment_mode " class="form-select w-50 m-auto" >
                <option>Select Payment Mode</option>
                <option>Al Habib</option>
                <option>Alied Bank</option>
                <option>Debit card</option>
                <option>C.O.D</option>
            </select>
           </div>
           <br>
           <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" class="bg-success py-2 px-3 border-0" value="confirm" name="confirm_payment">
           </div>
           
            </div>
        </form>
    </div>
    
</body>
</html>