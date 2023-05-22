<?php
//including connect file //
//include('./includes/connect.php');
/////get products /////////
function getproduct(){
    global $con;
    ///condition chk issest or nor///
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brands'])){
    $select_query="select * from products order by rand() LIMIT 0,4";
    $result_query=mysqli_query($con,$select_query);
   // $row=mysqli_fetch_assoc($result_query);
    //echo $row['Product_title'];
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id= $row['product_id'];
    $Product_title= $row['Product_title'];
    $Product_description= $row['Product_description'];
    $Product_Keywords= $row['Product_Keywords'];
    $Product_Prices=$row['Product_Prices'];
    $Categories_id= $row['Categories_id'];
    $Brands_id= $row['Brands_id'];
    $Product_Image3= $row['Product_Image3'];
echo "<div class='col-md-4 mb-2'>
  <div class='card'>
    <img src='./admin-area/product_images/$Product_Image3'
     class='card-img-top' alt='$Product_title'>
<div class='card-body'>
<h5 class='card-title'>$Product_title</h5>
<p class='card-text'>$Product_description</p>
<p class='card-text'>prices: $Product_Prices/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'> ADD TO CART</a>
    <a href='products_details.php?product_id=$product_id' class='btn btn-secondary'> View More  </a>
</div>
</div>
</div>
";}
   }
}
}
////GETTING ALL PRODUCTS////
function get_all_products(){
    global $con;
    ///condition chk issest or nor///
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brands'])){
    $select_query="select * from products order by rand()";
    $result_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    //echo $row['Product_title'];
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id= $row['product_id'];
    $Product_title= $row['Product_title'];
    $Product_description= $row['Product_description'];
    $Product_Keywords= $row['Product_Keywords'];
    $Product_Prices=$row['Product_Prices'];

    $Categories_id= $row['Categories_id'];
    $Brands_id= $row['Brands_id'];
    $Product_Image3= $row['Product_Image3'];
echo "<div class='col-md-4 mb-2'>
  <div class='card'>
    <img src='./admin-area/product_images/$Product_Image3'
     class='card-img-top' alt='$Product_title'>
<div class='card-body'>
<h5 class='card-title'>$Product_title</h5>
<p class='card-text'>$Product_description</p>
<p class='card-text'>prices: $Product_Prices/-</p>

<a href='index.php?add_to_cart=$product_id' class='btn btn-success'> ADD TO CART</a>
<a href='products_details.php?product_id=$product_id' class='btn btn-secondary'> View More  </a>
</div>
</div>
</div>
";}
   }
}
}
///getting unique categories////
function get_unique_categories(){
    global $con;
///condition chk issest or nor///
if(isset($_GET['categories'])){
    $Categories_id= $_GET['categories'];
$select_query="select * from products where Categories_id = $Categories_id ";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows == 0){
    echo  "<h2 class='text-center text-danger'>NO STOCK FOR THIS CATEGORY</h2>";

}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['Product_title'];
while(    $row=mysqli_fetch_assoc($result_query)){
$product_id= $row['product_id'];
$Product_title= $row['Product_title'];
$Product_description= $row['Product_description'];
$Product_Keywords= $row['Product_Keywords'];
$Product_Prices=$row['Product_Prices'];
$Categories_id= $row['Categories_id'];
$Brands_id= $row['Brands_id'];
$Product_Image3= $row['Product_Image3'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin-area/product_images/$Product_Image3'
 class='card-img-top' alt='$Product_title'>
<div class='card-body'>
<h5 class='card-title'>$Product_title</h5>
<p class='card-text'>$Product_description</p>
<p class='card-text'>prices: $Product_Prices/-</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-success'> ADD TO CART</a>
<a href='products_details.php?product_id=$product_id' class='btn btn-secondary'> View More  </a>
</div>
</div>
</div>
";}
}
}
///getting unique brands////
function get_unique_Brands(){
    global $con;
///condition chk issest or nor///
if(isset($_GET['brands'])){
    $Brands_id= $_GET['brands'];
$select_query="select * from products where Brands_id = $Brands_id ";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows == 0){
  echo  "<h2 class='text-center text-danger'>NO STOCK FOR THIS CATEGORY</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['Product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id= $row['product_id'];
$Product_title= $row['Product_title'];
$Product_description= $row['Product_description'];
$Product_Keywords= $row['Product_Keywords'];
$Categories_id= $row['Categories_id'];
$Brands_id= $row['Brands_id'];
$Product_Image3= $row['Product_Image3'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin-area/product_images/$Product_Image3'
 class='card-img-top' alt='$Product_title'>
<div class='card-body'>
<h5 class='card-title'>$Product_title</h5>
<p class='card-text'>$Product_description</p>
<p class='card-text'>prices: $Product_Prices/-</p>

<a href='index.php?add_to_cart=$product_id' class='btn btn-success'> ADD TO CART</a>
<a href='products_details.php?product_id=$product_id' class='btn btn-secondary'> View More  </a>
</div>
</div>
</div>
";}
}
}


   ////display brands in dashboard////
   function getbrand(){
    global $con;
    $select_brands="select * from brands";
    $result_brands=mysqli_query($con,$select_brands);
    //$row_data= mysqli_fetch_assoc($result_brands);
    //echo $row_data['Brands_title'];
while($row_data=mysqli_fetch_assoc($result_brands)){
   $Brands_title= $row_data['Brands_title'];
   $Brands_id = $row_data['Brands_id'];
   echo" <li class='nav-item'  >
   <a href='index.php?brand=$Brands_id' class='nav-link text-light'>$Brands_title</a>
</li>";
}
   } 
   ///displ categroies in DashBoard///
   function getcategories(){
    global $con;
    $select_categories="select * from categories";
    $result_categories=mysqli_query($con,$select_categories);
    //$row_data= mysqli_fetch_assoc($result_brands);
    //echo $row_data['Brands_title'];
while($row_data=mysqli_fetch_assoc($result_categories)){
   $Categories_title= $row_data['Categories_title'];
   $Categories_id = $row_data['Categories_id'];
   echo" <li class='nav-item' >
   <a href='index.php?categories=$Categories_id' class='nav-link text-light'>$Categories_title</a>
</li>";
}
   }

///searching products functions/////
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    $search_query="select * from products where Product_Keywords like %search_data_value%";
    $result_query=mysqli_query($con,$search_query);
    $row=mysqli_fetch_assoc($result_query);
    if(num_of_rows==0){
        echo "<h2> no result is found </h2>";
    }
    //echo $row['Product_title'];
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id= $row['product_id'];
    $Product_title= $row['Product_title'];
    $Product_description= $row['Product_description'];
    $Product_Keywords= $row['Product_Keywords'];
    $Categories_id= $row['Categories_id'];
    $Brands_id= $row['Brands_id'];
    $Product_Image3= $row['Product_Image3'];
echo "<div class='col-md-4 mb-2'>
  <div class='card'>
    <img src='./admin-area/product_images/$Product_Image3'
     class='card-img-top' alt='$Product_title'>
<div class='card-body'>
<h5 class='card-title'>$Product_title</h5>
<p class='card-text'>$Product_description</p>
<p class='card-text'>prices: $Product_Prices/-</p>

<a href='index.php?add_to_cart=$product_id' class='btn btn-success'> ADD TO CART</a>
<a href='products_details.php?product_id=$product_id' class='btn btn-secondary'> View More  </a>
</div>
</div>
</div>
";
}   
}
}
///VIEW DETAILS FUNCTION///
  function viewdetails(){
    global $con;
    ///condition chk issest or nor///
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brands'])){
            if(isset($_GET['product_id'])){
            $product_id=$_GET['product_id'];
    $search_query="Select * from products where product_id=$product_id AND product_id='$product_id' LIMIT 1";
    $result_query=mysqli_query($con,$search_query);
   while($row=mysqli_fetch_assoc($result_query)){
    $product_id= $row['product_id'];
    $Product_title= $row['Product_title'];
    $Product_description= $row['Product_description'];
    //$Product_Keywords= $row['Product_Keywords'];
    $Categories_id= $row['Categories_id'];
    $Brands_id= $row['Brands_id'];
    $Product_Image3= $row['Product_Image3'];
    $Product_Image2= $row['Product_Image2'];
    $Product_Prices= $row['Product_Prices'];

echo "<div class='col-md-4 mb-2'>
  <div class='card'>
    <img src='./admin-area/product_images/$Product_Image3'
     class='card-img-top' alt='$Product_title'>
<div class='card-body'>
<h5 class='card-title'>$Product_title</h5>
<p class='card-text'>$Product_description</p>
<p class='card-text'>prices: $Product_Prices/-</p>

<a href='index.php?add_to_cart=$product_id' class='btn btn-success'> ADD TO CART</a>
<a href='index.php' class='btn btn-secondary'> GO TO HOME   </a>
</div>
</div>
</div>
<br>   

<div class='col-md-8'>
        <!---realted images--->
        <div class='row'>
          
        <h4 class='text-info m-2 text-center'>RELATED TO THIS PRODUCTS</h4>
        <br>   

    <div class='col-md-4'>
    <img src='./admin-area/product_images/$Product_Image2'
     class='card-img-top' alt='$Product_title'>

    </div> 
    <br>   
    <div class='col-md-4'>
    <img src='./admin-area/product_images/$Product_Image3'
     class='card-img-top' alt='$Product_title'>

    </div>    
    </div>
    </div>
  
";}
   }
}
}}
///get ip adddress////
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
////next card funcTION /////
function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query = "Select * from cart_details where Ip_Address='$get_ip_address'
    and product_id=$get_product_id"; 
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0 ){
        echo "<script>alert('THIS ITEM IS ALREADY PRESENT IN CART')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        $insert_query="insert into cart_details (product_id,Ip_Address,quantity) 
        values ($get_product_id,'$get_ip_address',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert ('ITEM IS ADDED INTO CART THANKYOU :)')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
}
////TO GET CART ITEMS NUMBERS////
function cart_items(){
    if(isset($_GET['add_to_cart'])){
        global $con;
    $get_ip_address = getIPAddress();
    //$get_product_id=$_GET['add_to_cart'];
    $select_query = "Select * from cart_details where Ip_Address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
       $get_ip_address= getIPAddress();
       $select_query="select * from cart_details where Ip_Address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}
//TOTAL PRICES INFORMATION///
function total_cart_prices(){
global $con;
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query="Select * from cart_details where Ip_Address='$get_ip_address'";
$result=mysqli_query($con,$cart_query);
while($row=mysqli_fetch_assoc($result)){
    $product_id= $row['product_id'];
    $select_products="Select * from products where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_Product_Prices=mysqli_fetch_array($result_products)){
    $Product_Prices=array($row_Product_Prices['Product_Prices']); //[200,300]
    $Product_values=array_sum($Product_Prices); //[500]
    $total_price+=$Product_values; //500
}
}
echo $total_price;
}
///TOTAL ORDER DETAILS///
function get_user_details(){
global $con;
$username=$_SESSION['username'];
$get_details="select * from users_tabel where username='$username'";
$result_query=mysqli_query($con,$get_details);
while($row_query=mysqli_fetch_array($result_query)){
$userid=$row_query['userid'];
if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
            $get_orders="select * from users_orders where userid=$userid and orderstatus='pending'";
            $result_orders_query=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0){
            echo "<h3 class='text-center text-success my-5'>YOU HAVE <span class='text-danger'>
            $row_count</span>Pending Orders</h3>
            <p><a href='profile.php?my_orders'></a>
            ";
            }  
    }
}}
}
}





    ?>