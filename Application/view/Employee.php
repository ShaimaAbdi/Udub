<?php
include 'header.php';
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UMS</title>
  <link rel="stylesheet" href=../style.css">
  
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

    form {
      width: 80%;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="number"],
    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      background: #08031E;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      float: right; /* Align the button to the right */
      margin-top: -2px; /* Adjust top margin as needed */
    }

    button:hover {
      background-color: gray;
    }
  </style>
</head>
<body>
  <div class="container">
    <h6>Register Employee:</h6>
    <form action="submit.php" method="post">
    <label for="firstName">ID:</label>
      <input type="text" id="firstName" name="firstName" required><br>
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" required><br>
      
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" required><br>
      
      <label for="phoneNumber">Phone Number:</label>
      <input type="tel" id="phoneNumber" name="phoneNumber" required><br>

      <label for="address">Address:</label>
      <select id="address" name="address" required>
        <option value="default">Select</option>
        <option value="Abdiaziz">Abdiaziz</option>
        <option value="Bondhere">Bondhere</option>
        <option value="Dayniler">Daynile</option>
        <option value="Dharkeynley">Dharkeynley</option>
        <option value="Hamar jajab">Hamar-jajab</option>
        <option value="Hamar weyne">Hamar-weyne</option>
        <option value="Hodan">Hodan</option>
        <option value="Howl-wadaag">Howl-wadaag</option>
        <option value="Huriwa">Huriwa</option>
        <option value="Kahda">Kahda</option>
        <option value="Karan">Karan</option>
        <option value="Shibis">Shibis</option>
        <option value="Shangaani">Shangaani</option>
        <option value="Waberi">Waberi</option>
        <option value="Wadajir">Wadajir</option>
        <option value="warta-nabada">Warta Nabada</option>
        <option value="Yaqshiid">Yaqshiid</option>
        <!-- Add more options as needed -->
      </select><br>

      <label for="role">Role:</label>
      <select id="role" name="role" required>
      <option value="Manager">Select</option>
        <option value="Manager">Admin</option>
        <option value="Assistant">Leadjob</option>
        <option value="Technician">Employee</option>
      </select><br>
      <label for="dateInput">Date:</label>
        <input type="date" id="dateInput" name="dateInput"><br><br>
      
      <label for="salary">Salary <i>$</i>:</label>
      <input type="number" id="amount" name="amount" min="0" step="0.01">
        
     
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>

<?php
include 'footer.php';
?>
