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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      width: 60%;
      margin: 30px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
      left: 40%;
      transform: translateX(-50%);
      position: inherit;
    }

    h6 {
      text-align: left;
    }
</style>
</head>
<body>
    
<div class="container">
    <h5> <i class="fa  fa-cog"></i> &nbsp; Setting</h5>
<br>

    <a href="CreateUser.php"><h6> <i class="fa fa-user-alt"></i> &nbsp;Create User</h6></a>
    <a href="ChangePassword.php"><h6> <i class="fa fa-key"></i> &nbsp;Change Password</h6></a>
   <a href="UserPer.php"><h6> <i class="fa fa-user-lock"></i> &nbsp;User Permissions</h6></a>
  
  </div>
</body>
</body>
</html>


<?php
include "footer.php";
?>