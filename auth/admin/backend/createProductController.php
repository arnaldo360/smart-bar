<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

// declare form field variables and initialize null
$productname = $type = $category = $class = $quantity = $price = $description = $image = $barId = null;
$productname_err = $type_err = $category_err = $class_err = $quantity_err = $price_err = $description_err = $image_err = $barId_err =  null;

// declare variable and initialize array
$general_errors = $qp_errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // product name validation
  if (empty(trim($_POST["productname"]))) {
    $productname_err = "product name is required";
  } else {
        $productname = trim($_POST["productname"]);
  }

  // Product Type validation
  if (empty(trim($_POST["type"]))) {
    $type_err = "Product Type is required";
  } else {
        $type = trim($_POST["type"]);
  }

  // Product category validation
  if (empty(trim($_POST["category"]))) {
    $category_err = "Product category is required";
  } else {
        $category = trim($_POST["category"]);
  }

  // Product class  validation
  if (empty(trim($_POST["class"]))) {
    $class_err = "Product class is required";
  } else {
    $class = trim($_POST["class"]);
  }

  // Product Quantity validation
  if (empty(trim($_POST["quantity"]))) {
    $quantity_err = "Product Quantity is required";
  } else {
        $quantity = trim($_POST["quantity"]);
  }

  // Product Price validation
  if (empty(trim($_POST["price"]))) {
    $price_err = "Product Price is required";
  } else {
        $price = trim($_POST["price"]);
  }

  // Physical address validation
  if (empty(trim($_POST["description"]))) {
   $description_err = "Physical Address is required";
  } else {
        $description = trim($_POST["description"]);
  }

    // BarId validation
    if (empty(trim($_POST["barId"]))) {
        $barId_err = "BarId is required";
    } else {
        $barId = trim($_POST["barId"]);
    }

  

  // check errors before inserting bar into database
  if (empty($productname_err) && empty($type_err) && empty($category_err) && empty($class_err) && empty($quantity_err) && empty($price_err)&& empty($description_err) && empty($image_err)&& empty($barId_err)) {

    // prepare an insert statement
    $barSql = "INSERT INTO bar (`barName`, `brellaNumber`, `barOwner`, `barContact`, `barEmail`, `numberOfEmployees`, `barPhysicalAddress`)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($statement = $mysqli->prepare($barSql)) {
      // bind variables
      $statement->bind_param("sssssis", $param_barName, $param_brellaNum, $param_barOwner, $param_barContact, $param_barEmail, $param_num_employees, $param_address);

      // set parameter
      $param_barName            = $barName;
      $param_brellaNum          = $brellaNum;
      $param_barOwner           = $barOwner;
      $param_barEmail           = $barEmail;
      $param_barContact         = $barContact;
      $param_num_employees      = $num_employees;
      $param_address            = $address;

      if ($statement->execute()) {

        header("Location: ../pages/viewBar.php?redirect=success");
      } else {
        echo "Failed to execute";
      }

      // close statement
      $statement->close();
    } else {
      echo "Failed to prepare";
    }
  } else {
    echo "not working";
  }
}
