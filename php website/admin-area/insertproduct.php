<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
$Product_title=$_POST['product-title'];
$description=$_POST['description'];
$Product_Keywords=$_POST['Product_Keywords'];
$product_categories=$_POST['product_categories'];
$product_brands=$_POST['product_brands'];
$Product_Prices=$_POST['Product_Prices'];
$product_status='true';
////accesss image  nme//
$Product_Image1=$_FILES['Product_Image1']['name'];
$Product_Image2=$_FILES['Product_Image2']['name'];
$Product_Image3=$_FILES['Product_Image3']['name'];
///accessing image temp name
$temp_Image1=$_FILES['Product_Image1']['tmp_name'];
$temp_Image2=$_FILES['Product_Image2']['tmp_name'];
$temp_Image3=$_FILES['Product_Image3']['tmp_name'];
//checking empty condition //
if($Product_title=='' or $description==''or $Product_Keywords=='' or $product_categories==''
 or $product_brands=='' or $Product_Prices='' or $Product_Image1=='' or $Product_Image2=='' or $Product_Image3==''){
echo "<script>alert('plz fill all available fields')</script>";
exit();
 } else{
    move_uploaded_file($temp_Image1,"./product_images/$Product_Image1");
    move_uploaded_file($temp_Image2,"./product_images/$Product_Image2");
    move_uploaded_file($temp_Image3,"./product_images/$Product_Image3");
    //insert query//
    $insert_product="insert into products(Product_title,Product_description,Product_Keywords
    ,Categories_id,Brands_id,Product_Image1,Product_Image2,Product_Image3,Product_Prices,
    date,status) values ('$Product_title','$description','$Product_Keywords','$product_categories'
    ,'$product_brands','$Product_Image1','$Product_Image2','$Product_Image3','$Product_Prices',NOW(),'$product_status')";
   $result_query=mysqli_query($con,$insert_product);
    if($result_query){
    echo "<script>alert('succeessful data is inserted')</script>";

   }
 }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>insert product Admin Dashboard</title>
     <!----botstrap css links--->
     <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <!---csslink-->
<link rel="stylesheet" href="../style.css">
<!--fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-muted

">
    <div class="container mt-3">
        <h1 class="text-center " style="color:darkblue;">INSERT PRODUCTS</h1>
        <!---form-->
<form action="" method="post" enctype="multipart/form-data">
    <!---tilte--->
<div class="form-outline mb-4 w-50 m-auto" >
    <label for="product-title" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product title</label>
    <input type="text" name="product-title" id="product-title" 
    class="form-control bg-info" placeholder="Enter Product Title" autocomplete="off" required="required"
    >
</div>
<!----div--->
<div class="form-outline mb-4 w-50 m-auto" >
    <label for="description" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product description</label>
    <input type="text" name="description" id="description" 
    class="form-control bg-info" placeholder="Enter Product description" autocomplete="off" required="required"
    >
</div>
<div class="form-outline mb-4 w-50 m-auto" >
    <label for="Product Keywords" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product Keywords</label>
    <input type="text" name="Product_Keywords" id="Product Keywords" 
    class="form-control bg-info" placeholder="Enter Product Keywords" autocomplete="off" required="required"
    >
</div>
<!---category's--->
<div class="form-outline mb-4 w-50 m-auto" >
<label for="description" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Select Category</label>
    <select name="product_categories" id="" class="form-control">
    
        <option value=""class="btn-info">Select a Category</option>
<?php
$select_query="select * from categories";
$result_query=mysqli_query($con,$select_query);
while($row= mysqli_fetch_assoc($result_query)){
    $Categories_title=$row['Categories_title'];
    $Categories_id=$row['Categories_id'];
    echo "        <option value='$Categories_id'>$Categories_title</option> ";
}

?>


      <!---  <option value=""class="btn-info">category 1</option>
        <option value=""class="btn-info">category 2</option>
        <option value=""class="btn-info">category 3</option>
        <option value=""class="btn-info">category 4</option>
        <option value=""class="btn-info">category 5</option>-->
    </select>
</div>
<!---brands's--->
<div class="form-outline mb-4 w-50 m-auto" >
<label for="description" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Select Brands</label>   
 <select name="product_brands" id="" class="form-control">
 <option value=""class="btn-info">Select Brand</option>

 <?php
$select_query="select * from brands";
$result_query=mysqli_query($con,$select_query);
while($row= mysqli_fetch_assoc($result_query)){
    $Brands_title=$row['Brands_title'];
    $Brands_id=$row['Brands_id'];
    echo "        <option value='$Brands_id'>$Brands_title</option> ";
}

?>
    </select>
</div>
<!---1__imagess--->
<div class="form-outline mb-4 w-50 m-auto" >
    <label for="Product_Image1" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product_Image1</label>
    <input type="file" name="Product_Image1" id="Product_Image1" 
    class="form-control bg-info" placeholder="Enter Product Image1" autocomplete="off" required="required"
    >
    </div>
<!---2__imagess--->
<div class="form-outline mb-4 w-50 m-auto" >
    <label for="Product_Image2" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product_Image2</label>
    <input type="file" name="Product_Image2" id="Product_Image2" 
    class="form-control bg-info" placeholder="Enter Product Image2" autocomplete="off" required="required"
    >
    </div>
    <!---3__imagess--->
<div class="form-outline mb-4 w-50 m-auto" >
    <label for="Product_Image3" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product_Image3</label>
    <input type="file" name="Product_Image3" id="Product_Image3" 
    class="form-control bg-info" placeholder="Enter Product Image3" autocomplete="off" required="required"
    >
    </div>
    <!---prices--->
    <div class="form-outline mb-4 w-50 m-auto" >
    <label for="Product Prices" class="form-label" style=" font-size: 20px;  font-style: italic;
color:darkblue;fontstyle:Bold;" >Product Prices</label>
    <input type="text" name="Product_Prices" id="Product Prices" 
    class="form-control bg-info" placeholder="Enter Product Prices" autocomplete="off" required="required"
    >
</div>
<!---button final-->
<div class="form-outline mb-4 w-50 m-auto">
    <input type="submit" name="insert_product" class="m-2 px-3 btn btn-info " value="Insert Products">
</div>

</form>
<!---last child--->

   
</body>
</html>