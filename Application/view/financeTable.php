<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Table</title>
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
        .action {
            display: flex;
            justify-content: space-between;
        }
        .action a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 0 5px;
        }
        
    
        .action-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 3px;
            color: #fff;
        }
        .action-buttons a.edit-btn {
            background-color: #28a745;
        }
        .action-buttons a.delete-btn {
            background-color: #dc3545;
        }

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgb(0,0,0);
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
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: # #08031E;
            border: none;
            border-radius:5px;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: gray;
        }
        /* Disable body scroll when modal is open */
        body.modal-open {
            overflow: hidden;
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
    <h2>Finance table</h2>


        <table>
            <thead class="font">
                <tr>
                    <th>Id</th>
                    <th>Entry Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "cs");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM finance";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['entry_type']}</td>
                                <td>{$row['description']}</td>
                                <td>\${$row['amount']}</td>

                                <td>{$row['date']}</td>
                                <td class='action-buttons'>
                                  <a href='#' class='edit-btn' onclick='openEditModal(". json_encode($row) .")'>Edit</a>
                                  <a href='delete_finance.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>

                    
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div id="createUserModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include "CreateUser.php"; ?>
    </div>
</div>
    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Finance Entry</h2>
            <div id="alertMessage"></div>
            <form id="editForm">
                <input type="hidden" id="edit_id" name="id">
                <div class="form-group">
                    <label for="edit_entry_type">Entry Type:</label>
                    <select id="edit_entry_type" name="entry_type" required>
                        <option value="Expense">Expense</option>
                        <option value="Salary">Salary</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_description">Description:</label>
                    <textarea id="edit_description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_amount">Amount:</label>
                    <input type="number" id="edit_amount" name="amount" required>
                </div>
                <div class="form-group">
                    <label for="edit_date">Date:</label>
                    <input type="date" id="edit_date" name="date" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(finance) {
            document.getElementById('edit_id').value = finance.id;
            document.getElementById('edit_entry_type').value = finance.entry_type;
            document.getElementById('edit_description').value = finance.description;
            document.getElementById('edit_amount').value = finance.amount;
            document.getElementById('edit_date').value = finance.date;
            document.getElementById('editModal').style.display = 'block';
            document.body.classList.add('modal-open');
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
            document.body.classList.remove('modal-open');
        }

        // Handle form submission via AJAX
        document.getElementById('editForm').onsubmit = function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('update_finance.php', {
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
</body>
</html>

<?php include 'footer.php'; ?>
