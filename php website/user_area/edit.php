
<?php
$con = mysqli_connect('localhost','root','','mystore');

if(isset($_GET['edit.php'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from users_tabel where username='$user_session_name'";
   $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $userid=$row_fetch['userid'];
    $user_username=$row_fetch['username'];
    $user_email=$row_fetch['useremail'];
    $user_address=$row_fetch['useraddress'];
    $user_mobile=$row_fetch['usermobile'];
}
    if(isset($_POST['user_update'])){
   //   $update_id=$userid;
      $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp,"./userimages/$user_image");

///update quERY /////
$update_data="update users_tabel set username='$user_username',useremail='$user_email',userimage='$user_image',
useraddress='$user_address',usermobile='$user_mobile'";
$result_query_update=mysqli_query($con,$update_data);
if($result_query_update){
  echo "<script>alert('data IS UPDATE  ')</script> ";
  echo "<script>window.open('logout.php','_self')</script>";
    }




  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    
<?php
include('../function/common_function.php');
session_start();
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?> </title>
    <!-- bootstap-->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css -->
    <link rel="stylesheet" href="style.css">
    
    </style>
    <style>
     body{
        overflow-x:hidden;
     }
     .profile-img{
        width:90%;
        height: 100%;
        margin:auto;
        display:block;
     }
     .edit_image{
        width: 100px;
        height: 100px;
        object-fit:contain;
     }
    </style>
</head>
<body>
<!---navbar-->
<div class="container-fluid p-1">
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
<div class="container-fluid"> 
    <img src="./images/images.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php" style="color:darkblue;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php" style="color:darkblue;">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php" style="color:darkblue;">My Account</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" style="color:darkblue;">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php" style="color:darkblue;">Total price:<?php total_cart_prices();?></a>
      </li>
    </ul>
    
  </div>
</div> 
</nav>
<!---calling function -->
<?php
cart();
?>
<!---second navbar---->
<nav  class="navbar navbar-expand-lg navbar-dark bg-success">
     <ul class="navbar-nav me-auto">   
        
      <?php
      if(!isset($_SESSION['username'])){
      echo  " <li class='nav-item'>
      <a class='nav-link' href='#' >Welcome</a>

    </li>";
  }else{
          echo  "<li class='nav-item'>
          <a class='nav-link' href='#' >Welcome ".$_SESSION['username']." </a>
          </li>";
        }
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link' href='../user_area/logout.php' >logout</a>
          </li>";        }else{
            echo  "<li class='nav-item'>
            <a class='nav-link' href='../user_area/userlogin.php' >Login</a>

            </li>";

        }
?>
</ul>
</nav>

<!---third child--->
<div class="bg-warning">
    <h3 class="text-center" style="color:darkblue;">Hidden Store</h3>
    <p class="text-center" style="color:darkblue;">communication is the best way and find e-commerce</p>
</div>
<div class="row">
    <div class="col-md-2 ">
        <ul class="navbar-nav bg-warning text-center" style="height:100vh;">
            <li class="nav-items bg-success">
                <a class="nav-link text-light" aria-current="page" style="font-size: 20px;" href="../index.php">Your Profile</a>
            </li>
            <?php
 $username=$_SESSION['username'];
 $userimage="select * from users_tabel where username='$username'";
 $userimage=mysqli_query($con,$userimage);
 $row_image=mysqli_fetch_array($userimage);
 $userimage=$row_image['userimage'];
 echo " <li class='nav-item'>
 <img src='./userimages/admin.png.png' class='profile-img' alt=''>
</li>";

            ?>
        
          
           
            <li class="nav-items ">
                <a class="nav-link text-light" aria-current="page" style="font-size: 20px;" href="edit.php">Edit Account </a>
            </li>
            <li class="nav-items ">
                <a class="nav-link text-light" aria-current="page" style="font-size: 20px;" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-items ">
                <a class="nav-link text-light" aria-current="page"  style="font-size: 20px;" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-items ">
                <a class="nav-link text-light" aria-current="page" href="logout.php" style="font-size: 20px;">Logout</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
      
    <a href="edit.php"></a> <h2 class="text-center text-success mb-4">Edit Account</h2>
      <form action=""  method="post" enctype="multipart/form-data" class="text-center">
     <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo $username  ?>">
     </div>
     <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $useremail  ?>">
     </div>
     <div class="form-outline mb-4">
        <input type="file" class="form-control w-50 m-auto" name="user_image" >
        <img src="./userimages/admin.png.png<?php echo $userimage?>" alt="" class="edit_image">
     </div>
     <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $useraddress  ?>">
     </div>
     <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $usermobile  ?>">
     </div>
     <input type="submit" value="Update" class="bg-warning py-2 px-3"  style="box-shadow: 5px 10px 20px;" name="user_update">
      </form>
         

</div>
</div>

<!---last child--->
<!---INCLUDE FOOTER---->
<?php
include("../includes/footer.php")
?>

</div>

     <!-- bootstap js link-->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>