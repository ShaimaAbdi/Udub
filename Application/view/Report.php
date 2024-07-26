

<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report | UMS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 65vh;
            margin-left: 250px; /* Same width as sidebar */
        
        }
        .chart-container {
            width: 900px;
        }
        .pending-projects {
            margin-top: 15px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
   
<?php

// Enable error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Database connection
$con = new mysqli('localhost', 'root', '', 'cs');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Define the project types you want to include in the chart
$allowedProjectTypes = ['Event', 'Commercial','Films' ,'Documentary'];

// Query to count completed projects by project type
$query = $con->query("
    SELECT project_type, COUNT(*) as total
    FROM asign_project
    WHERE status = 'Completed' AND project_type IN ('" . implode("','", $allowedProjectTypes) . "')
    GROUP BY project_type
");

if (!$query) {
    die("Query failed: " . $con->error);
}

$projectTypes = [];
$projectCounts = [];

// Initialize counts for allowed project types
foreach ($allowedProjectTypes as $type) {
    $projectTypes[] = $type;
    $projectCounts[] = 0;
}

// Fetch data
while ($data = $query->fetch_assoc()) {
    $index = array_search($data['project_type'], $allowedProjectTypes);
    if ($index !== false) {
        $projectCounts[$index] = $data['total'];
    }
}
?>

<div class="container">
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
</div>

<div class="pending-projects" id="pendingProjects">
    <!-- Pending projects will be displayed here -->
</div>

<script>
const labels = <?php echo json_encode($projectTypes); ?>;
const data = {
    labels: labels,
    datasets: [{
        label: 'Completed Projects',
        data: <?php echo json_encode($projectCounts); ?>,
        backgroundColor: ['#07031E', '#000'],
        borderColor: ['#000'],
    }]
};
const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        onClick: (event, elements) => {
            if (elements.length) {
                const element = elements[0];
                if (element.datasetIndex === 0) {
                    fetchPendingProjects();
                }
            }
        }
    }
};
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

function fetchPendingProjects() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_pending_projects.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            const response = JSON.parse(this.responseText);
            displayPendingProjects(response);
        }
    };
    xhr.send();
}

function displayPendingProjects(projects) {
    const pendingProjectsDiv = document.getElementById('pendingProjects');
    pendingProjectsDiv.innerHTML = '<h2>Pending Projects:</h2><ul>' +
        projects.map(project => `<li>${project.project_name} (${project.project_type})</li>`).join('') +
        '</ul>';
}
</script>


</body>
</html>



<?php
require_once 'footer.php';
?>