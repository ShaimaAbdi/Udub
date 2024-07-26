<?php
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "cs");

    if ($conn->connect_error) {
        $response['success'] = false;
        $response['message'] = "Connection failed: " . $conn->connect_error;
    } else {
        $empl_id = $_POST['empl_ID'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $date = $_POST['dates'];
        $salary = $_POST['salary'];
        $role = $_POST['role'];

        $sql = "UPDATE register_empl SET First_Name=?, Last_Name=?, phonenumber=?, Address=?, Date=?, Salary=?, Role=? WHERE empl_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $firstName, $lastName, $phoneNumber, $address, $date, $salary, $role, $empl_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Employee updated successfully";
        } else {
            $response['success'] = false;
            $response['message'] = "Error updating employee: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request";
}

echo json_encode($response);
?>
