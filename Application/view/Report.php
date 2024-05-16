
<?php
include "header.php";
include "sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Report Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 700px;
        margin: 20px 300px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        font-size: 25px;
    }
    h2{
        font-size: 15px;
    }
    .summary {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
        margin: 20px 300px;
    }
    .summary div {
        text-align: center;
    }
    canvas {
        margin: 10px auto;
        display: block;
       
    }
</style>
</head>
<body>
    
<div class="container">
    <h1>Report Dashboard</h1>
    <div class="summary">
        <div>
            <h2>Total Projects Completed</h2>
            <p id="totalProjects">-</p>
        </div>
        <div>
            <h2>Total Income</h2>
            <p id="totalIncome">-</p>
        </div>
        <div>
            <h2>Total Expenses</h2>
            <p id="totalExpenses">-</p>
        </div>
    </div>
    <canvas id="monthlyBudgetChart" width="800" height="400"></canvas>
</div>
<script>
    // Dummy data for demonstration
    const totalProjects = 10;
    const totalIncome = 10000;
    const totalExpenses = 5000;
    const monthlyBudgets = [800, 1200, 900, 1100, 1000, 1300, 700, 1500, 850, 950, 1100, 1000];
    const completedProjects = [
        { month: 'Jan', type: 'Documentaries', count: 5 },
        { month: 'Feb', type: 'Films', count: 3 },
        { month: 'Mar', type: 'Commercials', count: 6 },
        { month: 'Apr', type: 'Events', count: 4 },
        { month: 'May', type: 'Documentaries', count: 7 },
        { month: 'Jun', type: 'Films', count: 2 },
        { month: 'Jul', type: 'Commercials', count: 8 },
        { month: 'Aug', type: 'Events', count: 5 },
        { month: 'Sep', type: 'Documentaries', count: 4 },
        { month: 'Oct', type: 'Films', count: 6 },
        { month: 'Nov', type: 'Commercials', count: 3 },
        { month: 'Dec', type: 'Events', count: 7 }
    ];

    // Update summary section
    document.getElementById('totalProjects').innerText = totalProjects;
    document.getElementById('totalIncome').innerText = '$' + totalIncome;
    document.getElementById('totalExpenses').innerText = '$' + totalExpenses;

    // Create bar chart
    const ctx = document.getElementById('monthlyBudgetChart').getContext('2d');
    const monthlyBudgetChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Monthly Budget',
                data: monthlyBudgets,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            onClick: handleClick // Add onClick event handler
        }
    });

    // Function to handle click event on the chart
    function handleClick(event) {
        const activeElement = monthlyBudgetChart.getElementAtEvent(event)[0];
        if (activeElement) {
            const monthIndex = activeElement._index;
            const month = getMonthName(monthIndex);
            const report = getMonthlyReport(month);
            displayReport(report);
        }
    }

    // Function to get the month name from index
    function getMonthName(index) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return months[index];
    }

    // Function to get the report for a specific month
    function getMonthlyReport(month) {
        return completedProjects.find(project => project.month === month);
    }

    // Function to display the report
    function displayReport(report) {
        const reportString = `Completed Projects for ${report.month}: ${report.count} ${report.type}`;
        alert(reportString);
        // You can display the report in any desired format or location on the page
    }
</script>
</body>
</html>
