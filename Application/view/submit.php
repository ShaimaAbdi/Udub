<?php
include '../config/connect.php';

$project_type = $_POST['project_type'];
$client_name = $_POST['clientname'];
$phone_number = $_POST['phoneNumber'];
$lead_job = $_POST['lead_job'];
$date = $_POST['dateInput'];
$status = $_POST['status'];
$deposit_amount = $_POST['deposit_amount'];
$deposit_date = $_POST['deposit_date'];
$amount = $_POST['amount'];

$sql = "INSERT INTO asign_project (project_type, client_name, phone_number, lead_job, date, status, deposit_amount, deposit_date, amount)
VALUES ('$project_type', '$client_name', '$phone_number', '$lead_job', '$date', '$status', '$deposit_amount', '$deposit_date', '$amount')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
