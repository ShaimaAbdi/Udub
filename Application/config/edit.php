<?php
include '../view/header.php';
include '../view/sidebar.php';
include 'connect.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $project_type = $_POST['project_type'];
    $client_name = $_POST['clientname'];
    $phone_number = $_POST['phoneNumber'];
    $lead_job = $_POST['lead_job'];
    $date = $_POST['dateInput'];
    $status = $_POST['status'];
    $deposit_amount = $_POST['deposit_amount'];
    $deposit_date = $_POST['deposit_date'];
    $amount = $_POST['amount'];

    $sql = "UPDATE asign_project SET 
        project_type='$project_type', 
        client_name='$client_name', 
        phone_number='$phone_number', 
        lead_job='$lead_job', 
        date='$date', 
        status='$status', 
        deposit_amount='$deposit_amount', 
        deposit_date='$deposit_date', 
        amount='$amount' 
        WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: view_assign_table.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM asign_project WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Project</title>
        </head>
        <body>
            <h2>Edit Project</h2>
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="project_type">Project Type:</label>
                <select id="project_type" name="project_type" required>
                    <option value="Commercial" <?php if($row['project_type'] == 'Commercial') echo 'selected'; ?>>Commercial</option>
                    <option value="Documentary" <?php if($row['project_type'] == 'Documentary') echo 'selected'; ?>>Documentary</option>
                    <option value="Event" <?php if($row['project_type'] == 'Event') echo 'selected'; ?>>Event</option>
                </select>

                <label for="clientname">Client Name:</label>
                <input type="text" id="clientname" name="clientname" value="<?php echo $row['client_name']; ?>" required>

                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $row['phone_number']; ?>" required>

                <label for="lead_job">Lead Job:</label>
                <input type="text" id="lead_job" name="lead_job" value="<?php echo $row['lead_job']; ?>" required>

                <label for="dateInput">Date:</label>
                <input type="date" id="dateInput" name="dateInput" value="<?php echo $row['date']; ?>" required>

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Pending" <?php if($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Delay" <?php if($row['status'] == 'Delay') echo 'selected'; ?>>Delay</option>
                    <option value="Completed" <?php if($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                </select>

                <label for="deposit_amount">Deposit Amount ($):</label>
                <input type="number" id="deposit_amount" name="deposit_amount" min="0" step="0.01" value="<?php echo $row['deposit_amount']; ?>" required>

                <label for="deposit_date">Deposit Date:</label>
                <input type="date" id="deposit_date" name="deposit_date" value="<?php echo $row['deposit_date']; ?>" required>

                <label for="amount">Amount ($):</label>
                <input type="number" id="amount" name="amount" min="0" step="0.01" value="<?php echo $row['amount']; ?>" required>

                <button type="submit" name="update">Update</button>
            </form>
        </body>
        </html>

        <?php
    } else {
        echo "No record found";
    }
}

$conn->close();
?>


<?php
include '../view/footer.php';
?>