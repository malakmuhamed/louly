<?php
include_once "includes/dbh.inc.php";


session_start();

$errors = []; // Initialize an array to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Select data from the database where email matches
    $sql = "SELECT * FROM users WHERE Email='$Email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['Password'];

        // Verify if the entered password matches the hashed password
        if (password_verify($Password, $hashedPassword)) {
            $_SESSION["ID"] = $row["ID"];
            $_SESSION["FName"] = $row["FirstName"];
            $_SESSION["LName"] = $row["LastName"];
            $_SESSION["Email"] = $row["Email"];
            $_SESSION["UserType"] = $row["UserType"];

            if ($_SESSION["UserType"] == "admin") {
                header("Location: admindashboard.php");
                exit();
            } else {
                header("Location: homee.php");
                exit();
            }
        } else {
            $errors[] = "Invalid password.";
        }
    } else {
        $errors[] = "Email does not exist.";
    }
}

$currentPage = basename($_SERVER["SCRIPT_NAME"]);

if (($currentPage === "admin_addproduct.php" || $currentPage === "admindashboard.php" ) && (!isset($_SESSION["UserType"]) || $_SESSION["UserType"] !== "admin")) {
    $errors[] = "You are not authorized to access this page.";
}

// Display error messages
if (!empty($errors)) {
    echo '<div id="error-messages">';
    echo '<div class="error-container">';
    echo '<h2>Error(s) occurred:</h2>';
    echo '<ul class="error-list">';
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';
}
?>
<html lang="en">

<body>
    <?php include "Account.html"; ?>

    <!-- Your remaining HTML content here -->

    <div id="error-messages">
        <?php
        if (!empty($errors)) {
            echo '<div class="error-container">';
           
            echo '<ul class="error-list">';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
            echo '</div>';
        }
        ?>
    </div>

</body>

</html>