<?php
$conn = new mysqli("localhost", "root", "", "cs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = ['success' => false, 'message' => ''];

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['model']) && isset($_POST['manufacturer']) && isset($_POST['date_acquired']) && isset($_POST['status']) && isset($_POST['price'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $model = $conn->real_escape_string($_POST['model']);
    $manufacturer = $conn->real_escape_string($_POST['manufacturer']);
    $date_acquired = $conn->real_escape_string($_POST['date_acquired']);
    $status = $conn->real_escape_string($_POST['status']);
    $price = $conn->real_escape_string($_POST['price']);

    $sql = "UPDATE register_equip SET name='$name', model='$model', manufacturer='$manufacturer', date_acquired='$date_acquired', status='$status', price='$price' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = 'Record updated successfully';
    } else {
        $response['message'] = 'Error updating record: ' . $conn->error;
    }
} else {
    $response['message'] = 'Invalid input';
}

echo json_encode($response);

$conn->close();
?>
