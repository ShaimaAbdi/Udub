<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
   
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .action {
        display: flex;
        justify-content: space-between;
    }
    .action a {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .action a.edit {
        background-color: #4CAF50;
        color: white;
    }
    .action a.delete {
        background-color: #f44336;
        color: white;
    }
    h3{
      text-align: center;
    }
    </style>
</head>
<body>
<div class="container">

<h3>Finance Table</h3>

<table class="table">
  <thead class="table-dark">
    ...
  </thead>
  <tbody>
    ...
  </tbody>
</table>
<!--<table>
  <thead>
      <tr>
          <th>Entry Type</th>
          <th>Name</th>
          <th>Date</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td>Example Type</td>
          <td>John Doe</td>
          <td>2024-05-11</td>
          <td class="action">
              <a href="#" class="edit">Edit</a>
              <a href="#" class="delete">Delete</a>
          </td>
      </tr>
   
  </tbody>
</table>

-->


</div>
</body>
</html>
</body>
</html>