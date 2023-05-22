<h1 class="text-center text-success">All Categories</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary">
<tr class="text-center">
    <th>S.no

    </th>
    <th>Category title</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $select_category="select * from categories";
    $result=mysqli_query($con,$select_category);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $Categories_id=$row['Categories_id'];
        $Categories_title=$row['Categories_title'];
        $number++;

    
    
    ?>
    <tr class="text-center">
        <td><?php echo $number; ?></td>
        <td><?php echo $Categories_title; ?></td>
        <td><a href='index.php?edit_category=<?php echo $Categories_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td> <a href='index.php?delete_category=<?php echo $Categories_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
   
    </tr>
<?php
}
?>
</tbody>
</table>
