<h1 class="text-center text-success">All Brands</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary">
<tr class="text-center">
    <th>S.no

    </th>
    <th>brands title</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $select_brands="select * from brands";
    $result=mysqli_query($con,$select_brands);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $Brands_id=$row['Brands_id'];
        $Brands_title=$row['Brands_title'];
        $number++;

    
    
    ?>
    <tr class="text-center">
        <td><?php echo $number; ?></td>
        <td><?php echo $Brands_title; ?></td>
        <td><a href='index.php?editbrand=<?php echo $Brands_id  ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td> <a href='index.php?delete_brand=<?php echo $Brands_id?>' type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#exampleModalLong" >
        <i class='fa-solid fa-trash'></i></a></td>
   
    </tr>
<?php
}
?>
</tbody>
</table>
<!-- Button trigger modal 
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">
  Delete All Brands
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <h4>ARE YOU SURE YOU WANT TO DELETE THIS?</h4>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <a href="./index.php?viewbrand.php" class="text-light">NO
         </a></button>
        <button type="button" class="btn btn-success" 
        >
        <a href='index.php?delete_brand=<?php echo $Brands_id?>' 
         class="text-light text-decoration-none" data-toggle="model" data-target="#exampleModal">YES
        </a> </button>
      </div>
    </div>
  </div>
</div>