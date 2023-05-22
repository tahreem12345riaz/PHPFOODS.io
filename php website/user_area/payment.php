<?php
include('../includes/connect.php');
include('../function/common_function.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <!-- bootstap-->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <!--css -->
    <link rel="stylesheet" href="style.css">
    
    
</head>
<style>
    img{
        width:90%;
        margin:auto;
        display: block;
        
    }
    .logo{
width: 7%;
height: 70%;
}
</style>
<body>
    
    <!---php user id-->
    <?php
$userIP=getIPAddress();
$get_user="select * from users_tabel where userid='$userIP'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$userid=$run_query['userid'];
?>
 <div class="container">
    <h2 class="text-center text-primary">Payment Option</h2>
    <div class="row d-flex ">
        <div class="col-md-8 ">
        <a href="https://www.sc.com/pk/credit-cards" target="_blank" ><img src="./userimages/visa.png" alt=""></a>
    </div>
    <div class="col-md-8 justify-content-center align-items-center">
        <a href="orders.php?userid=<?php echo $userid ?>" class="text-center" ><h1>OFFLINE</h1> </a>
    </div>
    </div>
 </div>
</body>
</html>