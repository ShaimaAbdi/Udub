 <div class="form-container">
    <img src="udub-log.jpg" alt="Udub-logo" class="logo">
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <select id="role" name="role" required>
                <option value="Role">Role</option>
                <option value="Admin">Admin</option>
                <option value="Leadjob">LeadJob</option>
            </select><br>
            <input type="password" id="password" name="password" placeholder="Password" required minlength="8"><br>
            <input type="file" id="image" name="image" accept="image/*" required><br>
        </div>
        <button type="submit" class="button" name="insert">Create User</button>
    </form>
</div>

<?php
include '../config/connect.php';

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security

    // Handle the image upload
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $imagePath = $uploadDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        // Prepare an SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO admin (username, role, password, image) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("ssss", $username, $role, $password, $imagePath);

        if ($stmt->execute()) {
            echo "New user created successfully";

            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
}

$conn->close();
?>

