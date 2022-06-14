<?php
//start session
session_start();

// require once database connection file
require_once("../../../database/dbConnect.php");

// Define variables and initialize with empty values
$newpassword = $renewpassword = "";
$newpassword_err = $renewpassword_err = "";

// Processing form data when form is submitted
if (isset($_POST['newpassword']) && isset($_POST['renewpassword'])) {

    // Validate new password
    if (empty(trim($_POST["newpassword"]))) {
        $newpassword_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["newpassword"])) < 6) {
        $newpassword_err = "Password must have atleast 6 characters.";
    } else {
        $newpassword = trim($_POST["newpassword"]);
    }

    // Validate re new password
    if (empty(trim($_POST["renewpassword"]))) {
        $renewpassword_err = "Please confirm the password.";
    } else {
        $renewpassword = trim($_POST["renewpassword"]);
        if (empty($new_password_err) && ($newpassword != $renewpassword)) {
            $renewpassword_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($newpassword_err) && empty($renewpassword_err)) {
        // Prepare an update statement
        $sql = "UPDATE superadmin SET superAdminPassword = ? WHERE superAdminId = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($newpassword, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: ../index.php?redirect=success");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
