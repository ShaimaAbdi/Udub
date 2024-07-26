<?php
include 'header.php';
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table View</title>
    <style>
        .container {
            width: 75%;
            margin-left: 260px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            left: 40%;
            transform: translateX(-50%);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 7px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        thead {
            background-color: #08031E;
            color: #fff;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
        .action-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .action-buttons a.edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .action-buttons a.delete-btn {
            background-color: #f44336;
            color: white;
        }
        /* Modal styling */
        /* .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            overflow-y: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    overflow-y: hidden; /* Remove vertical scrolling */
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
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color:  #08031E;
            border: none;
            border-radius:5px;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: gray;
        }
        .alert {
            padding: 10px;
            margin-bottom: 10px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
     
    </style>
</head>
<body>

<div class="container">
    <h2>Employee Table</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Date</th>
                <th>Salary</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "cs");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM register_empl";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['empl_id'] . "</td>";
                    echo "<td>" . $row['First_Name'] . "</td>";
                    echo "<td>" . $row['Last_Name'] . "</td>";
                    echo "<td>" . $row['phonenumber'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Salary'] . "</td>";
                    echo "<td>" . $row['Role'] . "</td>";
                    echo "<td class='action-buttons'>";
                    echo "<a href='#' class='edit-btn' onclick='openEditModal(". json_encode($row) .")'>Edit</a>";
                    echo "<a href='del_employee.php?empl_ID=" . $row['empl_id'] . "' class='delete-btn'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- The Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <div id="alertMessage"></div>

        <h2>Edit Employee</h2>
        <form id="editForm" method="POST" action="edit_employee.php">
            <input type="hidden" id="empl_id" name="empl_ID">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <select id="address" name="address" required>
                    <option value="">Select</option>
                    <option value="Abdiaziz">Abdiaziz</option>
                    <option value="Bondhere">Bondhere</option>
                    <option value="Dayniler">Daynile</option>
                    <option value="Dharkeynley">Dharkeynley</option>
                    <option value="Hamar jajab">Hamar-jajab</option>
                    <option value="Hamar weyne">Hamar-weyne</option>
                    <option value="Hodan">Hodan</option>
                    <option value="Howl-wadaag">Howl-wadaag</option>
                    <option value="Heliwa">Heliwa</option>
                    <option value="Kahda">Kahda</option>
                    <option value="Karan">Karan</option>
                    <option value="Shibis">Shibis</option>
                    <option value="Shangaani">Shangaani</option>
                    <option value="Waberi">Waberi</option>
                    <option value="Wadajir">Wadajir</option>
                    <option value="warta-nabada">Warta Nabada</option>
                    <option value="Yaqshiid">Yaqshiid</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dates">Date</label>
                <input type="date" id="dates" name="dates" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" id="salary" name="salary" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select</option>
                    <option value="Admin">Admin</option>
                    <option value="leadjob">Leadjob</option>
                    <option value="Staff">Staff</option>
                </select><br>
            </div>
            <div class="form-group">
                <button type="submit" name="update_employee">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(employee) {
    document.getElementById('empl_id').value = employee.empl_id;
    document.getElementById('firstName').value = employee.First_Name;
    document.getElementById('lastName').value = employee.Last_Name;
    document.getElementById('phoneNumber').value = employee.phonenumber;
    document.getElementById('address').value = employee.Address;
    document.getElementById('dates').value = employee.Date;
    document.getElementById('salary').value = employee.Salary;
    document.getElementById('role').value = employee.Role;

    document.getElementById('editModal').style.display = "block";
}

function closeEditModal() {
    document.getElementById('editModal').style.display = "none";
}

document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    fetch('edit_employee.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('alertMessage').innerHTML = '<div class="alert alert-success">Employee updated successfully</div>';
            setTimeout(() => {
                closeEditModal();
                location.reload();
            }, 2000);
        } else {
            document.getElementById('alertMessage').innerHTML = '<div class="alert alert-error">' + data.message + '</div>';
        }
    })
    .catch(error => {
        document.getElementById('alertMessage').innerHTML = '<div class="alert alert-error">An error occurred. Please try again.</div>';
    });
});
</script>

</body>
</html>

<?php
include 'footer.php';
?>
