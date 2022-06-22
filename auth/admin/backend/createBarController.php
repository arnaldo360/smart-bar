<?php

// require once database connection file
require_once("../../../database/dbConnect.php");

// declare form field variables and initialize null
$barName = $breallaNum = $barOwner = $barEmail = $barContact = $num_employees = $address = null;
$barName_err = $breallaNum_err = $barOwner_err = $barEmail_err = $barContact_err = $num_employees_err = $barAddress_err = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // bar name validation
  if (empty(trim($_POST["barName"]))) {
    $barName_err = "Bar name is required";
  } else {
    $barName = trim($_POST["barName"]);
  }

  // brella number validation
  if (empty(trim($_POST["brellaNum"]))) {
    $breallaNum_err = "Brella Number is required";
  } else {
    $brellaNum = trim($_POST["brellaNum"]);
  }

  // barOwner validation
  if (empty(trim($_POST["barOwner"]))) {
    $barOwner_err = "Bar Owner fullname is required";
  } else {
    $barOwner = trim($_POST["barOwner"]);
  }

  // barEmail validation
  if (empty(trim($_POST["barEmail"]))) {
    $barEmail_err = "Bar Email is required";
  } else {
    $barEmail = trim($_POST["barEmail"]);
  }

  // Bar contact validation
  if (empty(trim($_POST["barContact"]))) {
    $barContact_err = "Bar Contact is required";
  } else {
    $barContact = trim($_POST["barContact"]);
  }

  // Num Of Employees validation
  if (empty(trim($_POST["num_employees"]))) {
    $num_employees_err = "Number of Employee is required";
  } else {
    $num_employees = trim($_POST["num_employees"]);
  }

  // Physical address validation
  if (empty(trim($_POST["address"]))) {
    $barAddress_err = "Physical Address is required";
  } else {
    $address = trim($_POST["address"]);
  }

  

  // check errors before inserting bar into database
  if (empty($barName_err) && empty($breallaNum_err)&& empty($barEmail_err)&& empty($barContact_err)&& empty($num_employees_err) && empty($barOwner_err) && empty($barAddress_err)) {

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

