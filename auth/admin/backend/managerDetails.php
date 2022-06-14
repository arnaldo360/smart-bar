<?php

//require once config file
require_once "../../../database/dbConnect.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // store session value in variable
    $usersID = $_GET["id"];

    // Prepare a select statement
    $sql = "SELECT * FROM manager JOIN bar ON bar.barId = manager.managerBar WHERE managerId = ? ";

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

                // Retrieve admin field values
                $managerId                     = $row['managerId'];
                $managerFullName               = $row['managerFullName'];
                $managerEmail                  = $row['managerEmail'];
                $managerContact                = $row['managerContact'];
                $managerGender                 = $row['managerGender'];
                $managerBar                    = $row['barName'];
                $managerDoB                    = $row['managerDoB'];
                $managerPhysicalAdd            = $row['managerPhysicalAdd'];
                $managerStatus                 = $row['managerStatus'];
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
