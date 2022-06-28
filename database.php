 
<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ehs-shop";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName); //connection to database

if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
?>