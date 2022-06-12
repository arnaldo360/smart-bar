<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

// declare form field variables and initialize null
$barName = $breallaNum = $barOwner = $barEmail = $barContact = $num_employees = $address = null;

// declare variable and initialize array
$general_errors = $qp_errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // bar name validation
  if (empty(trim($_POST["barName"]))) {
    array_push($general_errors, "Bar name is required");
  } else {
    $barName = trim($_POST["barName"]);
  }

  // brella number validation
  if (empty(trim($_POST["brellaNum"]))) {
    array_push($general_errors, "Brella Number is required");
  } else {
    $brellaNum = trim($_POST["brellaNum"]);
  }

  // barOwner validation
  if (empty(trim($_POST["barOwner"]))) {
    array_push($general_errors, "Bar Owner fullname is required");
  } else {
    $barOwner = trim($_POST["barOwner"]);
  }

  // barEmail validation
  if (empty(trim($_POST["barEmail"]))) {
    array_push($general_errors, "Bar Email is required");
  } else {
    $barEmail = trim($_POST["barEmail"]);
  }

  // Bar contact validation
  if (empty(trim($_POST["barContact"]))) {
    array_push($general_errors, "Bar Contact is required");
  } else {
    $barContact = trim($_POST["barContact"]);
  }

  // Num Of Employees validation
  if (empty(trim($_POST["num_employees"]))) {
    array_push($general_errors, "Best seller is required");
  } else {
    $num_employees = trim($_POST["num_employees"]);
  }

  // Physical address validation
  if (empty(trim($_POST["address"]))) {
    array_push($general_errors, "Physical Address is required");
  } else {
    $address = trim($_POST["address"]);
  }

  

  // check errors before inserting bar into database
  if (count($general_errors) == count($qp_errors)) {

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


?>

