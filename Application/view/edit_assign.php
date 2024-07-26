<?php
include '../config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update_assignment'])) {
    $id = $_POST['id'];
    $project_type = $_POST['project_type'];
    $client_name = $_POST['client_name'];
    $phone_number = $_POST['phone_number'];
    $lead_job = $_POST['lead_job'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $deposit_amount = $_POST['deposit_amount'];
    $deposit_date = $_POST['deposit_date'];
    $amount = $_POST['amount'];

    $sql = "UPDATE asign_project SET project_type='$project_type', client_name='$client_name', phone_number='$phone_number', lead_job='$lead_job', date='$date', status='$status', deposit_amount='$deposit_amount', deposit_date='$deposit_date', amount='$amount' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_assign_table.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
