<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "ums");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update_employee'])) {
    $empl_id = $_POST['empl_ID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $date = $_POST['dates'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];

    $sql = "UPDATE register_empl SET 
                First_Name = ?, 
                Last_Name = ?, 
                phonenumber = ?, 
                Address = ?, 
                Date = ?, 
                Salary = ?, 
                Role = ? 
            WHERE empl_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $firstName, $lastName, $phoneNumber, $address, $date, $salary, $role, $empl_id);

    if ($stmt->execute()) {
        header("Location: Empl_table.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
