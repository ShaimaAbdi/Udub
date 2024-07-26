<?php

$conn = new mysqli("localhost", "root", "", "ums");

//echo $conn == 1?"sucess":"failed";

// if($conn){
//     echo "success";
// }
// else{
//     die("failed".$conn->mysqli_error);
// }

if(isset($_REQUEST['empl_register'])){
    
$fn = $_REQUEST['firstName'];
$ln = $_REQUEST['lastName'];
$ph = $_REQUEST['phoneNumber'];
$ad = $_REQUEST['address'];
$d = $_REQUEST['dates'];
$s = $_REQUEST['salary'];
$r = $_REQUEST['role'];


$sql = "insert into register_empl(First_Name,Last_Name,phonenumber,Address,Date,Salary,id) values( '$fn', '$ln', '$ph', '$ad', '$d', '$s', '$r' )";
$response = $conn->query($sql);
echo $response==1? header("location: Employee.php"):"failed";
}   


if(isset($_REQUEST['del_btn'])){
    $em_ID = $_REQUEST['empl_ID'];

    $sql = "delete from register_empl where empl_id = '$em_ID'  ";
    $result = $conn->query($sql);

    echo $result==1? header("location: Empl_table.php"):"failed";
}
// $sql = "insert into register_empl(empl_id ,  First_Name,Last_Name,phonenumber,Address,Date,Salary,id) values('null', 'cumar', 'maxamed', '567567', 'kaxda', '20/2/2022', '100', '1' )";
// $response =$conn->query($sql);
// echo $response==1?"insert seccess":"failed";

?>