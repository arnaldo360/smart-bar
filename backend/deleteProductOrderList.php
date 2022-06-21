<?php

// require once config file
require_once "../database/dbConnect.php";


// execute when remove product button is clicked
if (isset($_GET["orderList_id"]) && !empty($_GET["orderList_id"])) {

  // store orderList id in variable
  $orderList_id = $_GET["orderList_id"];


  // prepare a delete statement
  $deleteorderListSql = "DELETE FROM order_list WHERE orderListId = ?";

  if ($stmt = $mysqli->prepare($deleteorderListSql)) {
    // bind variable
    $stmt->bind_param("i", $param_orderList_id);

    // set parameter
    $param_orderList_id = $orderList_id;

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
