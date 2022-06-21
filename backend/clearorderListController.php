<?php

// require once config file
require_once "../database/dbConnect.php";

// execute when remove product button is clicked
if (isset($_GET["customer_id"]) && !empty($_GET["customer_id"])) {

  // store customer id in variable
  $customer_id = $_GET["customer_id"];

  // prepare a delete statement
  $deleteAllCartSql = "DELETE FROM order_list WHERE customerId = ?";

  if ($stmt = $mysqli->prepare($deleteAllCartSql)) {
    // bind variable
    $stmt->bind_param("i", $param_customer_id);

    // set parameter
    $param_customer_id = $customer_id;

    if ($stmt->execute()) {

      header("Location: ../pages/orderList.php");

    } else {
      echo "Failed to execute";
    }

    // close statement
    $stmt->close();

  } else {
    echo "Failed to prepare";
  }

}
