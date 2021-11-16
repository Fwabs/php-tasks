<?php

require 'helpers.php';
require 'DB-C.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$title		= refine($_POST['title']);
	$content	= refine($_POST['content']);

	$errors = [];
    if(!validation($title,1)){
		$errors['Title'] = "Field Required";
	}
	if(!validation($content,1)){
		$errors['Content'] = "Field Required";
	}
	if(!empty($_FILES['image']['name'])){
        $file_tmp  =  $_FILES['image']['tmp_name'];
        $file_name =  $_FILES['image']['name'];

        $file_ex	= explode('.',$file_name);
        $updated_ex = strtolower(end($file_ex));
        $allowed_ex = ["png","jpg","jpeg"];

		if(in_array($updated_ex, $allowed_ex)){
			$finalName = rand().time().'.'.$updated_ex;
			$imagePath = './images/'.$finalName;

			if(move_uploaded_file($file_tmp,$imagePath)){
				echo 'Image Uploaded';
			}else{
				echo 'Error Try Again';
			}
			}else{
				echo '* inValid Extension!';
			}
	}

    if(count($errors) > 0){
		foreach($errors as $key => $val){
			echo '* '.$key.' : '.$val.'<br>';
		}
	}else{
        $query = "INSERT INTO blog (title,content,image) VALUES ('$title','$content','$finalName')";

        $operation =  mysqli_query($connect,$query);

        if($operation){
            $message =  'Blog Inserted';
        }else{
            $message =  'Error 404!';
        }

        $_SESSION['message'] = $message;

        header("Location: index.php");
	}
	mysqli_close($connect);
}else{
    echo '* Image Field Required';
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
	<title>Main</title>
</head>
<body>
	<div class="container my-5">
	<h2 class="justify-content-center d-flex">Blog</h2>

		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">

		
			<div class="form-group my-3">
				<label for="exampleInputName">Title</label>
				<input type="text" class="form-control" name="title" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
			</div>

			<div class="form-group my-3">
				<label for="exampleInputName">Content</label>
				<input type="text" class="form-control" name="content" id="exampleInputName" aria-describedby="" placeholder="Enter content">
			</div>

			<div class="form-group my-3">
				<label for="exampleInputPassword" class="mb-2">Image</label>
				<input type="file"  name="image">
			</div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    
</body>