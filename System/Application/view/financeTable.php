<?php
include 'header.php';
include 'sidebar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    /* #container {
        width: 80%;
        margin: 0 auto;
    } */
    .container{
    
      width: 75%;
      margin: 30px auto;
      marging-left: -20vh;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
      left: 40%;
      position: inherit;
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
    .font{
        color: #fff;
    }
    
    thead {
        background-color: #08031E;
       
    }
    th
    
    .amount-input {
        width: 100px;
    }
    button .edit{
      
    }
    a{
        text-decoration: none;
        color: #fff;
    }
    a:hover{
        color: #fff;
    }
  
</style>
</head>
<body>
  <div class="container">
<table class="table">
  <thead class="font">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Entry type</th>
      <th scope="col">Description</th>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      
      <td class="action">
    <button type="button" class="btn btn-success"><a href="#" class="edit">Edit</a></button>
    <button type="button" class="btn btn-danger"><a href="#" class="delete">Delete</a></button>
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