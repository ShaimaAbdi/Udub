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
  <link rel="stylesheet" href="styles.css">
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
    <h6>Register Equipment:</h6>
    <form action="submit.php" method="post">
      <label for="firstName">Name:</label>
      <input type="text" id="firstName" name="firstName" required><br>
      
      <label for="lastName">Model:</label>
      <input type="text" id="lastName" name="lastName" required><br>
      
      <label for="phoneNumber">Manufacturer:</label>
      <input type="tel" id="phoneNumber" name="phoneNumber" required><br>

      

        
        <label for="dateInput">Date Acquired:</label>
        <input type="date" id="dateInput" name="dateInput"><br>

        <label for="address" color="#08031E">Status:</label>
        <select id="address" name="address" required>
        <option value="Status">Select</option>
        <option value="Status">Maintained</option>
        <option value="Status">Active</option>
  </select>



        <label for="salary">Price:</label>
      <select id="salary" name="salary" required>
      <option value="Status">Select</option>
        <option value="20000">$20,000</option>
        <option value="30000">$30,000</option>
        <option value="40000">$40,000</option>
        <option value="50000">$50,000</option>
        <option value="60000">$60,000</option>
        <option value="70000">$70,000</option>
        <option value="80000">$80,000</option>
        <!-- Add more options as needed -->
      </select><br>

      

      </select><br>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>

<?php
include 'footer.php';
?>
