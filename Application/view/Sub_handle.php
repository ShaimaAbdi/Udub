<?php
session_start();

// Assuming $oldPassword is the stored hashed password for the user

// Function to verify if the entered password matches the stored password
function verifyPassword($enteredPassword, $storedPassword) {
    // You should replace this with your actual password hashing method
    return password_verify($enteredPassword, $storedPassword);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the old password matches the stored password
    if (verifyPassword($_POST["old_password"], $oldPassword)) {
        // Check if the new password and confirm password match
        if ($_POST["new_password"] === $_POST["confirm_password"]) {
            // Update the password with the new one
            // Assuming you have a function to update the password
            // updatePassword($_SESSION['username'], $_POST["new_password"]);
            echo '<p>Password changed successfully!</p>';
        } else {
            echo '<p>New password and confirm password do not match.</p>';
        }
    } else {
        echo '<p>The old password is incorrect.</p>';
    }
}
?>
