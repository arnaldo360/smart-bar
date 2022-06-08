<?php

//require once config file
require_once "../../database/dbConnect.php";

// start session
session_start();

if (isset($_SESSION["admin"]) && !empty($_SESSION["admin"])) {

    // store session value in variable
    $usersID = $_SESSION["admin"];

    // Prepare a select statement
    $sql = "SELECT * FROM `admin` WHERE `adminId` = ?";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("s", $param_ID);

        // Set parameters
        $param_ID = $usersID;

        // Attempt to execute the prepared statement
        if($statement->execute()){
            $result = $statement->get_result();

            if($result->num_rows == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve admin field values
                $adminId                = $row['adminId'];
                $adminFirstName         = $row['adminFirstName'];
                $adminLastName          = $row['adminLastName'];
                $adminEmail             = $row['adminEmail'];
                $adminMobile            = $row['adminContact'];
                $adminStatus            = $row['adminStatus'];

            } else {
                echo "admin dont exist";
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
