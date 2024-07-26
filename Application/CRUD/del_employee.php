<?php
$conn = new mysqli("localhost", "root", "", "ums");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['empl_ID'])) {
    $empl_ID = $_REQUEST['empl_ID'];

    $sql = "DELETE FROM register_empl WHERE empl_id='$empl_ID'";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: Empl_table.php");
    } else {
        echo "Failed to delete record: " . $conn->error;
    }
} else {
    echo "Invalid Request";
}

$conn->close();


?>
