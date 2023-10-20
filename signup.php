<?php
include_once "includes/dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = trim($_POST["FName"]);
    $Lname = trim($_POST["LName"]);
    $Email = trim($_POST["Email"]);
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["passConfirm"];

    // Validate input fields
    $errors = [];

    // Check for empty fields
    if (empty($Fname)) {
        $errors[] = "First name is required.";
    }

    if (empty($Lname)) {
        $errors[] = "Last name is required.";