<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // If logged in, destroy the session
    session_destroy();
}

// Redirect to the login page
header("Location: confirm_logout.php");
exit;
?>
