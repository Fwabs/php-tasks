<?php
// http://localhost/NTI%20PHP/DB-Connection.php

session_start();

$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'group8';

$connect = mysqli_connect($server,$dbuser,$dbpass,$dbname);

if (!$connect) {
    echo "Error 404 not bound: ". mysqli_connect_error();
}


?>