<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "ums");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_equipment'])) {
    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $model = $_POST['model'];
    $manufacturer = $_POST['manufacturer'];
    $date_acquired = $_POST['date_acquired'];
    $status = $_POST['status'];
    $price = $_POST['price'];

    // Update the equipment in the database
    $stmt = $conn->prepare("UPDATE register_equip SET name=?, model=?, manufacturer=?, date_acquired=?, status=?, price=? WHERE id=?");
    $stmt->bind_param("ssssssi", $name, $model, $manufacturer, $date_acquired, $status, $price, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Equipment updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating equipment');</script>";
    }

    $stmt->close();
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
    <link rel="stylesheet" href="../css/table.css">
    <!-- <style>
        .container {
            max-width: 1200px;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 310px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
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
        /* Disable body scroll when modal is open */
        body.modal-open {
            overflow: hidden;
        }
    </style> -->
</head>
<body>
    <div class="container">
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
                            <td class='action'>
                                <button type='button' class='btn btn-success edit-btn' onclick='openEditModal(". json_encode($row) .")'>Edit</button>
                                <button type='button' class='btn btn-danger delete-btn'><a href='delete_equipment.php?id={$row['id']}' class='delete'>Delete</a></button>
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

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Equipment</h2>
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
                    <input type="text" id="edit_status" name="status" required>
                </div>
                <div class="form-group">
                    <label for="edit_price">Price</label>
                    <input type="number" id="edit_price" name="price" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="update_equipment">Update Equipment</button>
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

        // Close modal when clicking outside of the modal content
        window.onclick = function(event) {
            var modal = document.getElementById('editModal');
            if (event.target == modal) {
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
include 'footer.php';
?>
