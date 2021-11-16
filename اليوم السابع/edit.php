<?php
require "DB-connection.php";
require "helpers.php";

$id = $_GET['id'];
$query = "SELECT * FROM todo WHERE id = $id";
$operation = mysqli_query($connect,$query);

if(mysqli_num_rows($operation) == 1){
    $data = mysqli_fetch_assoc($operation);
}else{
    header("Location: index.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $title		 = refine($_POST['title']);
	$description = refine($_POST['description']);
	$c_date 	 = refine($_POST['c_date']);
	$e_date 	 = refine($_POST['e_date']);

	$errors = [];

    if(!validation($title,1)){
		$errors['Title'] = "Field Required";
	}
	if(!validation($description,1)){
		$errors['Description'] = "Field Required";
	}
	if (!validation($c_date,2,$e_date)) {
		$errors['Date'] = "Current Date is higher than End Date";
	}

	if(count($errors) > 0){
		foreach($errors as $key => $val){
			echo '* '.$key.' : '.$val.'<br>';
		}
	}else{
        $query2 = "UPDATE todo SET title='$title' , description='$description' , startdate='$c_date' , enddate='$e_date' WHERE id=$id";

        $operation2 =  mysqli_query($connect,$query2);

        if($operation2){
            $message = "Raw Updated";
        }else{
            $message =  'Error Try Again !!!';
        }
        $_SESSION['message'] = $message;
        header("Location: index.php");
    }
    mysqli_close($connect);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1 class="d-flex mx-auto justify-content-center my-5">Edit Page</h1>

    <form action="edit.php?id=<?php echo $data['id'];?>" method="POST">

        <div class="form-group">
            <label for="exampleInputName">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $data['title'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
        </div>
    
        <div class="form-group">
            <label for="exampleInputName">Title</label>
            <input type="text" class="form-control" name="description" value="<?php echo $data['description'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
        </div>

        <div class="form-group my-3">
				<label for="exampleInputName">Current Date</label>
				<input type="date" class="form-control" name="c_date" value="<?php echo $data['startdate'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
			</div>

			<div class="form-group my-3">
				<label for="exampleInputName">End Date</label>
				<input type="date" class="form-control" name="e_date" value="<?php echo $data['enddate'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
			</div>

            <button type="submit" class="btn btn-primary">Update</button>
    </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>