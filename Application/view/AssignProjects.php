<?php
include 'header.php';
include 'sidebar.php';
include '../config/connect.php';

// Function to fetch persons with leadjob role from another_table
function getLeadJobPersons($conn) {
    $leadJobPersons = array();

    $sql = "SELECT empl_id, First_Name, Last_Name FROM register_empl WHERE Role = 'leadjob'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $leadJobPersons[] = $row;
        }
    }

    return $leadJobPersons;
}

// Fetch lead job persons
$leadJobPersons = getLeadJobPersons($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UMS</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/Assign.css">
</head>
<body>
  <div class="container">
    <h6>Assign Project:</h6>
    <form action="" method="post">
      <label for="project_type">Project Type:</label>
      <select id="project_type" name="project_type" required>
        <option value="">Select</option>
        <option value="Commercial">Commercial</option>
        <option value="Documentary">Documentary</option>
        <option value="Event">Event</option>
      </select>

      <label for="client_name">Client Name:</label>
      <input type="text" id="client_name" name="client_name" required>

      <label for="phone_number">Phone Number:</label>
      <input type="tel" id="phone_number" name="phone_number" required>

      <label for="lead_job">Lead Job:</label>
      <select id="lead_job" name="leadjob" required>
        <option value="">Select</option>
        <?php
        // Populate lead job persons in the dropdown
        foreach ($leadJobPersons as $person) {
            echo "<option value='" . $person['empl_id'] . "'>" . $person['First_Name'] . " " . $person['Last_Name'] . "</option>";
        }
        ?>
      </select>

      <label for="dateInput">Date:</label>
      <input type="date" id="dateInput" name="dateInput" required>

      <label for="status">Status:</label>
      <select id="status" name="status" required>
        <option value="">Select</option>
        <option value="Pending">Pending</option>
        <option value="Delay">Delay</option>
        <option value="Completed">Completed</option>
      </select>

      <label for="deposit_amount">Deposit Amount ($):</label>
      <input type="number" id="deposit_amount" name="deposit_amount" min="0" step="0.01" >

      <label for="deposit_date">Deposit Date:</label>
      <input type="date" id="deposit_date" name="deposit_date" >

      <label for="amount">Amount ($):</label>
      <input type="number" id="amount" name="amount" min="0" step="0.01" >

      <button type="submit" name="assign_project">Submit</button>
    </form>
  </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config/connect.php';

    $project_type = $_POST['project_type'];
    $client_name = $_POST['client_name'];
    $phone_number = $_POST['phone_number'];
    $lead_job = $_POST['leadjob'];
    $date = $_POST['dateInput'];
    $status = $_POST['status'];
    $deposit_amount = $_POST['deposit_amount'];
    $deposit_date = $_POST['deposit_date'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO asign_project (project_type, client_name, phone_number, lead_job, date, status, deposit_amount, deposit_date, amount)
            VALUES ('$project_type', '$client_name', '$phone_number', '$lead_job', '$date', '$status', '$deposit_amount', '$deposit_date', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
<?php
include 'footer.php';
?>
