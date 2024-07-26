<?php
$conn = new mysqli("localhost", "root", "", "ums");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM register_equip WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: Equip_table.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
