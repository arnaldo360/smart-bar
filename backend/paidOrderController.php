<?php
session_start();
// require once config file
require_once "../database/dbConnect.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {

  // store order id in variable
  $order_id = $_GET['id'];

  $sql = "UPDATE orders SET orderStatus = ?, employeeId = ? WHERE ordersId = ?";

  if ($stmt = $mysqli->prepare($sql)) {
    // bind variable
    $stmt->bind_param("sii", $param_order_status, $param_employee_id, $param_orders_id);

    // set parameter
    $param_order_status = "PAID";
    $param_orders_id    = $order_id;
    $param_employee_id  = $_SESSION["id"];

    if ($stmt->execute()) {

      header("Location: ../pages/employeeViewOrders.php?redirect=order_paid");

    } else {
      echo "Failed to execute";
    }

    // close statement
    $stmt->close();

  } else {
    echo "Failed to prepare";
  }

}
