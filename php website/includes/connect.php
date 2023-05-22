<?php
$con = mysqli_connect('localhost','root','','mystore');
if($con){
    echo "conect suceesfuly";

}else{
    die(mysqli_error($con));
}


?>