<?php
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    //echo $delete_category;
    $delete_query="Delete from categories where Categories_id=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Category has been deleted')</script>";
        echo "<script>window.open('./index.php?viewcategories','_self')</script>";
    }
}

?>