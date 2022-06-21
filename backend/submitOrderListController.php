<?php

// require once config file
require_once "../database/dbConnect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  foreach ($_POST["orderListId"] as $key => $value) {

    $insertOrderSql = "INSERT INTO orders (orderListId, orderStatus, tableNumber) VALUES (?, ?, ?)";

    if ($stmt = $mysqli->prepare($insertOrderSql)) {
      // bind variable
      $stmt->bind_param("iss", $param_orderList_id, $param_order_status, $param_table_num);

      // set parameter
      $param_orderList_id      = $value;
      $param_order_status = "PENDING";
      $param_table_num    = $_POST["tableNumber"];


      if ($stmt->execute()) {

        $updateorderListSql = "UPDATE order_list SET orderListStatus = ? WHERE orderListId = ?";

        if ($stmt1 = $mysqli->prepare($updateorderListSql)) {
          // bind variable
          $stmt1->bind_param("si", $param_orderList_status, $param_orderList_id);

          // set parameter
          $param_orderList_status = "SUBMMITED";
          $param_orderList_id     = $value;

          if ($stmt1->execute()) {

            echo "Succeed to update";

          } else {
            echo "Failed to execute";
          }

          // close statement
          $stmt1->close();

        } else {
          echo "Failed to prepare";
        }

        header("Location: ../pages/viewOrders.php?redirect=order_success");

      } else {
        echo "Failed to execute";
      }

      // close statement
      $stmt->close();

    } else {
      echo "Failed to prepare";
    }

  }

}
