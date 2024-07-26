<?php
include 'header.php';
include 'sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finance</title>
  <link rel="stylesheet" href="styles.css">
  <!-- <link rel="stylesheet" href="../css/finance.css"> -->

  <style>
    /* body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    } */
    .container {
      width: 57%;
      height: 73vh;
      margin: 25px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
      left: 40%;
      transform: translateX(-50%);
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
    select, 
    textarea {
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
      float: right;
      margin-top: -2px;
    }
    button:hover {
      background-color: gray;
    }
  </style>
</head>
<body>
  <div class="container">
    <h6>Finance:</h6>
    <form action="finance.php" method="post">
      <label for="entry_type">Entry Type:</label>
      <select id="entry_type" name="entry_type" required>
        <option value="">Select</option>
        <option value="Expense">Expense</option>
        <option value="Salary">Salary</option>
        <option value="Other">Other</option>
      </select><br>
      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4" placeholder="Description..."></textarea><br>
      <label for="amount">Amount <i>$</i>:</label>
      <input type="number" id="amount" name="amount" required placeholder="0.00"><br>
      <label for="dateInput">Date:</label>
      <input type="date" id="dateInput" name="dateInput" required><br><br>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>

<?php
include 'footer.php';
?>
<?php
$conn = new mysqli("localhost", "root", "", "cs");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $entry_type = $_POST['entry_type'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];
  $date = $_POST['dateInput'];

  $sql = "INSERT INTO finance (entry_type, description, amount, date) VALUES ('$entry_type', '$description', '$amount', '$date')";

  if ($conn->query($sql) === TRUE) {
    // header("Location: financeTable.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
