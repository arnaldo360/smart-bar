<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

if (isset($_POST["id"])) {

    // declare form field variables and initialize null
    $employeeId = $_POST["id"];

    // query to update value on table
    $sql = "UPDATE employee SET employeeStatus = ? WHERE employeeID = ?";

    // prepare an update statement
    if ($statement = $mysqli->prepare($sql)) {
        // bind variables
        $statement->bind_param("si", $param_employeeStatus, $param_employeeId);

        // set parameter
        $param_employeeId              = $employeeId;
        $param_employeeStatus          = "DEACTIVATED";

        if ($statement->execute()) {
 
            echo "successfull";
            // header("Location: ../pages/viewEmployee.php");
            
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
