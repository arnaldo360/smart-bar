<?php

//require once config file
require_once "../database/dbConnect.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    // store session value in variable
    $ordersID = $_GET["id"];

    // Prepare a select statement
    $sql = "SELECT ol.quantity, p.productName, p.productImage, b.barName, o.orderStatus, o.tableNumber, ol.totalPrice, o.createdAt 
            FROM orders o 
            JOIN order_list ol ON o.orderListId = ol.orderListId
            JOIN product p ON ol.productId = p.productId
            JOIN bar b ON p.barID = b.barId
            WHERE o.ordersId = ? ";

    if ($statement = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("s", $param_ID);

        // Set parameters
        $param_ID = $ordersID;

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve order field values
                $tableNumber              = $row['tableNumber'];
                $productBar                = $row['barName'];
                $productImage              = $row['productImage'];
                $totalPrice              = $row['totalPrice'];
                $productName           = $row['productName'];
                $quantity           = $row['quantity'];
                $orderStatus             = $row['orderStatus'];
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
