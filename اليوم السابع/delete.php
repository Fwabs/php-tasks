<?php
require "DB-connection.php";
require "helpers.php";

$id = $_GET['id'];

if (validation($id,3)) {
    
    $query = "DELETE FROM todo WHERE id = $id";
    $operation = mysqli_query($connect,$query);

    if ($operation) {
        $message = "Raw Removed !!";
    } else {
        $message = "Error Try Again";
    }
} else {
    $message = "Invalid ID";
}

$_SESSION['message'] = $message;
header("Location: index.php");

?>