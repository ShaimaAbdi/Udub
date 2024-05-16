
<?php
include "header.php";
include "sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <style>
    /* Style for the table */
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    /* Style for table headers */
    .table th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        padding: 15px 10px;
        text-align: left;
    }

    /* Style for table cells */
    .table td {
        padding: 15px 10px;
        text-align: left;
    }

    /* Style for table rows */
    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Style for table actions */
    .table .text-right {
        text-align: right;
    }

    /* Style for buttons in table actions */
    .table .btn {
        margin-right: 5px;
    }

    /* Remove borders */
    .table th,
    .table td {
        border: none;
    }

    /* Add some shadow to the table */
    .table {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

    </style>
</head>
<body>
<div class="col-xl-8 col-md-12 m-b-30">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Today</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">This Week</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">All</a>
        </li>
    </ul>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table id="todayTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>FirstName</th>
                        <th>lastName</th>
                        <th>Phone Numer</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Salary</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="todayData">
                    <!-- Data will be dynamically loaded here -->
                </tbody>
            </table>
        </div>
        <!-- Similarly, other tabs can be defined -->
    </div>
</div>

<script src="script.js"></script>

</body>
</html>