<?php
$response = array('success' => false, 'message' => 'Unknown error');

if (isset($_POST['id']) && isset($_POST['entry_type']) && isset($_POST['description']) && isset($_POST['amount']) && isset($_POST['date'])) {
  $id = $_POST['id'];
  $entry_type = $_POST['entry_type'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];
  $date = $_POST['date'];

  $conn = new mysqli("localhost", "root", "", "ums");

  if ($conn->connect_error) {
    $response['message'] = "Connection failed: " . $conn->connect_error;
  } else {
    $sql = "UPDATE finance SET entry_type=?, description=?, amount=?, date=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssisi', $entry_type, $description, $amount, $date, $id);

    if ($stmt->execute()) {
      $response['success'] = true;
    } else {
      $response['message'] = "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
  }
} else {
  $response['message'] = "Invalid input";
}

echo json_encode($response);
?>
