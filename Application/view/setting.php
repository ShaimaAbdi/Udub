<?php
include "header.php";
include "sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS</title>
    <link rel="stylesheet" href="../css/setting.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<div class="container">
    <h5><i class="fa fa-cog"></i> &nbsp; Setting</h5>
    <br>
    <a href="#" id="createUserLink"><h6><i class="fa fa-user-alt"></i> &nbsp;Create User</h6></a>
    <a href="#" id="changePasswordLink"><h6><i class="fa fa-key"></i> &nbsp;Change Password</h6></a>
    <a href="#" id="userPermissionsLink"><h6><i class="fa fa-user-lock"></i> &nbsp;User Permissions</h6></a>
</div>

<!-- Modals -->
<div id="createUserModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include "CreateUser.php"; ?>
    </div>
</div>

<div id="changePasswordModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include "ChangePassword.php"; ?>
    </div>
</div>

<div id="userPermissionsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include "UserPermissions.php"; ?>
    </div>
</div>

<script src="../js/scripts.js"></script>
</body>
</html>

<?php
include "footer.php";
?>
