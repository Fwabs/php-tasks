<?php

/*
Create a form with the following inputs (name, email, password, address, gender, linkedin url,
profile pic)
Validate inputs then return message to user. 
* validation rules ... 

name  = [required , string]
email = [required,email]
password = [required,min = 6]
address = [required,length = 10 chars]
gender = [required]
linkedin url = [reuired | url]
Profile pic =[required|image]. 

Then create a profile page to read data that user inserted.

*/
require 'helpers.php';
require 'imageform.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name     = clean($_POST['name']);
    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);
    $address = clean($_POST['address']);
    $gender = clean($_POST['gender']);
    $linkedIn = clean($_POST['linkedIn']);


    $errors = [];

    if(empty($name)){
        $errors['Name'] = "Field Required";
    }

    if(empty($email)){
        $errors['Email'] = "Field Required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['Email'] = "Invalid Email ";
    }


    if(empty($password)){
        $errors['Password'] = "Field Required";
    }elseif(strlen($password) < 6){
        $errors['Password'] = "Length Must Be > 5 ch";
    }

    if(empty($linkedIn)){
        $errors['linkedIn'] = "Field Required";
    }elseif(!filter_var($linkedIn,FILTER_VALIDATE_URL)){
        
        $errors['linkedIn'] = "Invalid Url";

    }

    if(count($errors) > 0){

        foreach ($errors as $key => $value) {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
        echo $name;
    }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2>Register</h2>

    <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">


    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    </div>


    <div class="form-group">
        <label for="exampleInputEmail">Email address</label>
        <input type="email"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

    </div>

    <div class="form-group">
        <label for="exampleInputPassword">New Password</label>
        <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>

    <div class="form-group">
        <label for="exampleInputName">Address</label>
        <input type="text" class="form-control" name="address" id="exampleInputName" aria-describedby="" placeholder="Enter Address">
    </div>

    <div class="form-group">
        <label for="exampleInputName">Gender</label>
        <input type="text" class="form-control" name="gender" id="exampleInputName" aria-describedby="" placeholder="Enter Gender">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail">سوق عكاظ Url</label>
        <input type="url"   class="form-control"  name="linkedIn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter سوق عكاظ URL">

    </div>


<button type="submit" class="btn btn-primary">Submit</button>


    
</form>
</div>

</body>
</html>