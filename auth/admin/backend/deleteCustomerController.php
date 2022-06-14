<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"]) && ($_SERVER["REQUEST_METHOD"] == "POST") ) {

    // declare form field variables and initialize null
    $customerId = $_GET["id"];

    // query to update value on table
    $sql = "UPDATE customer SET customerStatus = ? WHERE customerID = ?";

    // prepare an update statement
    if ($statement = $mysqli->prepare($sql)) {
        // bind variables
        $statement->bind_param("si", $param_customerStatus, $param_customerId);

        // set parameter
        $param_customerId              = $customerId;
        $param_customerStatus          = "DEACTIVATED";

        if ($statement->execute()) {

            header("Location: ../pages/viewCustomer.php");
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }

}