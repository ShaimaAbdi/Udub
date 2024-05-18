
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
            background-color: #08031E;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .logo {
            width: 100px;
            margin-bottom: 20px;
            display: block;
            margin: 10px auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        #center {
            margin: auto;
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            text-align: center;
        }
        select {
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
            width: 95%;
            font-weight: bold;
        }
        button[type="submit"]:hover {
            background-color: darkgray;
        }
        .cancel {
            float: right;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="cancel">
        <i class="fa fa-times-circle" style="font-size:25px"></i>
    </div>
    <img src="udub-log.jpg" alt="Udub-logo" class="logo">
    <form action="CRUD.php" method="POST">
        <div class="form-group">
           
            <input type="text" id="full_name" name="fullname" placeholder="Full Name"  required><br>
            <input type="text" id="username" name="username" placeholder="Username"  required><br>
            <select id="address" name="Role" required>
                <option value="Role">Role</option>
                <option value="Admin" >Admin</option>
                <option value="Leadjob" >LeadJob</option>
            </select><br>
            <input type="password" id="password" name="password" placeholder="Password" required minlength="8"><br>
        </div>
        <button type="submit" class="button" name="insert">Create User</button>
    </form>
</div>
</body>
</html>
