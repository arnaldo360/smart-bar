<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {

    // declare form field variables and initialize null
    $employeeId = $_GET["id"];

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

            header("Location: ../pages/viewEmployee.php");
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
