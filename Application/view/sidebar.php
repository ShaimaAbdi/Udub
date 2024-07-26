<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/css/feathericon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <title>UMS</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <!-- <style>
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 500px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
           
      
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #confirm-logout-btn {
            width: 100%;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        #confirm-logout-btn:hover {
            background-color: #444;
        }

        .modal h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .modal p {
            color: gray;
        }

        .cancel {
            cursor: pointer;
        }
        .logo {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333; /* Darken header color */
        }

        .logo img {
            width: 100px; /* Adjusted width */
            height: auto; /* Maintain aspect ratio */
             /* Ensure rounded logo */
             margin-bottom: 30px;
             margin-top: 25px;
        }
    </style> -->
</head>
<body>
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                  <!-- <img src="white-logo.ico" alt="udub">-->
                  <span class="b-title">UMS</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content ">
                <ul class="nav pcoded-inner-navbar">
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="Dashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="">Dashboard</span></a>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-friends"></i></span><span class="">Employee</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="Employee.php" class="">register employee</a></li>
                            <li><a href="Empl_table.php" class="">view</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="fas fa-calendar-check"></i></span><span class="">Projects</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="AssignProjects.php" class="">Assign</a></li>
                            <li><a href="view_assign_table.php" class="">view</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Equipment</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="Register_Equipment.php" class="">Register Equipment</a></li>
                            <li><a href="Equip_table.php" class="">view</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="fas fa-hand-holding-usd"></i></span><span class="pcoded-mtext">Finance</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="Finance.php" class="">Record</a></li>
                            <li><a href="financeTable.php" class="">view</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item">
                        <a href="Report.php" class="nav-link"><span class="pcoded-micon"><i class="fas fa-line-chart"></i></span><span class="pcoded-mtext">Report</span></a>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="Setting.php" class="nav-link"><span class="pcoded-micon"><i class="fas fa-gear"></i></span><span class="pcoded-mtext">Setting</span></a>
                    </li>
                    <br><br><br>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item">
                        <a href="javascript:" class="nav-link" id="logout-link"><span class="pcoded-micon"><i class="fas fa-sign-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- Logout Modal -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="logo">
            <img src="udub-log.jpg" alt="Udub Films Logo">
        </div>
            <h2>You're attempting to logout of <br> Udub Films</h2>
            <p>Are you sure?</p>
        
            <button id="confirm-logout-btn" ac>Logout</button>
        </div>
    </div>
    <script>
    // Get the modal
    var modal = document.getElementById("logoutModal");

    // Get the link that opens the modal
    var logoutLink = document.getElementById("logout-link");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the logout button inside the modal
    var confirmLogoutBtn = document.getElementById("confirm-logout-btn");

    // When the user clicks the link, open the modal
    logoutLink.onclick = function(event) {
        event.preventDefault();
        modal.style.display = "block";
    }
 
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks the logout button, proceed to logout
    confirmLogoutBtn.onclick = function() {
        // Redirect to the login page
        window.location.href = "login.php"; // Replace "login.php" with the actual login page URL
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>