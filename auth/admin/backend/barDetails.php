<?php

//require once config file
require_once "../../../database/dbConnect.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // store session value in variable
    $barId = $_GET["id"];

    // Prepare a select statement
    $sql = "SELECT * FROM bar WHERE barId = ? ";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("s", $param_ID);

        // Set parameters
        $param_ID = $barId;

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve bar field values
                $barId                     = $row['barId'];
                $barName                   = $row['barName'];
                $barOwner                  = $row['barOwner'];
                $brellaNumber              = $row['brellaNumber'];
                $barContact                = $row['barContact'];
                $barEmail                  = $row['barEmail'];
                $numberOfEmployees         = $row['numberOfEmployees'];
                $barPhysicalAdd            = $row['barPhysicalAddress'];
                $barStatus                 = $row['barStatus'];
            }
        } else {
            echo "Failed to execute";
        }

        //Close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}
