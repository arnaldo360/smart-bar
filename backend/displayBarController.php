<?php

echo $_GET["id"];

// require once database connection file
require_once("../database/dbConnect.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // store bar id in variable
    $barId = $_GET["id"];

    $sql = "SELECT * FROM bar WHERE barId = ?";

    if ($statement = $mysqli->prepare($sql)) {
        // bind variable
        $statement->bind_param("i", $param_barId);

        // set parameter
        $param_barId = $barId;

        if ($statement->execute()) {

            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $bar_row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve bar field values
                $barID                = $bar_row['barId'];
                $brellaNumber         = $bar_row['brellaNumber'];
                $barName              = $bar_row['barName'];
                $barOwner             = $bar_row['barOwner'];
                $barContact           = $bar_row['barContact'];
                $barEmail             = $bar_row['barEmail'];
                $employeeNumber       = $bar_row['employeeNumber'];
                $employeesRegistered  = $bar_row['employeesRegistered'];
                $barRegion            = $bar_row['barRegion'];
                $barDistrict          = $bar_row['barDistrict'];
                $barWard              = $bar_row['barWard'];

                header("location: ../pages/displayBar.php");
            } else {
                // URL doesn't contain valid barId parameter. Redirect to error page
                echo "bar dont exist";
                exit();
            }
        } else {
            echo "Failed to execute";
        }

        // close statement
        $statement->close();
    } else {
        echo "Failed to prepare";
    }
}

?>