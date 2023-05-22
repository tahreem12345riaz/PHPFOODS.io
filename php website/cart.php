
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
    <title>Food Cart</title>
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
        .cart-img{
height: 100px;
width:200px;

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
      <li class="nav-item">
        <a class="nav-link" href="./user_area/register.php" style="color:darkblue;">Register</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();?></sup></a>
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
      <a class='nav-link' href='#' >Welcome   </a>

    </li>";
  }else{
          echo //// "<li class='nav-item'>
               // <a class='nav-link' href='#' >Welcome Guest</a>

         " <a class='nav-link' href='#' >Welcome Guest</a>
          </li>";
        }if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php' >Logout</a>
          </li>";        }else{
            echo  "<li class='nav-item'>
            <a class='nav-link' href='./user_area/userlogin.php' >login</a>
            </li>";

        }
        ?>
        <!--<li class="nav-item">
        <a class="nav-link" href="./user_area/userlogin.php" style="color:darkblue;">Login </a></li>
--->
</ul>
</nav>

<!---third child--->
<div class="bg-warning">
    <h3 class="text-center" style="color:darkblue;">Hidden Store</h3>
    <p class="text-center" style="color:darkblue;">communication is the best way and find e-commerce</p>
</div>
<!---4th div--->
<!---last child--->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center  btn-secondary">
        <thead>   
        
                <!---disPLAY PHP CODE-->
                <?php
                //global $con;
                $get_ip_address=getIPAddress();
                $total_price=0;
                $cart_query="Select * from cart_details where Ip_Address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
              // echo "<thead>   
             //<tr>
               //    <th>Product title</th>
                 //     <th>Product image</th>
                   //   <th>Quantity </th>
                     //  <th>Total Prices </th>
                       //<th>Remove </th>
                       //<th colspan='2'>Operations </th>
                   //</tr>
                   //</thead>
                   //<tbody>
               //";
                
                while($row=mysqli_fetch_assoc($result)){
                    $product_id= $row['product_id'];
                    $select_products="Select * from products where product_id='$product_id'";
                    $result_products=mysqli_query($con,$select_products);
                    while($row_Product_Prices=mysqli_fetch_array($result_products)){
                    $Product_Prices=array($row_Product_Prices['Product_Prices']); 
                    $price_table=$row_Product_Prices['Product_Prices'];
                    $Product_title=$row_Product_Prices['Product_title'];
                    $Product_Image2=$row_Product_Prices['Product_Image2'];
                    $Product_values=array_sum($Product_Prices); //[500]
                    $total_price+=$Product_values; //500
                
                ?>
                <thead>   
             <tr>
                      <th>Product title</th>
                       <th>Product image</th>
                       <th>Quantity </th>
                       <th>Total Prices </th>
                       <th>Remove </th>
                       <th colspan='2'>Operations </th>
                   </tr>
                   </thead>
                   <tbody>
                <tr>
                    <td><?php echo $Product_title?></td>
                    <td><img src="./admin-area/product_images/<?php echo $Product_Image2?>" alt="" class="cart-img"></td>
                    
                    <td><input type="text" name="qty"  class="form-input w-50"></td>
                    <?php
                 $get_ip_address=getIPAddress();
                 if(isset($_POST['update_cart'])){
                  $quantities=$_POST['qty'];
                  $update_cart="update cart_details set quantity=$quantities where Ip_Address='$get_ip_address'";
                   $result_products_quantities=mysqli_query($con,$update_cart);
                   $total_price=$total_price*$quantities;
                 }

                    
                    ?>
                    <td ><?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                      <!---  <button class="bg-warning px-3 py-2 border-0 mx-3">UPDATE</button>-->
                     <input type="submit" value="UPDATE CART"class="bg-warning px-3 py-2 border-0 mx-3" 
                     name="update_cart" >
                     <!---  <button class="bg-success px-3 py-2 border-0 mx-3">REMOVE</button>-->
                     <input type="submit" value="REMOVE CART"class="bg-warning px-3 py-2 border-0 mx-3" 
                     name="remove_cart" >
                    </td>
                </tr>
                <?php
                }}
            } 
           // echo "<h2 class='text-center text-danger' >caRT IS EMPTY NOW</h2>"
           ?>
            </tbody>
        </table>
        <!---SUB TOTAL--->
        <div class="d-flex mb-5">
          <?php
          $get_ip_address=getIPAddress();
          //$total_price=0;
          $cart_query="Select * from cart_details where Ip_Address='$get_ip_address'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo "<h4 class='px-3'>SUBTOTAL:<strong class='text-warning'>$total_price /-</strong></h4>
            <input type='submit' value='Continue Shopping' class='bg-warning px-3 py-2 border-0 mx-3' 
            name='contineu_shopping' >         
                
       <a href='checkout.php'><button class='bg-success px-3 py-2 border-0'> <a href='./user_area/userlogin.php'>CHECKOUT</a></button>
           ";
          }else{
            echo "<input type='submit' value=contineu_shopping class='bg-success px-3 py-2 bprder-0 mx-3'
            name= 'contineu_shopping'>";
        //  echo "<input type='submit' value='if your are login payment here' class='bg-warning px-3 py-2 border-0 mx-3' 
          //name='payment_here' >      ";
          }if(isset($_POST['contineu_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          //if(isset($_POST['payment_here'])){
            //echo "<script>window.open('payment.php','_self')</script>";
          //}
          ?>
           
        </div> 
    </div>
</div>
</form>
<!--FUNCTION TO REMOVE ITEMS-->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;
    $delete_query="Delete from cart_details where product_id='$remove_id'";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
echo "<script>window.open('cart.php','_self')</script>";
    }
    }
  }
}
echo $removeitem=remove_cart_item();
?>
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
