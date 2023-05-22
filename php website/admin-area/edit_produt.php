<?php
error_reporting(0);

if(isset($_GET['edit_produt'])){
    $edit_id=$_GET['edit_produt'];
    
 $get_data="select * from products where product_id=$edit_id";
 $result=mysqli_query($con,$get_data);
 $row=mysqli_fetch_assoc($result);
 $Product_title=$row['Product_title'];
 $Product_description=$row['Product_description'];
 $Product_Keywords=$row['Product_Keywords'];
 $Categories_id=$row['Categories_id'];
 $Brands_id=$row['Brands_id'];
 $Product_Image2=$row['Product_Image2'];
 $Product_Image3=$row['Product_Image3'];
 $Product_Prices=$row['Product_Prices'];
 $date=$row['date'];
 $status=$row['status'];
}

///FETCHING CATEGORY NAME///
$select_category="select * from categories where Categories_id=$Categories_id";
$result_category=mysqli_query($con,$select_category);
$row_category=mysqli_fetch_assoc($result_category);
$Categories_title=$row_category['Categories_title'];
//echo $Categories_title;

///FETCHING BRAND NAME///
$select_brands="select * from brands where Brands_id=$Brands_id";
$result_brands=mysqli_query($con,$select_brands);
$row_brands=mysqli_fetch_assoc($result_brands);
$Brands_title=$row_brands['Brands_title'];
//echo $Brands_title;
?>





<div class="container mt-5 ">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="Product_title" value=<?php echo $Product_title?>
             class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="Product_desc" class="form-label">Product Description</label>
            <input type="text" id="Product_desc" name="Product_desc" value="<?php echo $Product_description?>"  class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="Product_Keywords" value="<?php echo $Product_Keywords ?>"
             class="form-control" required="required">
        </div>
              <div class="form-outline w-50 m-auto m-4">
              <label for="product_keywords" class="form-label">Product category</label>

                <select name="product_category" class="form-select">

                    <option value="<?php echo $Categories_title ?>"><?php echo $Categories_title ?></option>
                    <?php 
                    $select_category_all="select * from categories";
                    $result_category_all=mysqli_query($con,$select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $Categories_title=$row_category_all['Categories_title'];
                        $Categories_id=$row_category_all['Categories_id'];
                        echo "<option value='$Categories_id'>$Categories_title</option>";

                    };
                    ?>
                   
                </select>
              </div> 
              <div class="form-outline w-50 m-auto m-4">
              <label for="product_keywords" class="form-label">Product Brand</label>

                <select name="product_brand" class="form-select">
                    <option value="<?php echo $Brands_title ?>"><?php echo $Brands_title ?></option>

                    <?php 
                    $select_brands_all="select * from brands";
                    $result_brands_all=mysqli_query($con,$select_brands_all);
                    while($row_brands_all=mysqli_fetch_assoc($result_brands_all)){
                        $Brands_title=$row_brands_all['Brands_title'];
                        $Brands_id=$row_brands_all['Brands_id'];
                        echo "<option value='$Categories_id'>$Brands_title</option>";

                    };
                    ?>
                </select>
              </div> 
              <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_Image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                <input type="file" name="Product_Image2" class="form-control" required="required">
                <img src="./product_images/<?php echo $Product_Image2?>" alt="" class="products_images">
              </div></div>
              <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_Image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                <input type="file" name="Product_Image3" class="form-control" required="required">
                <img src="./product_images/<?php echo $Product_Image3?>" alt="" class="products_images">
              </div></div>
              <div class="form-outline w-50 m-auto mb-4">
                <label for="product_prices" class="form-label">Product Prices</label>
                <input type="text" name="product_prices" id="product_prices" class="form-control"
                value="<?php echo $Product_Prices ?>" required="required">
              </div>
              <br>
              <div class="w-50 m-auto">
                <input type="Submit" name="edit_product" value="Update Product" class="btn btn-warning px-3 mb-3">
              </div>
    </form>
</div>
<?php
//edit
///fetching button update data////
if(isset($_POST['edit_product'])){
    $Product_title=$_POST['Product_title'];
    $Product_desc=$_POST['Product_desc'];
    $Product_Keywords=$_POST['Product_Keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_prices=$_POST['product_prices'];
   
/////
$Product_Image2=$_FILES['Product_Image2']['name'];
$Product_Image3=$_FILES['Product_Image3']['name'];

///temp
$temp_image2=$_FILES['Product_Image2']['tmp_name'];
$temp_image3=$_FILES['Product_Image3']['tmp_name'];

/////chrecking of fields empty or not
if($Product_title==''or $Product_desc==''or $Product_Keywords=='' or $product_category==''
or $product_brand=='' or $Product_Image2==''or $Product_Image3=='' or $product_prices==''){
  echo "<script>alert('please fill all the fields and continue the process')</script>";
}else{
  move_uploaded_file($temp_image2,"./product_images/$Product_Image2");
  move_uploaded_file($temp_image3,"./product_images/$Product_Image3");
  ///query to update producys
  $update_product="Update products set Product_title='$Product_title',Product_description='$Product_desc'
  ,Product_Keywords='$Product_Keywords',Categories_id='$product_category',Brands_id='$product_brand',
  Product_Image2='$Product_Image2',Product_Image3='$Product_Image3',product_prices='$product_prices',
  date=NOW() where product_id=$edit_id";
  $result_update=mysqli_query($con,$update_product);
  if($result_update){
    echo "<script>alert('PRODUCT UPDATED SUCCESSFULLY')</script>";
    echo "<script>window.open('./insertproduct.php','_self')</script>";
  }
  
}
}


?>