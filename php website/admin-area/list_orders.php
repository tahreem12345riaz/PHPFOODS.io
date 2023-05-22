<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary">
<?php
$getorders="SElect * from users_orders";
$result = mysqli_query($con,$getorders);
$row_count=mysqli_num_rows($result);
echo "<tr>
<th class='text-center'>S.NO</th>
<th class='text-center'>Due Amount</th>
<th class='text-center'>Invoices </th>
<th class='text-center'>Total Product</th>
<th class='text-center'>Orders Date</th>
<th class='text-center'>Status</th>
<th class='text-center'>Delete</th>

</tr>
</thead>
<tbody class='bg-secondary text-warning text-center'>";
if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>NO ORDERS YET TO</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $ordersid=$row_data['ordersid'];
        $userid=$row_data['userid'];
        $amountdue=$row_data['amountdue'];
        $invoicesnumber=$row_data['invoicesnumber'];
        $totalproducts=$row_data['totalproducts'];
        $orderdate=$row_data['orderdate'];
        $orderstatus=$row_data['orderstatus'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$amountdue</td>
        <td>$invoicesnumber</td>
        <td>$totalproducts</td>
        <td>$orderdate</td>
        <td>$orderstatus</td>
        
        <td><a href='' class='text-warning ' ><i class='fa-solid fa-trash'></i></a></td>

    
    </tr>";
    }
}
?>



</tbody>



</table>
