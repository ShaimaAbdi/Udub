<?php
include "logout.php";
include "sidebar.php";
include "header.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
  
     <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensure full viewport height */
            background-color: #08031E; /* Navy Blue background */
        }

        .container {
            width: 400px; /* Limit container width */
            padding: 20px; /* Add padding */
            border-radius: 25px;
            background-color: #f9f9f9;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
        }

        .logo {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo img {
            width: 100px; /* Adjusted width */
            height: auto; /* Maintain aspect ratio */
             /* Ensure rounded logo */
             margin-bottom: 30px;
             margin-top: 25px;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333; /* Darken header color */
        }

        #logout-btn {
            width: 90%;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        #logout-btn:hover {
            background-color: #444;
        }

        h6 {
            font-size: 14px;
            color: #777; /* Lighter text color */
            margin-top: 10px; /* Add space between header and footer */
        }
        p{
            color: gray;
        }
        .cancel{
            float: right;
            margin: 0 auto;
        }

    </style> 
</head>
<body>
   
    <div class="container">
    <div class="cancel">
    <i class="fa fa-times-circle" style="font-size:30px"></i>
    </div>
        <div class="logo">
            <img src="udub-log.jpg" alt="Udub Films Logo">
        </div>
        <h2>You're attempting to logout of <br>
        Udub Films</h2>
        <p>Are you sure ?</p>
        <button id="logout-btn">Logout</button>
    </div>




</body>
</html>
