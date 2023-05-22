<h3 class="text-center text-danger">All Products</h3>
<table class="table table-bordered mt-5">
<thead class="bg-secondary">
    <tr>
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total SOld</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody class="bg-secondary text-light">
    <?php
    $get_products="Select * from products";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $Product_title=$row['Product_title'];
        $Product_Image3=$row['Product_Image3'];
        $Product_Prices=$row['Product_Prices'];
        $status=$row=['status'];
        $number++;
        ?>
        <tr class='text-center'>
        <td><?php echo $number;?></td>
        <td> <?php echo  $Product_title;?></td>
        <td><img src='./product_images/<?php echo  $Product_Image3;?>' class='products_images'></td>
        <td> <?php echo  $Product_Prices;?></td>
        <td><?php
        $get_count="select * from orderpending where product_id=$product_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;
        ?>
        </td>
        <td> true</td>
        <td><a href='index.php?edit_produt=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td> <a href='index.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
<?php    
}
    ?>
    
</tbody>

</table>