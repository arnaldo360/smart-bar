<?php

// require once config file
require_once "../database/dbConnect.php";

  // fetch items in orderList
  $orderListSql = "SELECT * FROM order_list INNER JOIN customer ON order_list.customerId = customer.customerID
  INNER JOIN product ON order_list.productId = product.productId WHERE order_list.customerId = ? AND order_list.orderListStatus = ?";

  if ($stmt = $mysqli->prepare($orderListSql)) {
    // bind variable
    $stmt->bind_param("is", $param_customer_id, $param_orderList_status);

    // set parameter
    $param_customer_id = $_SESSION["id"];
    $param_orderList_status = "PENDING";

    if ($stmt->execute()) {

      $orderList        = $stmt->get_result();
      $count_orderList  = $orderList->num_rows;

    } else {
      echo "Failed to execute";
    }

    // close statement
    $stmt->close();

  } else {
    echo "Failed to prepare";
  }


  // determine subtotal
  $orderListSubTotal = "SELECT SUM(totalPrice) AS subtotal FROM order_list WHERE customerId = ? AND orderListStatus = ?";

  if ($stmt1 = $mysqli->prepare($orderListSubTotal)) {
    // bind variable
    $stmt1->bind_param("is", $param_customer_id, $param_orderList_status);

    // set parameter
    $param_customer_id = $_SESSION["id"];
    $param_orderList_status = "PENDING";

    if ($stmt1->execute()) {

      $output = $stmt1->get_result();

      if ($output->num_rows > 0) {

        $data = $output->fetch_array(MYSQLI_ASSOC);
        $subtotal = $data["subtotal"];

      }

    } else {
      echo "Failed to execute";
    }

    // close statement
    $stmt1->close();

  } else {
    echo "Failed to prepare";
  }
