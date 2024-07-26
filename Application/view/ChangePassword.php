<?php
include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        // Update the user's password in the database
        $updateSql = "UPDATE admin SET password = ? WHERE username = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ss", $hashedPassword, $username);

        if ($updateStmt->execute()) {
            echo '<p>Password changed successfully!</p>';
        } else {
            echo '<p>Error updating password.</p>';
        }
    } else {
        echo '<p>New password and confirm password do not match.</p>';
    }
}
?>

<div class="form-container">
    <img src="udub-log.jpg" alt="Udub-logo" class="logo">
    <form action="" method="post">
        <div class="form-group">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="new_password" name="new_password" placeholder="New Password" required minlength="8">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required minlength="8"><br>
        </div>
        <button type="submit" class="button">Change</button>
    </form>
</div>
