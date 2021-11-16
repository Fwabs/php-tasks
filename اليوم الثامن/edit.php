<?php
require "DB-C.php";
require "helpers.php";

$id = $_GET['id'];

$query = "SELECT * FROM blog WHERE id = $id";
$operation = mysqli_query($connect,$query);

if(mysqli_num_rows($operation) == 1){
    $data = mysqli_fetch_assoc($operation);
}else{
    header("Location: index.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $title		 = refine($_POST['title']);
	$content     = refine($_POST['content']);
    $image       = refine($_POST['image']);

	$errors = [];

    if(!validation($title,1)){
		$errors['Title'] = "Field Required";
	}
	if(!validation($content,1)){
		$errors['Content'] = "Field Required";
	}
	if (!validation($image)) {
		$errors['Image'] = "image required";
	}

	if(count($errors) > 0){
		foreach($errors as $key => $val){
			echo '* '.$key.' : '.$val.'<br>';
		}
	}else{
        $query = "UPDATE blog SET title='$title', content='$content', image='$image' WHERE id=$id";

        $operation =  mysqli_query($connect,$query);

        if($operation){
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
    <h2 class="d-flex mx-auto justify-content-center my-5">Edit Page</h2>

    <form action="edit.php?id=<?php echo $data['id'];?>" method="POST">

        <div class="form-group">
            <label for="exampleInputName">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $data['title'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
        </div>

        <div class="form-group my-3">
            <label for="exampleInputName">content</label>
            <input type="text" class="form-control" name="content" value="<?php echo $data['content'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter content">
        </div>

        <div class="form-group my-3">
            <label for="exampleInputPassword" class="mb-2">Image</label>
            <input type="file"  name="image" value="<?php echo $data['image'];?>">
		</div>

            <button type="submit" class="btn btn-primary">Update</button>
    </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>