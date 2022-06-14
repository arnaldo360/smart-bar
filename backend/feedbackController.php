<?php

// Include database Connection file
require_once "../database/dbConnect.php";

// Define variables and initialize with empty values
$fullname = $email = $subject = $message = "";
$fullname_err = $email_err = $subject_err = $message_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate fullname
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Please enter a fullname.";
    } else {
        $fullname = trim($_POST["fullname"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate subject
    if (empty(trim($_POST["subject"]))) {
        $subject_err = "Please enter a subject.";
    } else {
        $subject = trim($_POST["subject"]);
    }

    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter a message.";
    } else {
        $message = trim($_POST["message"]);
    }


    // Check input errors before inserting in database
    if (empty($fullname_err) && empty($email_err) && empty($subject_err) && empty($message_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO feedback (fullname, email, feedbackSubject, feedbackMessage) VALUES (?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_fullname, $param_email, $param_subject, $param_message);

            // Set parameters
            $param_email = $email;
            $param_subject  = $subject;
            $param_fullname = $fullname;
            $param_message   = $message;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to view manager page
                header("Location: ../index.php?redirect=success");
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
