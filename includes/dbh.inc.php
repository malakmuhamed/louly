<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$DB = "lab4";


$conn = mysqli_connect($servername, $username, $password, $DB);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>