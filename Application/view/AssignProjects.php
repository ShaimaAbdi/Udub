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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <h6>Assign Project:</h6>
    <form action="submit.php" method="post">
    <label for="phoneNumber">Id:</label>
      <input type="tel" id="clientname" name="clientname" required><br>
    <label for="project">Project Type:</label>
      <select id="address" name="address" required>
        <option value="">Select</option>
        <option value="">Commercial</option>
        <option value="">Documentary</option>
        <option value="">Event</option>
  </select>

      <label for="phoneNumber">Client Name:</label>
      <input type="tel" id="clientname" name="clientname" required><br>
      <label for="phoneNumber">Phone Number:</label>
      <input type="tel" id="phoneNumber" name="phoneNumber" required><br>

      <label for="address">LeadJob:</label>
      <select id="address" name="address" required>
        <option value="">Select</option>
        <option value=""></option>
  </select>

        
      <label for="dateInput">date:</label>
        <input type="date" id="dateInput" name="dateInput"><br>

      <label for="address">Status:</label>
      <select id="address" name="address" required>
        <option value="Status">Select</option>
        
        <option value="Status">Pending</option>
        <option value="Status">Delay</option>
        <option value="Status">Completed</option>

      <label for="salary">Deposit:</label>
      <select id="salary" name="salary" required>
      

       


       <label for="salary">Deposit Amount<i>$</i>:</label>
         <input type="number" id="amount" name="amount" min="0" step="0.01">

      <label for="dateInput">Deposit date:</label>
        <input type="date" id="dateInput" name="dateInput"><br><br>
        <!-- Add more options as needed -->
    

     
      <label for="salary">Amount<i>$</i>:</label>
      <input type="number" id="amount" name="amount" min="0" step="0.01">
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>

