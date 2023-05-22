
<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();
error_reporting(0);
/////Buttton Click WOrk///////
if(isset($_POST['Delete'])){
  $Delete_query="Delete from users_tabel where username='$username'";
  $result=mysqli_query($con,$Delete_query);
  if($result){
session_destroy();
echo "<script>alert('Account Delete Successfully')</script>";
echo "<script>window.open('../index.php','_self')</script>";

  }
}
if(isset($_POST['Dont_Delete'])){
  echo "<script>window.open('../index.php','_self')</script>";

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account <?php echo $_SESSION['username']?> </title>
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
     
      .form-control {width: 750px;
        padding: 5%;
      font: 1em sans-serif;
      font_size:50px;
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
                <a class="nav-link text-light" aria-current="page" style="font-size: 20px;" href="user_edit.php">My Orders</a>
            </li>
            <li class="nav-items ">
                <a class="nav-link text-light" aria-current="page"  style="font-size: 20px;" href="delete_account.php">Delete Account</a>
            </li>
            <li class="nav-items ">
                <a class="nav-link text-light" aria-current="page" href="logout.php" style="font-size: 20px;">Logout</a>
            </li>
        </ul>
    </div>
    <h2 class="text-center text-success mb-4">Delete Account</h2>  
      <form action="" class="mt-5" method="post">
      <div class="form-outline mb-4">
      <input type="Submit" style="box-shadow: 5px 10px 20px;" class="form-control w-10 m-auto bg-warning" name="Delete" value="  Delete  " >
        </div>
        <div class="form-outline mb-4">
        <input type="Submit" class="form-control w-30 m-auto bg-warning" style="box-shadow: 5px 10px 20px;" name="Dont_Delete" value="Don't Delete " >
        </div>
    </form>

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
