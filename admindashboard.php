<?php
session_start();
include_once "includes/dbh.inc.php";
// Check if the user is an administrator
if (!isset($_SESSION["UserType"]) || $_SESSION["UserType"] !== "admin") {
    echo "You are not authorized to access this page.";
    exit();
}

include "html/Admin Dashboard.html";
?>