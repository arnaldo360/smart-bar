<?php

//require once config file
require_once "../database/dbConnect.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // store session value in variable
    $productID = $_GET["id"];

    // Prepare a select statement
    $sql = "SELECT * FROM product JOIN bar ON bar.barId = product.barID WHERE productId = ? ";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("s", $param_ID);

        // Set parameters
        $param_ID = $productID;

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve admin field values
                $productId                 = $row['productId'];
                $productName               = $row['productName'];
                $productDescription        = $row['productDescription'];
                $productType               = $row['productType'];
                $productCategory           = $row['productCategory'];
                $productBar                = $row['barName'];
                $productImage              = $row['productImage'];
                $productPrice              = $row['productPrice'];
                $productQuantity           = $row['productQuantity'];
                $productVolume             = $row['productVolume'];
                $productUnit               = $row['productUnit'];
                $alcoholPercentage         = $row['alcoholPercentage'];
                $productStatus             = $row['productStatus'];
                $createdAt                 = $row['createdAt'];
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
