<style>
     .products_images{
        width:100px;
        object-fit:contain;
    }
</style>
<h3 class="text-center text-success">Our User</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary">
<?php
$get_table="SElect * from users_tabel";
$result = mysqli_query($con,$get_table);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>NO USER YET</h2>";
}else{
    echo "<tr>
<th class='text-center'>S.NO</th>
<th class='text-center'>username</th>
<th class='text-center'>useremail </th>
<th class='text-center'>userimage</th>
<th class='text-center'>userpassword</th>

<th class='text-center'>useraddress</th>
<th class='text-center'>usermobile</th>
<th class='text-center'>Delete</th>

</tr>
</thead>
<tbody class='bg-secondary text-warning text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $userid=$row_data['userid'];
        $username=$row_data['username'];
        $useremail=$row_data['useremail'];
        
        $userimage=$row_data['userimage'];
        $userpassword=$row_data['userpassword'];
        $useraddress=$row_data['useraddress'];
        $usermobile=$row_data['usermobile'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$username</td>
        <td>$useremail</td>
        <td><img src='../user_area/userimages/$userimage' alt='$username' class='products_images'></td>
        <td>$userpassword</td>
        <td>$useraddress</td>
        <td>$usermobile</td>
        <td><a href='' class='text-warning ' ><i class='fa-solid fa-trash'></i></a></td>

    
    </tr>";
    }
}
?>



</tbody>



</table>
