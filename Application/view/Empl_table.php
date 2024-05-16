<?php
include 'header.php';
include 'sidebar.php'
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
        margin: 0 ;
        left: 40%;
        

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
    background-color: #f2f2f2;
    color: #333;
    font-weight: bold;
    padding: 20px px; /* Increased padding for left and right sides */
    text-align: left;


    }

    /* Add some shadow to the table */
    .table {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

.container {
    width: 65%;
    margin: 30px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center; /* Center align content */
}

    h4{
        text-align: center;
        align-item:
        font-weight: bold;
    }
    </style>
</head>
<body>
    <div class="container">
    
<div class="col-xl-8 col-md-12 m-b-30">
         <h4>Employee List</h4>
    

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
</div>
</body>
</html>

<?php
include 'footer.php'
?>