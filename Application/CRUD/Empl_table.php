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
    <link rel="stylesheet" href="../css/styles.css">
    <!-- <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

.container {
  width: 60%;
  margin: 30px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: relative;
  left: 40%;
  transform: translateX(-50%);
  position: inherit;
  height: 100vh;
  
}

h6 {
  text-align: left;
}

form {
  width: 80%;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="tel"],
input[type="number"],
input[type="date"],
select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

button {
  background: #08031E;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  float: right; /* Align the button to the right */
  margin-top: -2px; /* Adjust top margin as needed */
}

button:hover {
  background-color: gray;
} -->

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
            $conn = new mysqli("localhost", "root", "", "ums");

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
                <input type="text" id="address" name="address" required>
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
                <input type="text" id="role" name="role" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update_employee">Update Employee</button>
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
    document.getElementById('editModal').style.display = 'block';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
    document.body.classList.remove('modal-open');
}
 // Handle form submission via AJAX
 document.getElementById('editForm').onsubmit = function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('edit_employee.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => { 
                if (data.success) {
                    document.getElementById('alertMessage').innerHTML = '<div class="alert alert-success">Finance entry updated successfully</div>';
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
        }

</script>
<script>
// Function to open the modal for adding new employees
function openAddModal() {
    document.getElementById('addModal').style.display = 'block';
}

// Function to close the modal
function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
}

// Function to open the modal for editing existing employees
function openEditModal(employee) {
    // Populate the form fields with employee data
    // Include your existing JavaScript code for opening the edit modal here
}

// Function to close the edit modal
function closeEditModal() {
    // Include your existing JavaScript code for closing the edit modal here
}

// Handle form submission via AJAX
document.getElementById('addForm').onsubmit = function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    fetch('add_employee.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('alertMessage').innerHTML = '<div class="alert alert-success">Employee added successfully</div>';
            setTimeout(() => {
                closeAddModal();
                location.reload();
            }, 2000);
        } else {
            document.getElementById('alertMessage').innerHTML = '<div class="alert alert-error">' + data.message + '</div>';
        }
    })
    .catch(error => {
        document.getElementById('alertMessage').innerHTML = '<div class="alert alert-error">An error occurred. Please try again.</div>';
    });
}
</script>

</body>
</html>

<?php
include 'footer.php';
?>
