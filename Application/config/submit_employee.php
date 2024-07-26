<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $date = $_POST['date'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (id, first_name, last_name, phone_number, address, role, date, salary)
            VALUES ('$id', '$firstName', '$lastName', '$phoneNumber', '$address', '$role', '$date', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
