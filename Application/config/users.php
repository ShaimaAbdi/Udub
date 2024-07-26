<?php
include 'connect.php';

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security

    // Check if file is uploaded successfully
    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Define a directory to store the uploaded images
        $target_dir = "uploads/";
        // Generate a unique name for the uploaded file
        $target_file = $target_dir . basename($_FILES['image']['name']);

        // Move the uploaded file to the defined directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES['image']['name'])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, role, password, image) VALUES (?, ?, ?, ?)");

    // Check if the prepare statement was successful
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    // The type definition string is 'sssb' for string, string, string, and blob parameters
    $stmt->bind_param("sssb", $username, $role, $password, $target_file);

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
