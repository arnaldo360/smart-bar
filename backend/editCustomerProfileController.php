<?php
//start session
session_start();

// require once database connection file
require_once("../database/dbConnect.php");

// Define variables and initialize with empty values
$fullname = $email = $mobile = $gender = $address = "";
$fullname_err = $email_err = $mobile_err = $gender_err = $address_err = "";

// Processing form data when form is submitted
if (isset($_POST['saveChanges'])) {

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


    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please enter gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Check input errors before updating the database
    if (empty($fullname_err) && empty($email_err) && empty($mobile_err) && empty($address_err) && empty($gender_err)) {

        // Prepare an update statement
        $sql = "UPDATE customer SET customerFullName = ?, customerEmail = ?, customerContact = ?, customerGender = ?, customerPhysicalAdd = ? WHERE customerID = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssi", $param_fullname, $param_email, $param_mobile, $param_gender, $param_address, $param_id);

            // Set parameters
            $param_fullname     = $fullname;
            $param_email        = $email;
            $param_mobile       = $mobile;
            $param_gender       = $gender;
            $param_address      = $address;
            $param_id           = $_SESSION["id"];

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
    } else {
        echo "Oops! Something went wrong.";
    }

    // Close connection
    $mysqli->close();
}
