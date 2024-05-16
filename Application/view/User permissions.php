<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>User Creation Page</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #08031E; /* Navy Blue background */
        }

        .container {
            max-width: 400px; /* Increase max-width */
            padding: 20px; /* Add padding */
            border-radius: 10px;
            background-color: #f9f9f9;
           
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
            width: 100%; /* Ensure container takes full width */
        }

        .logo {
            width: 100px;
            margin-bottom: 20px;
            display: block;
            margin: 10px auto; /* Center the logo */
        }

        .form-group {
            margin-bottom: 15px;
        }

        #center {
            margin: auto; /* Centers horizontally */
            text-align: center; /* Centers text inside the input field */
        }

        input[type="text"],
        input[type="password"],
        input[type=""],
        select {
            width: calc(100% - 20px); /* Adjust width with padding */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            text-align: center;
        }
        select{
            background-color: #08031E;
            color: white;
        }

        button[type="submit"] {
            background-color: #08031E;
            color: white;
            padding: 10px 20px;
            border: 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            width: 95%; /* Button width */
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: darkgray;
        }
        .cancel{
            float: right;
            margin: 0 auto;
        }
        h3{
            text-align: center;
        }
    </style>
</head>
<body>
    
<div class="container">
<div class="cancel">
    <i class="fa fa-times-circle" style="font-size:25px"></i>
    </div>
    <img src="udub-log.jpg" alt="Udub-logo" class="logo">
  <h3>User Permissions</h3>
  <h4>Admin user</h4>
<p>Has Full Access</p>
<p>Can View, Add, Update</p>
<p>Can View all lists </p>
<p>Can Create User</p>
 <p>Can change User password</p>
 <h4>Lead Staff</h4>
 <p>Can View Project List</p>
 <p>Can View Equipment List</p>
   
</div>
</body>
</html>
