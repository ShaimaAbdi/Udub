<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'cs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['image'] = $row['image'];
            header("Location: dashboard.php");
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udub Films Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Your existing styles */
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
            display: flex;
            width: 900px; /* Adjust width as needed */
            height: 350px;
        }

        .left-side,
        .right-side {
            flex: 1;
            padding: 30px;
        }

        .left-side {
            background-color:#08031E; /* White background for left side */
            border-radius: 5px 0 0 5px; /* Rounded corners for left side */
        }

        .left-side h2 {
            color: white;
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .left-side p {
            color: white;
            line-height: 1.5;
        }

        .right-side {
            background-color: #fff; /* White background for right side */
            border-radius: 15px 15px 15px 15px; /* Rounded corners for right side */
            box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for right side */
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group {
            display: flex;
        }

        #center {
            margin: auto; /* Centers horizontally */
            text-align: center; /* Centers text inside the input field */
        }
        img {
            display: block; /* Ensures the image behaves like a block element */
            margin: auto; /* Centers the image horizontally within its container */
            width: 100px; /* Set the desired width */
            height: auto; /* Automatically adjust the height to maintain aspect ratio */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px ;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #08031E;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: all 0.3s ease-in-out; 
        }
        button {
            width: 400px; /* Adjust the width to make the button wider */
            background-color: #08031E; /* Button background color */
            font-size: 16px; /* Font size of the button text */
            text-align: center; /* Center the text inside the button */
            margin: auto; /* Center the button horizontally within its container */
            
        }

        button[type="submit"]:hover {
            background-color: darkgray;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <h2>UDUB FILMS</h2>
            <p>Udub Films is a dynamic and innovative production company dedicated to transforming ideas into captivating visual experiences.</p>
        </div>
        <div class="right-side">
            <img src="udub-log.jpg" alt="Udub-logo" class="logo">
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" id="center" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" id="center" name="password" placeholder="Password" required minlength="8">
                </div>
                <button type="submit" name="login">Login</button>
            </form>
            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        </div>
    </div>
</body>
</html>
