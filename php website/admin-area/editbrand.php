<?php
if(isset($_GET['editbrand'])){
    $edit_brand=$_GET['editbrand'];
   $get_brands="select * from brands where Brands_id=$edit_brand";
   $result=mysqli_query($con,$get_brands);
   $row=mysqli_fetch_assoc($result);
   $Brands_title=$row['Brands_title'];
  // echo $category_title;

}
if(isset($_POST['edit_brand'])){
    $Brands_title=$_POST['Brands_title'];
    $updatequery="update brands set Brands_title='$Brands_title' where Brands_id='$edit_brand'";
    $result_brand=mysqli_query($con,$updatequery);
    if($result_brand){
        echo "<script>alert ('brand update sucessfully')</script>";
        echo "<script>window.open('./index.php?viewbrand','_self')</script>";
    }
}


?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Brands_title" class="form-label">Brand Tiltle</label>
            <input type="text" name="Brands_title" id="Brands_title" class="form-control" required="required"
            value='<?php echo $Brands_title?>'>
        </div>
        <br>
        <input type="submit" value="Update Brands" class="btn btn-warning px-3 mb-4 " name="edit_brand">
    </form>
</div>