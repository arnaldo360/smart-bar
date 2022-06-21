<?php
session_start();
// require once config file
require_once "../database/dbConnect.php";

// declare variables and initialize to null
$quantity_error = $quantity = null;

// execute script when order button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // store product id in variable
  $product_id = $_POST["productId"];

  // store product price in variable
  $product_price = $_POST["productPrice"];

  // store image filename in variable
  $image_file_name = $_POST["productImage"];

  // quantity validation
  if (empty($_POST["quantity"]) || $_POST["quantity"] == 0) {
    $quantity_error = "Quantity is required";
  } else {
    $quantity_error = null;
    $quantity = $_POST["quantity"];
  }

  if (empty($quantity_error)) {

    // prepare an insert statement
    $insertCartSql = "INSERT INTO order_list (customerId, productId, quantity, totalPrice, productImage) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($insertCartSql)) {
      // bind variables
      $stmt->bind_param("iiiss", $param_customer_id, $param_product_id, $param_quantity, $param_total_price, $param_image_file_name);

      // set parameter
      $param_customer_id     = $_SESSION["id"];
      $param_product_id      = $product_id;
      $param_quantity        = $quantity;
      $param_total_price     = $quantity * $product_price;
      $param_image_file_name = $image_file_name;

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


}
