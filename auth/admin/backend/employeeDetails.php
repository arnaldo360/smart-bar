<?php

//require once config file
require_once "../../../database/dbConnect.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // store session value in variable
    $usersID = $_GET["id"];

    // Prepare a select statement
    $sql = "SELECT * FROM employee WHERE employeeID = ? ";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("s", $param_ID);

        // Set parameters
        $param_ID = $usersID;

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve employee field values
                $employeeId                     = $row['employeeID'];
                $employeeFullName               = $row['employeeFullName'];
                $employeeEmail                  = $row['employeeEmail'];
                $employeeContact                = $row['employeeContact'];
                $employeeGender                 = $row['employeeGender'];
                $employeeTitle                  = $row['employeeTitle'];
                $employeeDoB                    = $row['employeeDoB'];
                $employeePhysicalAdd            = $row['employeePhysicalAdd'];
                $employeeStatus                 = $row['employeeStatus'];
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

?>