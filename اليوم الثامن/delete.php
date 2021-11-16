<?php 
require 'DB-C.php';
require 'helpers.php';

$id = $_GET['id'];

if(validation($id,3)){

    $query = "DELETE from blog where id = $id ";
    $operation = mysqli_query($connect,$query);

    if($operation){
        $message = "Raw Removed !!";
    }else{
        $message = "Error Try Again";
    }
}else{
    $message = "Invalid Id!!!";
}

$_SESSION['message'] = $message;

header("Location: index.php");

?>