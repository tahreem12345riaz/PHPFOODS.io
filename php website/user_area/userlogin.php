<?php
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <!-- bootstap-->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <!--fontawesome-->
<style>
    body{
        overflow-x:hidden;
    }
</style>
</style>
</head>
<!---navbar-->
<div class="container-fluid p-1">
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
<div class="container-fluid"> 
    <img src="./images/images.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!---<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color:darkblue;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php" style="color:darkblue;">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:darkblue;">Register</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" style="color:darkblue;">Contact</a>
      </li>
      
    </ul>
    <form class="d-flex" action="" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
     <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>--->
   </form>
  </div>
</div> 


<!---second navbar---->


<body class="div1">
    <div class="container-fluid m-3">
        <h2 class="text-center">USER LOGIN</h2>
        <div class="row m-flex align-items-center justify-content-center mt-5"> 
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <div class="form-outline">
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control bg-warning m-2"
                        placeholder="ENTER YOUR NAME" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <div class="form-outline">
                        <label for="user_username" class="form-label">Password</label>
                        <input type="text" id="user_userpassword" class="form-control bg-warning m-2"
                        placeholder="ENTER YOUR PASSWORD" autocomplete="off" required="required" name="user_userpassword"/>
                    </div>
                    <div class=" mt-4">
                        <input type="submit" value="Login" class="bg-warning m-2 p-2 border-0" name="user_login"  >
                    </div>
                    <p class="small fw-bold m-2 p-2">DO NOT HAVE AN ACCOUNT?<a href="register.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
    <!---INCLUDE FOOTER---->

</body>


    <!---last child--->
<!---INCLUDE FOOTER---->
<?php

if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_userpassword=$_POST['user_userpassword'];
$select_query="Select * from users_tabel where username='$user_username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();
//cart items//
$select_query_cart="Select * from cart_details where Ip_Address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
if($row_count>0){
 // $_SESSION['username']=$username;

if(password_verify($user_userpassword,$row_data['userpassword'])){
 
//echo "<script>alert('incalid password and username ')</script>";
}else{
if($row_count==1 and $row_count_cart==0){
  // $_SESSION['username']=$username;
    
    echo "<script>window.open('profile.php','_self')</script>";
  }else{
    $_SESSION['username']=$username;
    echo "<script>alert('Login Successfully ')</script>";
    echo "<script>window.open('payment.php','_self')</script>";
    //profile.php
}

}
}else{
        echo "<script>alert('invalid password and username' )</script>";
       
}

}





?>


</html>