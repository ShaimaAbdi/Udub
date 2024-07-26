<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the TCPDF library
require_once 'TCPDF-main/tcpdf.php';

// Database connection (adjust as necessary)
$con = new mysqli('localhost', 'root', '', 'cs');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Function to fetch finance data
function fetchFinanceData($con, $startDate, $endDate) {
    $query = $con->prepare("
        SELECT * FROM finance 
        WHERE date BETWEEN ? AND ?
    ");
    $query->bind_param('ss', $startDate, $endDate);
    $query->execute();
    return $query->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Function to create PDF
function createPDF($data, $reportType) {
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Finance Report');
    $pdf->SetSubject('Finance Report');
    $pdf->SetKeywords('TCPDF, PDF, finance, report');

    // Set default header data
    $pdf->setPrintHeader(false);

    // Set footer data
    $pdf->setPrintFooter(true);
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->setFooterData(array(0,64,0), array(0,64,128));

    // Add a page
    $pdf->AddPage();

    // Add company logo and name
    $pdf->Image('udub-log.png', 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    $pdf->SetFont('helvetica', 'B', 20);

    // Add report title
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 15, 'Finance Report - ' . ucfirst($reportType), 0, 1, 'C', 0, '', 0, false, 'T', 'M');

    // Add report date and time
    $currentDateTime = date('l, F j, Y \a\t g:i a');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Report generated on: ' . $currentDateTime, 0, 1, 'R', 0, '', 0, false, 'T', 'M');
    $pdf->Ln(10); // Add some space after the date/time

    // Set table header
    $html = '<table border="1" cellspacing="0" cellpadding="4">
                <tr style="background-color: #07031E; color: #ffffff;">
                    <th style="padding: 6px;"><strong>ID</strong></th>
                    <th style="padding: 6px;"><strong>Entry Type</strong></th>
                    <th style="padding: 6px;"><strong>Description</strong></th>
                    <th style="padding: 6px;"><strong>Amount</strong></th>
                    <th style="padding: 6px;"><strong>Date</strong></th>
                </tr>';

    // Add table data
    foreach ($data as $row) {
        $html .= '<tr>
                    <td style="padding: 6px; font-size: 10px;">' . $row['id'] . '</td>
                    <td style="padding: 6px; font-size: 10px;">' . $row['entry_type'] . '</td>
                    <td style="padding: 6px; font-size: 10px;">' . $row['description'] . '</td>
                    <td style="padding: 6px; font-size: 10px;">' . $row['amount'] . '</td>
                    <td style="padding: 6px; font-size: 10px;">' . $row['date'] . '</td>
                </tr>';
    }
    $html .= '</table>';

    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF
    $pdf->Output('finance_report_' . strtolower($reportType) . '.pdf', 'I');
}

// Fetch data based on report type
if (isset($_GET['report'])) {
    $reportType = $_GET['report'];
    $startDate = $endDate = '';

    switch ($reportType) {
        case 'monthly':
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $selectedMonth = $_GET['month'];
                $selectedYear = $_GET['year'];
                $startDate = date('Y-m-01', strtotime("$selectedYear-$selectedMonth-01"));
                $endDate = date('Y-m-t', strtotime("$selectedYear-$selectedMonth-01"));
            }
            break;
        case 'weekly':
            if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
                $startDate = $_GET['startDate'];
                $endDate = $_GET['endDate'];
            }
            break;
        case 'yearly':
            if (isset($_GET['year'])) {
                $selectedYear = $_GET['year'];
                $startDate = $selectedYear . '-01-01';
                $endDate = $selectedYear . '-12-31';
            } else {
                // Default to the current year if no year is specified
                $startDate = date('Y-01-01');
                $endDate = date('Y-12-31');
            }
            break;
    }

    $data = fetchFinanceData($con, $startDate, $endDate);
    createPDF($data, ucfirst($reportType));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Reports</title>
    <style>
        button {
            background-color: #07031E;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        select, input[type="date"] {
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generate Finance Reports</h2>
        <form action="" method="get">
            <label for="report">Select Report Type:</label>
            <select name="report" id="report">
                <option value="monthly">Monthly Report</option>
                <option value="weekly">Weekly Report</option>
                <option value="yearly">Yearly Report</option>
            </select>
            <br><br>
            <div id="dateRange" style="display: none;">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" required>
                <br><br>
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate" required>
                <br><br>
            </div>
            <div id="monthYear" style="display: none;">
                <label for="month">Select Month:</label>
                <select name="month" id="month">
                    <?php
                    // Generate options for months
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option value='$i'>" . date("F", mktime(0, 0, 0, $i, 1)) . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                <label for="year">Select Year:</label>
                <select name="year" id="year">
                    <?php
                    // Generate options for years
                    $currentYear = date('Y');
                    for ($i = $currentYear; $i >= ($currentYear - 10); $i--) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <br><br>
            </div>
            <button type="submit">Generate Report</button>
        </form>
    </div>

    <script>
        // Show date range selection when weekly report is selected
        document.getElementById('report').addEventListener('change', function() {
            var dateRange = document.getElementById('dateRange');
            var monthYear = document.getElementById('monthYear');
            if (this.value === 'weekly') {
                dateRange.style.display = 'block';
                monthYear.style.display = 'none';
            } else if (this.value === 'monthly') {
                dateRange.style.display = 'none';
                monthYear.style.display = 'block';
            } else {
                dateRange.style.display = 'none';
                monthYear.style.display = 'none';
            }
        });
    </script>
</body>
</html>
