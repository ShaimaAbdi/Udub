<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Provide a default image path if the session variable is not set
$image = isset($_SESSION['image']) ? $_SESSION['image'] : 'udub.jpg'; // Make sure default.jpg exists in the uploads directory
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UMS</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="udub.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <!-- <link rel="stylesheet" href="../../assets/plugins/animation/css/animate.min.css"> -->
    <!-- vendor css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../css/header.css">


    <style>
        input[type="text"] {
            float: right;
           
        }
        .image {
            width: 30px; /* Adjust the width as needed */
            height: 30px; /* Adjust the height as needed */
            border-radius: 60%; /* Optional: makes the image circular */
        }
       
        .navbar .nav-item .dropdown-toggle span {
            color: white !important; /* White color for the username text */
        }
        .dropdown-menu, .user-name,{

            color: white;

        }
        /* .navbar-collapse, .navbar-nav{
            background-color:#080F35;
          
        } */
    </style>
</head>
<body>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="dashboard.php" class="b-brand">
                
              
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:"  data-toggle="dropdown">
                            <img src="<?php echo $image; ?>" class="img-radius image" alt="User-Profile-Image">
                            <span><?php echo $_SESSION['username']; ?></span>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="<?php echo $image; ?>" class="img-radius image" alt="User-Profile-Image">
                                    <span class="user-name "><?php echo $_SESSION['username']; ?></span>
                                    <a href="confirm_logout.php" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
</body>
</html>
