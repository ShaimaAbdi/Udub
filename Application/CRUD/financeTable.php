<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Table</title>
    <link rel="stylesheet" href="../css/table.css">

</head>
<body>
    <div class="container">
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
                $conn = new mysqli("localhost", "root", "", "ums");
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
                                <td>{$row['amount']}</td>
                                <td>{$row['date']}</td>
                                <td class='action'>
                                  <a href='#' class='edit' onclick='openEditModal(". json_encode($row) .")'>Edit</a>
                                  <a href='delete_finance.php?id={$row['id']}' class='delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
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
