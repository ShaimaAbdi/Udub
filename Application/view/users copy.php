<?php
include '../config/connect.php';

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, role, password) VALUES (?, ?, ?)");

    // Check if the prepare statement was successful
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    // The type definition string is 'sss' for three string parameters
    $stmt->bind_param("sss", $username, $role, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New user created successfully";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
