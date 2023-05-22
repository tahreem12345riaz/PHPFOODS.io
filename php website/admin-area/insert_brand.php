<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $Brands_title=$_POST['brand_title'];
    //select data from db 
    $select_query="Select * from brands where Brands_title='$Brands_title'";
    $result_select = mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
if($number>0){
    echo "<script>alert('This brand is present inside the DB   ')</script>";

}else{


    $insert_query="insert into brands (Brands_title) values ('$Brands_title') ";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('brand has been inserted successfully')</script>";
    }}
}
?>
<h3 class="text-center" style="color:darkblue;">Insert Brands</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
<span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
<input type="text" class="form-control" name="brand_title" placeholder="Insert  Brands"
aria-label="Brands" aria-describedy="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto ">
        <input type="submit" class="bg-warning border-0 p-2 my-3" name="insert_brand"
        value="INSERT Brands" >
       <!-- <button class="bg-warning p-2 my-3 border-0">Insert Brands</button>-->
    </div>
</form>