<?php

//require once config file
require_once "../../../database/dbConnect.php";

if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {

    // store session value in variable
    $usersID = $_SESSION["id"];

    // Prepare a select statement
    $sql = "SELECT * FROM superadmin WHERE superAdminId = ? ";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("i", $param_ID);

        // Set parameters
        $param_ID = $usersID;

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve admin field values
                $superAdminId               = $row['superAdminId'];
                $superAdminFullName         = $row['superAdminFullName'];
                $superAdminEmail            = $row['superAdminEmail'];
                $superAdminContact          = $row['superAdminContact'];
                $status                     = $row['status'];
                
            } else {
                echo "Super Admin dont exist";
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
