<?php
include '../view/header.php';
include '../view/sidebar.php';
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 3px;
            color: #fff;
        }
        .action-buttons .edit-btn {
            background-color: #28a745;
        }
        .action-buttons .delete-btn {
            background-color: #dc3545;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>View Assignments</h2>
    <?php
    $sql = "SELECT * FROM asign_project";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
        <thead>
            <tr>
                <th>Project Type</th>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>Lead Job</th>
                <th>Date</th>
                <th>Status</th>
                <th>Deposit Amount</th>
                <th>Deposit Date</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["project_type"] . "</td>
            <td>" . $row["client_name"] . "</td>
            <td>" . $row["phone_number"] . "</td>
            <td>" . $row["lead_job"] . "</td>
            <td>" . $row["date"] . "</td>
            <td>" . $row["status"] . "</td>
            <td>" . $row["deposit_amount"] . "</td>
            <td>" . $row["deposit_date"] . "</td>
            <td>" . $row["amount"] . "</td>
            <td class='action-buttons'>
                <a href='#' class='edit-btn' onclick='openEditModal(". json_encode($row) .")'>Edit</a>
                <a href='delete.php?id=" . $row["id"] . "' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
            </td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No results found</p>";
    }

    $conn->close();
    ?>
</div>

<!-- The Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h2>Edit Assignment</h2>
        <form id="editForm" method="POST" action="edit_assignment.php">
            <input type="hidden" id="assignment_id" name="id">
            <div class="form-group">
                <label for="project_type">Project Type</label>
                <input type="text" id="project_type" name="project_type" required>
            </div>
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" id="client_name" name="client_name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="lead_job">Lead Job</label>
                <input type="text" id="lead_job" name="lead_job" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="deposit_amount">Deposit Amount</label>
                <input type="number" id="deposit_amount" name="deposit_amount" required>
            </div>
            <div class="form-group">
                <label for="deposit_date">Deposit Date</label>
                <input type="date" id="deposit_date" name="deposit_date" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update_assignment">Update Assignment</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(assignment) {
    document.getElementById('assignment_id').value = assignment.id;
    document.getElementById('project_type').value = assignment.project_type;
    document.getElementById('client_name').value = assignment.client_name;
    document.getElementById('phone_number').value = assignment.phone_number;
    document.getElementById('lead_job').value = assignment.lead_job;
    document.getElementById('date').value = assignment.date;
    document.getElementById('status').value = assignment.status;
    document.getElementById('deposit_amount').value = assignment.deposit_amount;
    document.getElementById('deposit_date').value = assignment.deposit_date;
    document.getElementById('amount').value = assignment.amount;
    document.getElementById('editModal').style.display = 'block';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>

</body>
</html>

<?php
include '../view/footer.php';
?>
