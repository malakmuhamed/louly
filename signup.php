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
    }

    if (empty($Email)) {
        $errors[] = "Email is required.";
    }

    if (empty($Password)) {
        $errors[] = "Password is required.";
    }

    if (empty($ConfirmPassword)) {
        $errors[] = "Confirm password is required.";
    }

    // Check for valid email format
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if password and confirm password match
    if ($Password !== $ConfirmPassword) {
        $errors[] = "Password and confirm password do not match.";
    }

    // Check minimum password length
    if (strlen($Password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Check if email is already registered
    $sql = "SELECT COUNT(*) FROM users WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $emailCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($emailCount > 0) {
        $errors[] = "Email is already registered.";