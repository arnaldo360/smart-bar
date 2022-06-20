<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {

    // declare form field variables and initialize null
    $barId = $_GET["id"];

    // query to update value on table
    $sql = "UPDATE bar SET barStatus = ? WHERE barId = ?";

    // prepare an update statement
    if ($statement = $mysqli->prepare($sql)) {
        // bind variables
        $statement->bind_param("si", $param_barStatus, $param_barId);

        // set parameter
        $param_barId              = $barId;
        $param_barStatus          = "ACTIVE";

        if ($statement->execute()) {

            header("Location: ../pages/viewBar.php");
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
