<?php
include('../includes/connect.php');
include('../function/common_function.php');
if(isset($_GET['register'])){
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_userpassword=$_POST['user_userpassword'];
    //$user_Cpassword=$_POST['user_Cpassword'];
    $user_address=$_POST['user_address'];
    $user_usercontact=$_POST['user_usercontact'];
    $user_image=$_POST['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_image'];
    $userIP=getIPAddress();
    //select query////
    $select_query="select * from users_tabel where username='$username' oruseremail='$user_email'";
    $result = mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('username and email already exist ')</script>";
    } 
    else{
    //////insertquery//////
    move_uploaded_file($user_image_tmp,"./userimages/$user_image");
    $insert_query="insert into users_tabel (username,useremail,userpassword,userimage,userIP,useraddress,usermobile)
    VALUES ('$username','$user_email','$user_userpassword','$user_image','$userIP','$user_address','$user_usercontact')";
    $sql_execute=mysqli_query($con,$insert_query);
    }
    ///select cart items ///
    $select_cart_items="select * from cart_details where Ip_Address='$userIP'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);

    if($rows_count>0){
        $_SESSION['username']=$username;
        echo "<script>alert('you have items in your cart ')</script>";
        echo "<script>alert('checkout.php','_self')</script>";

    }else{
        echo "<script>alert('../index.php','_self')</script>";
    }
    }
    

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <!-- bootstap-->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <!--fontawesome-->

</style>
</head>
<body class="div1">
    <div class="container-fluid m-3">
        <h2 class="text-center">NEW USER REGISTRATION</h2>
        <div class="row m-flex align-items-center justify-content-center"> 
            <div class="col-lg-12 col-xl-6">
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <div class="form-outline">
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="username" class="form-control bg-warning m-2"
                        placeholder="ENTER YOUR NAME" autocomplete="off" required="required" name="username"/>
                    </div>
                    <div class="form-outline">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control bg-warning m-2"
                        placeholder="ENTER YOUR EMAIL" autocomplete="off" required="required" name="user_email">
                    </div>
                 
                    <div class="form-outline">
                        <label for="user_username" class="form-label">Password</label>
                        <input type="text" id="user_userpassword" class="form-control bg-warning m-2"
                        placeholder="ENTER YOUR PASSWORD" autocomplete="off" required="required" name="user_userpassword">
                    </div>
                    
                  <!---  <div class="form-outline">
                        <label for="user_username" class="form-label">Confirm Password</label>
                        <input type="text" id="user_Cpassword" class="form-control bg-warning m-2"
                        placeholder="ENTER YOUR NAME" autocomplete="off" required="required" name="user_Cpassword">
                    </div>--->
                    <div class="form-outline">
                        <label for="user_username" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control bg-warning m-2"
                        placeholder="image" autocomplete="off" required="required" name="user_image">
                    </div>
                    <div class="form-outline">
                        <label for="user_username" class="form-label">User Address</label>
                        <input type="text" id="user_address" class="form-control bg-warning m-2"
                        placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <div class="form-outline">
                        <label for="user_username" class="form-label">User Contact</label>
                        <input type="text" id="user_usercontact" class="form-control bg-warning m-2"
                        placeholder="Enter Your Contact" autocomplete="off" required="required" name="user_usercontact">
                    </div>
                    <div class=" mt-4">
                        <input type="submit" value="Register" class="bg-warning m-2 p-2 border-0" name="register"  >
                    </div>
                    <p class="small fw-bold m-2 p-2">ALEADY HAVE AN ACCOUNT?<a href="userlogin.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


