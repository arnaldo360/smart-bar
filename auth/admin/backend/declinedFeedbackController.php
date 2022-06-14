<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {

    // declare form field variables and initialize null
    $feedbackId = $_GET["id"];

    // query to update value on table
    $sql = "UPDATE feedback SET feedbackStatus = ? WHERE feedbackId = ?";

    // prepare an update statement
    if ($statement = $mysqli->prepare($sql)) {
        // bind variables
        $statement->bind_param("si", $param_feedbackStatus, $param_feedbackId);

        // set parameter
        $param_feedbackId              = $feedbackId;
        $param_feedbackStatus          = "DECLINED";

        if ($statement->execute()) {

            header("Location: ../pages/feedback.php?redirect=success");
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
