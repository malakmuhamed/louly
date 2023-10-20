<?php



include_once "includes/dbh.inc.php";
include "Account.html";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Select data from the database where email matches
    $sql = "SELECT * FROM users WHERE Email='$Email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['Password'];


?>