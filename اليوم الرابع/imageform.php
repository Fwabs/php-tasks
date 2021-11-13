<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(!empty($_FILES['image']['name'])){
        $file_tmp  =  $_FILES['image']['tmp_name'];
        $file_name =  $_FILES['image']['name'];

        $file_ex   = explode('.',$file_name);
        $updated_ex = strtolower(end($file_ex));
        $allowed_ex = ["png","jpg"];

        if(in_array($updated_ex, $allowed_ex)){
        $finalName = rand().time().'.'.$updated_ex;
        $disPath = './images/'.$finalName;
        if(move_uploaded_file($file_tmp,$disPath)){
            echo 'Image Uploaded';
        }else{
            echo 'Error Try Again';
        }
        }else{
            echo '* inValid Extension';
    }

}else{
    echo '* Image Field Required';
}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

        <div class="form-group">
            <label for="exampleInputPassword">Image</label>
            <input type="file"  name="image">
        </div>



        <button type="submit" class="btn btn-primary">Upload</button>
</body>
</html>