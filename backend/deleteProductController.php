<?php

// require once database connection file
require_once("../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {

    // declare form field variables and initialize null
    $productId = $_GET["id"];

    // query to update value on table
    $sql = "UPDATE product SET productStatus = ? WHERE productId = ?";

    // prepare an update statement
    if ($statement = $mysqli->prepare($sql)) {
        // bind variables
        $statement->bind_param("si", $param_productStatus, $param_productId);

        // set parameter
        $param_productId              = $productId;
        $param_productStatus          = "DEACTIVATED";

        if ($statement->execute()) {

            header("Location: ../pages/viewProduct.php");
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
