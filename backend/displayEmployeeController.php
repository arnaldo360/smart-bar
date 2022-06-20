<?php

//require once config file
require_once "../database/dbConnect.php";

if (isset($_POST["id"])) {

    // store session value in variable
    $employeeId = $_POST["id"];

    // Prepare a select statement
    $sql = "SELECT * from employee WHERE employeeID = ?";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("i", $param_employeeId);

        // Set parameters
        $param_employeeId = $employeeId;

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $res = $result->fetch_array(MYSQLI_ASSOC);
                
                //retriving data and sending to json
                echo json_encode($res);
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
