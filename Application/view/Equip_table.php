<?php
include 'header.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Equipment Table</title>
<style>
 
    #container {
      width: 72%;
      margin: 30px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
      left: 45%;
      transform: translateX(-50%);
      position: inherit;
    

    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    .amount-input {
        width: 100px;
    }
</style>
</head>
<body>

<div id="container">
    <h3>Equipment Table</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Date</th>
                <th>Status</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
       <tbody>
        <tr>
        <td>Camera lenses</td>
        <td>Ab1234</td>
        <td>14/05/2024</td>
        <td>Active</td>
        <td>$500</td>
        <td class="action">
                <a href="#" class="edit">Edit</a>
                <a href="#" class="delete">Delete</a>
            </td>
        </tr>

       </tbody>
    </table>
</div>

</body>
</html>


<?php
include 'footer.php'
?>