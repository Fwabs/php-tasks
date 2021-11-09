<?php

/*

Create a form with the following inputs (name, email, password, address, linkedin url)
Validate inputs then return message to user.

* validation rules ... 
name  = [required ]
email = [required,email]
password = [required,min length = 6]
address = [required,length = 10 chars]
linkedin url = [required | url]

*/

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $linkedurl = $_POST['url'];


    if(empty($name)){
        echo "Name's Required";
    } elseif(empty($email)){
        echo "Email's Required";
    } elseif(empty($password) or strlen($password) < 6){
        echo "Password's Required";
    } elseif(empty($address) or strlen($address) < 10){
        echo "Password's Required"; 
    } elseif(empty($linkedurl)){
        echo "LinkedIn Url's Required";
    } else{
        echo $name."<br>".$email."<br>".$password."<br>".$address."<br>".$linkedurl."<br>";
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
        <label for="exampleInputEmail">سوق عكاظ Url</label>
        <input type="url"   class="form-control"  name="url" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter سوق عكاظ URL">

    </div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>