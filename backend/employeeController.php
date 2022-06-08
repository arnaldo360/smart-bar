<?php

//require once config file
require_once "../database/dbConnect.php";

if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {

    // store session value in variable
    $username = $_SESSION["username"];

    // Prepare a select statement
    $sql = "SELECT * from employee WHERE employeeEmail= ?";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if($statement->execute()){
            $result = $statement->get_result();

            if($result->num_rows == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve employee field values
                $employeeId             = $row['employeeID'];
                $employeeFullName       = $row['employeeFullName'];
                $employeeEmail          = $row['employeeEmail'];
                $employeeGender         = $row['employeeGender'];
                $employeeMobile         = $row['employeeContact'];
                $employeePhysicalAdd    = $row['employeePhysicalAdd'];
                $employeeStatus         = $row['employeeStatus'];

            } else {
                echo "employee dont exist";
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
