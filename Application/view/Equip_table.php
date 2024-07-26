<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "cs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM register_equip";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Table</title>
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
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.4);
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
            background-color:  #08031E;
            border: none;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: gray;
        }
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
        <h2>Equipment Table</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>Date Acquired</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['model']}</td>
                            <td>{$row['manufacturer']}</td>
                            <td>{$row['date_acquired']}</td>
                            <td>{$row['status']}</td>
                            <td>\${$row['price']}</td>
                            <td class='action-buttons'>
                                <a href='#' class='edit-btn' onclick='openEditModal(". json_encode($row) .")'>Edit</a>
                                <a href='delete_equipment.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No equipment found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Equipment</h2>
            <div id="alertMessage"></div>
            <form id="editForm" method="POST" action="">
                <input type="hidden" id="edit_id" name="id">
                <div class="form-group">
                    <label for="edit_name">Name</label>
                    <input type="text" id="edit_name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="edit_model">Model</label>
                    <input type="text" id="edit_model" name="model" required>
                </div>
                <div class="form-group">
                    <label for="edit_manufacturer">Manufacturer</label>
                    <input type="text" id="edit_manufacturer" name="manufacturer" required>
                </div>
                <div class="form-group">
                    <label for="edit_date_acquired">Date Acquired</label>
                    <input type="date" id="edit_date_acquired" name="date_acquired" required>
                </div>
                <div class="form-group">
                    <label for="edit_status">Status</label>
                    <select id="edit_status" name="status" required>
                        <option value="Operational">Operational</option>
                        <option value="Under Maintenance">Under Maintenance</option>
                        <option value="Out of Service">Out of Service</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_price">Price</label>
                    <input type="number" id="edit_price" name="price" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="update_equipment">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(equipment) {
            document.getElementById('edit_id').value = equipment.id;
            document.getElementById('edit_name').value = equipment.name;
            document.getElementById('edit_model').value = equipment.model;
            document.getElementById('edit_manufacturer').value = equipment.manufacturer;
            document.getElementById('edit_date_acquired').value = equipment.date_acquired;
            document.getElementById('edit_status').value = equipment.status;
            document.getElementById('edit_price').value = equipment.price;
            document.getElementById('editModal').style.display = 'block';
            document.body.classList.add('modal-open');
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
            document.body.classList.remove('modal-open');
        }

        window.onclick = function(event) {
            var modal = document.getElementById('editModal');
            if (event.target == modal) {
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        }

        document.getElementById('editForm').onsubmit = function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('edit_equipment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('alertMessage').innerHTML = '<div class="alert alert-success">Equipment updated successfully</div>';
                    setTimeout(() => {
                        closeEditModal();
                        location.reload();
                    }, 2000);
                } else {
                    document.getElementById('alertMessage').innerHTML = '<div class="alert alert-error">' + data.message + '</div>';
                }
            })
            .catch(error => {
                document.getElementById('alertMessage').innerHTML = '<div class="alert alert-error">An error occurred: ' + error.message + '</div>';
            });
        }
    </script>
</body>
</html>

<?php
include 'footer.php';
?>
