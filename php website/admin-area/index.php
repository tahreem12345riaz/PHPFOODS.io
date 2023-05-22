<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

<style>
    .admin-image{
width: 100px;
object-fit: contain;

    }
    .footer{
        position:absolute;
        bottom:0;
    }
    .products_images{
        width:100px;
        object-fit:contain;
    }
</style>
</head>
<body>
<!--navbar-->
<div class="container-fluid p-0">
    <!--fst div-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning ">
        <div class="container-fluid">
            <img src="../images0.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg  ">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome To All</a>
                    </li>
                </ul>
            </nav>

        </div>
    </nav>
    <!---second div--->
  <div class="bg-light">
    <h3 class="text-center p-2">MANAGE DETAILS</h3>
  </div>
<!---third div--->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center" >
        <div class="p-3">
            <a href="#" ><img src="../drink2.png" alt="" class="admin-image"></a>
            <p class="text-light text-center">Admin name</p>
        </div>
        <div class="button text-center">
        <button class="my-3"><a href="index.php?insertproduct" class="nav-link text-light bg-warning my-1">INSERT PRODUCT</a></button>
        <button> <a href="index.php?insertcategories" class="nav-link text-light bg-warning my-1">INSERT CATEGORIES </a></button>
        <button> <a href="index.php?viewproduct" class="nav-link text-light bg-warning my-1">VIEW PRODUCT</a></button>
        <button> <a href="index.php?insert_brand" class="nav-link text-light bg-warning my-1">INSERT BRANDS</a></button>
        <button> <a href="index.php?viewcategories" class="nav-link text-light bg-warning my-1">VIEW CATEGORIES</a></button>

        <button> <a href="index.php?viewbrand" class="nav-link text-light bg-warning my-1">VIEW BRANDS</a></button>
        <button>  <a href="index.php?list_orders" class="nav-link text-light bg-warning my-1">ALL ORDERS</a></button>
       <button>   <a href="index.php?listpayment" class="nav-link text-light bg-warning my-1">ALL PAYMENTS</a></button>
       <button>  <a href="index.php?listuser" class="nav-link text-light bg-warning my-1">LIST USER</a></button>
     <button>   <a href="" class="nav-link text-light bg-warning my-1">LOGOUT</a></button>
        </div>
    </div>
</div>
</div>
<!---fourth div-->
<div class="container my-3">
    <?php
    
    
    if(isset($_GET['insert_brand'])){
        include('insert_brand.php');
    }
    if(isset($_GET['insertcategories'])){
        include('insertcategories.php');
    }
    if(isset($_GET['viewproduct'])){
        include('viewproduct.php');
    }
    if(isset($_GET['insertproduct'])){
        include('insertproduct.php');
    }
    if(isset($_GET['edit_produt'])){
        include('edit_produt.php');
    }
    
    if(isset($_GET['delete_product'])){
        include('delete_product.php');
    }
    if(isset($_GET['viewbrand'])){
        include('viewbrand.php');
    }
    if(isset($_GET['viewcategories'])){
        include('viewcategories.php');
    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    }
    
    if(isset($_GET['editbrand'])){
        include('editbrand.php');
    }
    
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }
    if(isset($_GET['delete_brand'])){
        include('delete_brand.php');
    }
    
    if(isset($_GET['list_orders'])){
        include('list_orders.php');
    }
    
    if(isset($_GET['listpayment'])){
        include('listpayment.php');
    }
    
    if(isset($_GET['listuser'])){
        include('listuser.php');
    }
  
    ?>

    
</div>
</div>
<!---last child--->
<?php
include("../includes/footer.php")
?>
</div>

<!---bootstrp js links--->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>
</html>