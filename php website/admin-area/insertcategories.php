<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $Categories_title=$_POST['cat_title'];
    //select data from db 
    $select_query="Select * from categories where Categories_title='$Categories_title'";
    $result_select = mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
if($number>0){
    echo "<script>alert('This category is present inside the DB   ')</script>";

}else{


    $insert_query="insert into categories (Categories_title) values ('$Categories_title') ";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
    }}
}
?>
<h3 class="text-center" style="color:darkblue;">Insert Categories</h3>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
<span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
<input type="text" class="form-control" name="cat_title" placeholder="Insert Categories"
aria-label="UserName" aria-describedy="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto ">
        <input type="submit" class=" bg-warning border-0 p-2 my-3" name="insert_cat"
        value="INSERT CAREGORIES"  >
<!--<button class="bg-warning p-2 my-3 border-0">Insert Categories</button>-->
    </div>
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>