<?php
$con = mysqli_connect('localhost','root','','mystore');
if(!$con){
    echo "connected";

}else{
    die(mysqli_error($con));
}


?>