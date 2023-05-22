
<?php
include('includes/connect.php');
include('function/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD</title>
    <!-- bootstap-->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css -->
    <link rel="stylesheet" href="./style.css">
    
    </style>
    <style>
     body{
      overflow-x: hidden;
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
        <a class="nav-link" href="index.php" style="color:darkblue;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php" style="color:darkblue;">Products</a>
      </li>
      <?php
      if(!isset($_SESSION['username'])){
       " <li class='nav-item'>
        <a class='nav-link' href='./user_area/profile.php' style='color:darkblue;'>Register</a>
      </li>";
      }else{
        " <li class='nav-item'>
        <a class='nav-link' href='./user_area/register.php' style='color:darkblue;'>Register</a>
      </li>";
      }
        ?>
      
       
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php" style="color:darkblue;">Total price:<?php total_cart_prices();?></a>
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
<?php
cart();
?>
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
          <a class='nav-link' href='#' >Welcome</a>
          </li>";
        }
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link' href='./user_area/userlogin.php' >Login</a>
          </li>";        }else{
            echo  "<li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php' >logout</a>
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
  <div class="col-md-10">
    <!---products--->
<div class="row" >
  <!---FETCHING DATA ---->
    <?php
    ////cll the function from comman function//
    getIPAddress();
    
    getproduct();
    get_unique_categories();
    //$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 
    ?>
   <!--- <div class="col-md-4 mb-2">
        <div class="card">
            <img src="./images/bir.png" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Biryani</h5>
        <p class="card-text">How would you describe a delicious biryani?
Biryani is known for its aroma and flavor. Fresh herbs, saffron, and basmati rice give it a sweet-floral 
aroma that hits the nose before you taste it. Whole garam masala, fried onions, and marinated meat provide warmth and 
subtle heat to the dish. Overall, it tastes like a savory, spiced rice pilaf.</p>
            <a href="#" class="btn btn-success"> ADD TO CART</a>
            <a href="#" class="btn btn-secondary"> View More  </a>
    </div>
    </div>
    </div>-->
    <!---row ending --->
  </div>
      <!---column ending --->
</div>
<div class="col-md-2 bg-warning p-0">
    <!---categories--->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success ">
            <a href="index.php?>Categories" class="nav-link text-light"><h4 style="color:darkblue;backgroundcolor:green;font-family:italian;">Categories</h4></a>
        </li>
       
        <?php
     getcategories();

        ?>

        
        
        
    </ul>
<!---brands-->
<ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success ">
            <a href="#" class="nav-link text-light"><h4 style="color:darkblue;backgroundcolor:green;font-family:italian;">Delivery Brands </h4></a>
        </li>
        <?php
     getbrand();

        ?>
        
    </ul>
</div>
</div>

<!---last child--->
<!---INCLUDE FOOTER---->
<?php
include("./includes/footer.php")
?>

</div>

     <!-- bootstap js link-->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
