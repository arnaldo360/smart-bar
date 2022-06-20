<?php

// Include database Connection file
require_once "../database/dbConnect.php";

// declare a variable and initialize an array
$login_errors = array();

// Define variables and initialize with empty values
$username = $fullname = $contact = $address = $title = $dateOfBirth = $barId = $gender = $password = $confirm_password = "";
$username_err = $fullname_err = $contacct_err = $address_err = $title_err =  $dateOfBirth_err = $barId_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {

        // Prepare a select statement
        $sql = "SELECT employeeID FROM employee WHERE employeeEmail = ?";

        if ($stmt = $mysqli->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        } else {

            echo "Ooops! there is a tech problem";
        }
    }

    // Validate fullname
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Please enter a fullname.";
    } else {
        $fullname = trim($_POST["fullname"]);
    }

    // Validate contact
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Please enter a contact.";
    } else {
        $contact = trim($_POST["contact"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter a address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please enter a gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate barId
    
        $barId = trim($_POST["barId"]);
    

    // Validate dateOfBirth
    if (empty(trim($_POST["dateOfBirth"]))) {
        $dateOfBirth_err = "Please enter a dateOfBirth.";
    } else {
        $dateOfBirth = trim($_POST["dateOfBirth"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }


    // Check input errors before inserting in database
    if (empty($username_err) && empty($fullname_err) && empty($contact_err) && empty($gender_err) && empty($address_err) && empty($title_err) && empty($dateOfBirth_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO employee (employeeEmail, employeeFullName, employeeContact, employeeGender, employeeTitle, employeeDoB, employeePhysicalAdd, employeeBar, employeePassword, userRole) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssisi", $param_username, $param_fullname, $param_contact, $param_gender, $param_title, $param_dob, $param_address, $param_barId, $param_password, $param_userRole);

            // Set parameters
            $param_username         = $username;
            $param_fullname         = $fullname;
            $param_contact          = $contact;
            $param_gender           = $gender;
            $param_title            = $title;
            $param_dob              = $dateOfBirth;
            $param_address          = $address;
            $param_barId            = $barId;
            $param_userRole         = "2";
            $param_password         = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to view manager page
                header("Location: ../pages/viewEmployee.php?redirect=success");
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
