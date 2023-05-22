<?php
include('../includes/connect.php');
include('../function/common_function.php');
if(isset($_POST['regadmin'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $C_password=$_POST['C_password'];
    $select = "SELECT * FROM `admin_table`
    WHERE  admin_name ='$admin_name' && admin_email ='$admin_email' && admin_password='$admin_password' ";
$result=mysqli_query($con,$select);
if(mysqli_num_rows($result)>0){
    echo "user Already Exists";
}else{
    $sql = "INSERT INTO admin_table ( `admin_name`, `admin_email`, `admin_password`) VALUES ( '$admin_name', '$admin_email', '$admin_password');
    ";
    if($con->query($sql) == true ){
        echo "YOU ARE REGISTERD SUCCESSFULLY";
        header('location:admin_login.php');
    }else{
        echo "error : $sql <br> $conn->error";
    }

}
$con->close();


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN REGISTER</title>
    <!----botstrap css links--->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!---csslink-->
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
 body{
 }
</style>
<body>
    <div class="container-fluid m-0">
        <h2 class="text-center mb-5">Admin Registration</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-6 ">

        <img src="../user_area/userimages/admin (1).jpg" alt="Admin Registration" class="img-fluid">
            </div>
           
            <div class="col-lg-6  col-xl-4 ">
         <form action="" method="post" name="myFoam">
            <div class="form-outline mb-4">
                <label for="admin_name" class="form-label">USERNAME</label>
                <input type="text" id="admin_name" name="admin_name" placeholder="Enter Ur Name" required="required" class="form-control">

            </div>
            
         
            <div class="form-outline mb-4">
                <label for="admin_email" class="form-label">EMAIL</label>
                <input type="email" id="admin_email" name="admin_email" placeholder="Enter Ur Email" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="admin_password" class="form-label">PASSWORD</label>
                <input type="password" id="admin_password" name="admin_password" placeholder="Enter Ur password" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="C_password" class="form-label">CONFIRM PASSWORD</label>
                <input type="password" id="C_password" name="C_password" placeholder="Enter Ur password" required="required" class="form-control">
            </div>
            <div>
            <input type="submit" class="bg-info py-2 px-3 border-1  mt-3 pt-1 " name="regadmin" value="Register">
                <p class="big fw-bold mt-2 pt-1">ALERADY HAVE AN ACCOUNT? <a href="admin_login.php">REGISTER</a></p>
            </div>
         </form>
        </div>
        
        </div>
        
    </div>
</body>
</html>