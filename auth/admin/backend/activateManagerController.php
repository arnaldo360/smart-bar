<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // declare form field variables and initialize null
    $managerId = $_GET["id"];

    // query to update value on table
    $sql = "UPDATE manager SET managerStatus = ? WHERE managerId = ?";

    // prepare an update statement
    if ($statement = $mysqli->prepare($sql)) {
        // bind variables
        $statement->bind_param("si", $param_managerStatus, $param_managerId);

        // set parameter
        $param_managerId              = $managerId;
        $param_managerStatus          = "ACTIVE";

        if ($statement->execute()) {

            header("Location: ../pages/viewManager.php");
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
