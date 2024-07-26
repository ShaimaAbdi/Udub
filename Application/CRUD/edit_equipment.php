<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "ums");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM register_equip WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['firstName'];
    $model = $_POST['lastName'];
    $manufacturer = $_POST['phoneNumber'];
    $date_acquired = $_POST['dateInput'];
    $status = $_POST['address'];
    $price = $_POST['salary'];

    $sql = "UPDATE register_equip SET name='$name', model='$model', manufacturer='$manufacturer', date_acquired='$date_acquired', status='$status', price='$price' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: equipment_table.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Equipment</title>
  <link rel="stylesheet" href="../css/setting.css">
</head>
<body>
    <div class="container">
        <h2>Edit Equipment</h2>
        <form action="" method="post">
            <label for="firstName">Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $row['name']; ?>" required><br>
            
            <label for="lastName">Model:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $row['model']; ?>" required><br>
            
            <label for="phoneNumber">Manufacturer:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $row['manufacturer']; ?>" required><br>

            <label for="dateInput">Date Acquired:</label>
            <input type="date" id="dateInput" name="dateInput" value="<?php echo $row['date_acquired']; ?>"><br>

            <label for="address">Status:</label>
            <select id="address" name="address" required>
                <option value="Maintained" <?php if($row['status'] == 'Maintained') echo 'selected'; ?>>Maintained</option>
                <option value="Active" <?php if($row['status'] == 'Active') echo 'selected'; ?>>Active</option>
            </select><br>

            <label for="salary">Price:<i>$</i>:</label>
            <input type="number" id="amount" name="salary" value="<?php echo $row['price']; ?>" min="0" step="0.01"><br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
