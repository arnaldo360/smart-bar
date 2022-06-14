<?php
//start session
session_start();

// require once database connection file
require_once("../../../database/dbConnect.php");

// Define variables and initialize with empty values
$fullname = $email = $mobile = "";
$fullname_err = $email_err = $mobile_err = "";

// Processing form data when form is submitted
if (isset($_POST['fullname']) && isset($_POST['email'])&& isset($_POST['mobile'])) {

    // Validate fullname 
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Please enter the Fullname.";
    } else {
        $fullname = trim($_POST["fullname"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate mobile
    if (empty(trim($_POST["mobile"]))) {
        $mobile_err = "Please enter mobile.";
    } else {
        $mobile = trim($_POST["mobile"]);
    }

    // Check input errors before updating the database
    if (empty($fullname_err) && empty($email_err) && empty($mobile_err)) {
        
        // Prepare an update statement
        $sql = "UPDATE superadmin SET superAdminFullName = ?, superAdminEmail = ?, superAdminContact = ? WHERE superAdminId = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_fullname, $param_email, $param_mobile, $param_id);

            // Set parameters
            $param_fullname = $fullname;
            $param_email    = $email;
            $param_mobile   = $mobile;
            $param_id       = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {

                // After successful update of record redurect  to profile page page
                header("location: ../pages/userProfile.php?redirect=success");
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
