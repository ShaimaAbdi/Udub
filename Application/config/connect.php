<?php
$conn =  mysqli_connect("localhost","root","","cs");



// Check if connection is successful and echo message
if($conn == true){
    echo "connection successfully established";
}else{
    echo $conn->connect_error;}



?>