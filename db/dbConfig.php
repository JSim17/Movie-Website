<?php

$dbServername = "localhost";
$dbUsername = "1910721";
$dbPassword = "";
$dbName = "db1910721";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    // If there is an error with the connection
    exit('Failed to connect to MySQL: '.mysqli_connect_error());
}

// Tables: accounts, movies, reviews