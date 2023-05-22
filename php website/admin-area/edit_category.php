<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
   $get_categoriy="select * from categories where Categories_id=$edit_category";
   $result=mysqli_query($con,$get_categoriy);
   $row=mysqli_fetch_assoc($result);
   $category_title=$row['Categories_title'];
  // echo $category_title;

}
if(isset($_POST['edit_category'])){
    $category_title=$_POST['Categories_title'];
    $updatequery="update categories set  Categories_title='$category_title' where Categories_id='$edit_category'";
    $result_category=mysqli_query($con,$updatequery);
    if($result_category){
        echo "<script>alert('category update hogi mubarak ')</script>";
        echo "<script>window.open('./index.php?viewcategories','_self')</script>";
    } 
}

?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Categories_title" class="form-label">Category Tiltle</label>
            <input type="text" name="Categories_title" id="Categories_title" class="form-control" required="required"
            value='<?php echo $category_title?>'>
        </div>
        <br>
        <input type="submit" value="Update Category" class="btn btn-warning px-3 mb-4 " name="edit_category">
    </form>
</div>