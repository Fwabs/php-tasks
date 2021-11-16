<?php
require "DB-connection.php";

$query = "SELECT * FROM todo";
$operation = mysqli_query($connect,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Dashboard</title>
</head>
<body>
    <div class="container">

        <h1 class="d-flex mx-auto justify-content-center my-5">Dashboard Page</h1>

        <table class='table table-hover table-responsive table-bordered'>
            <tr class="">
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Adjust</th>
            </tr>

            <?php 
            while($data = mysqli_fetch_assoc($operation)){
            ?>
            <tr>

                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['title'];?></td>
                <td><?php echo $data['description'];?></td>
                <td><?php echo $data['startdate'];?></td>
                <td><?php echo $data['enddate'];?></td>
                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td>
                
            </tr>

            <?php } ?>
            
        </table>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>