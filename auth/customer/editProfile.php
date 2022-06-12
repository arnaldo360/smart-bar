<?php
// Include database Connection file
require_once "../../database/dbConnect.php";

// Define variables and initialize with empty values
$fullname = $email = $comtact = $address = $gender = "";
$fullname_err = $email_err = $contact_err = $address_err = $gender_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new fullname
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Please enter the fullname.";
    }else {
        $fullname = trim($_POST["fullname"]);
    }

    // Validate new email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter the email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate new contact
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Please enter the contact.";
    } else {
        $contact = trim($_POST["contact"]);
    }

    // Validate new gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please enter the gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate new address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter the address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Check input errors before updating the database
    if (empty($fullname_err) && empty($email_err) && empty($contact_err) && empty($address_err)&& empty($gender_err)) {
        // Prepare an update statement
        $sql = "UPDATE customer SET customerFullName = ? , customerEmail = ? , customerGender = ? , customerContact = ? , customerPhysicalAdd = ? WHERE customerID = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssi", $param_fullname, $param_email, $param_gender, $param_contact, $param_address , $param_id);

            // Set parameters
            $param_fullname     = $fullname;
            $param_email        = $email;
            $param_contact      = $contact;
            $param_gender       = $gender;
            $param_address      = $address;
            $param_id           = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // record updated successfully
                header("location: ../../pages/userProfile.php");
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
