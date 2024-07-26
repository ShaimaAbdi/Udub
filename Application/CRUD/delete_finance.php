<?php
$conn = new mysqli("localhost", "root", "", "ums");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM finance WHERE id=$id";
  if ($conn->query($sql) === TRUE) {
    header("Location: financeTable.php");
    exit();
  } else {
    echo "Error deleting record: " . $conn->error;
  }
} else {
  echo "Invalid ID";
}

$conn->close();
?>
