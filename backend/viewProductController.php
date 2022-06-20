<?php

$barId = $_SESSION["barID"];

// retrieve all products from database
$sql = "SELECT * FROM product WHERE barID = $barId";

if ($stmt = $mysqli->prepare($sql)) {

  if ($stmt->execute()) {

    //Get result
    $products        = $stmt->get_result();
    $count_products  = $products->num_rows;

  } else {
    echo "Failed to execute";
  }

  //Close statement
  $stmt->close();

} else {
  
  echo "Failed to prepare";
}
?>