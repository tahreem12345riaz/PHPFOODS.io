<h3 class="text-center text-success">Our payment</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary">
<?php
$getpayments="SElect * from user_payment";
$result = mysqli_query($con,$getpayments);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>NO PAYMENTS RECEIVED</h2>";
}else{
    echo "<tr>
<th class='text-center'>S.NO</th>
<th class='text-center'>Invoice Number</th>
<th class='text-center'>Amount </th>
<th class='text-center'>Payment Mode</th>
<th class='text-center'>Orders Date</th>
<th class='text-center'>Delete</th>

</tr>
</thead>
<tbody class='bg-secondary text-warning text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $Payment_id=$row_data['Payment_id'];
        $ordersid=$row_data['ordersid'];
        $invoicesnumber=$row_data['invoicesnumber'];
        $amount=$row_data['amount'];
       // $totalproducts=$row_data['totalproducts'];
        $Payment_mode=$row_data['Payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo "<tr>
        <td>$number</td>
        
        <td>$invoicesnumber</td>
        <td>$amount</td>
        <td>$Payment_mode</td>
        <td>$date</td>
        
        <td><a href='' class='text-warning ' ><i class='fa-solid fa-trash'></i></a></td>

    
    </tr>";
    }
}
?>



</tbody>



</table>
