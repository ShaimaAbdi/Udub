<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>


<?php
include ('shire.php');
if(isset($_REQUEST['edit_btn'])){
    $id = $_REQUEST['empl_ID'];

    $sql = "select * from  register_empl where empl_id = '$id' " ;
    $result = $conn->query($sql);
    if($result){
        while($row = $result->fetch_array()){
    ?>

    <div class="container">
    <div class="row my-2">
        <div class="col-md-5 offset-3">
        <form action="" method="post">
        
        <label class="form-label" for="">First_name</label>
        <input type="hidden" name="emp_id" value="<?php echo $row['0'] ?>">
        <input type="text" name="fname" class="form-control" value="<?php echo $row['1'] ?>" >
        <label for="" class="form-label">lastname</label>
        <input type="text" name="lname" class="form-control" value=" <?php echo $row['2']?>">
        <label for="" class="form-label">phonenumber</label>
        <input type="text" name="number" class="form-control" value="<?php echo $row['3']?>" >
        <label for="" class="form-label">address</label>
        <input type="text" name="address" class="form-control" value="<?php echo $row['4']?>">
        <label for="" class="form-label">role</label>
        <input type="text" name="role" class="form-control" value=" <?php echo $row['8']?>" >
        <label for="" class="form-label">date</label>
        <input type="text" name="date" class="form-control" value=" <?php echo $row['6']?>" >
        <label for="" class="form-label">salary</label>
        <input type="text" name="salary" class="form-control" value=" <?php echo $row['7']?>" >
        <div class="text-end mt-3">
        <input type="submit" name="update_btn" class="btn btn-success">
        
        </div>
    </form>

        <?Php
        if(isset($_REQUEST['update_btn'])){
            $emp_id = $_REQUEST['emp_id'];
            $Fname = $_REQUEST['fname'];
            $lname = $_REQUEST['lname'];
            $num = $_REQUEST['number'];
            $address = $_REQUEST['address'];
            $role = $_REQUEST['role'];
            $date = $_REQUEST['date'];
            $salary = $_REQUEST['salary'];

            $sql = "update register_empl set First_Name = '$Fname', Last_Name = '$lname', phonenumber = '$num' , Address = '$address', id = '$role', Date = '$date' , Salary = '$salary'
            where empl_id = '$emp_id'
            " ;

            $result = $conn->query($sql);

            echo $result==1? header("location: empl_table.php"):"failed";
        }

        ?>



        </div>
    </div>
    </div>

    <?php
        }
    }
}

?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>






