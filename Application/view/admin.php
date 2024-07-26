<?php
include '../config/connect.php';

if (isset($_POST['insert'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security

    // Handle the image upload
    $imagePath = 'uploads/' . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        // Prepare an SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO admin (username, role, password, image) VALUES (?, ?, ?, ?)");

        // Check if the prepare statement was successful
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters
        $stmt->bind_param("ssss", $username, $role, $password, $imagePath);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New user created successfully";

            // Redirect to the login page
            header("Location: setting.php");
            exit();
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
}

// Close the connection
$conn->close();
?>