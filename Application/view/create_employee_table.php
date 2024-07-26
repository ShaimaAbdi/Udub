<?php
include 'connect.php';

// SQL to create table
$sql = "CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    address VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    salary Float(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
