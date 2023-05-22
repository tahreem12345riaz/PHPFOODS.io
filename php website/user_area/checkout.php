<?php
include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chechout</title>
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
</head>
<body>
<!---navbar-->
<div class="container-fluid p-1">
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
<div class="container-fluid"> 
    <img src="./userimages/images.png" alt="" class="logo">
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
        <a class="nav-link" href="register.php" style="color:darkblue;">Register</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" style="color:darkblue;">Contact</a>
      </li>
     
      
    </ul>
    <form class="d-flex" action="" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <!--<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>-->
<input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
    </form>
  </div>
</div> 
</nav>
<!---calling function -->

<!---second navbar---->
<nav  class="navbar navbar-expand-lg navbar-dark bg-success">
     <ul class="navbar-nav me-auto">
     
<?php
if(!isset($_SESSION['username'])){
  echo  " <li class='nav-item'>
  <a class='nav-link' href='#' >Welcome </a>

</li>";
}else{
      echo  "<li class='nav-item'>
      <a class='nav-link' href='#' >Welcome ". $_SESSION['username']."</a>
      </li>";
    }
if(!isset($_SESSION['username'])){
echo "<li class='nav-item'>
<a class='nav-link' href='logout.php' style='color:darkblue;'>logout  </a>
</li>";
}else{
  echo "<li class='nav-item'>
<a class='nav-link' href='userlogin.php' style='color:darkblue;'>login  </a>
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
<!---4th div--->
<div class="row px-1">
  <div class="col-md-12">
    <!---products--->
<div class="row" >
  <?php
  if(!isset($_SESSION['username'])){
    include('payment.php');

  }else{
    include('userlogin.php');
  }
  ?>
  </div>
      <!---column ending --->
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
