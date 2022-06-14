<?php
//start session
session_start();

// require once database connection file
require_once("../../../database/dbConnect.php");

// Define variables and initialize with empty values
$fullname = $email = $mobile = $gender = $title = $address = $date = "";
$fullname_err = $email_err = $mobile_err = $gender_err = $title_err = $address_err = $date_err = "";
$userId = $_GET["id"];

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

    // Validate gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please Select gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate date
    if (empty(trim($_POST["dateOfBirth"]))) {
        $date_err = "Please enter date.";
    } else {
        $date = trim($_POST["dateOfBirth"]);
    }

    // Check input errors before updating the database
    if (empty($fullname_err) && empty($email_err) && empty($mobile_err) && empty($gender_err) && empty($title_err) && empty($address_err) && empty($date_err)) {

        // Prepare an update statement
        $sql = "UPDATE employee SET employeeFullName = ?, employeeEmail = ?, employeeContact = ?, employeeGender = ?, employeeTitle = ?, employeePhysicalAdd = ?, employeeDoB = ? WHERE employeeId = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssi", $param_fullname, $param_email, $param_mobile, $param_gender, $param_title, $param_address, $param_date, $param_id);

            // Set parameters
            $param_fullname = $fullname;
            $param_email    = $email;
            $param_mobile   = $mobile;
            $param_gender   = $gender;
            $param_title    = $title;
            $param_adress   = $adress;
            $param_date     = $date;
            $param_id       = $userId;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {

                // After successful update of record redurect  to view employee page
                header("location: ../pages/viewEmployee.php");
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
