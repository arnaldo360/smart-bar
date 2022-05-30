<?php

// require once database connection file
require_once("../database/dbConnect.php");

// declare form field variables and initialize null
$barName = $breallaNum = $barOwner = $barEmail = $barContact = $num_employees = $num_of_branches = $barRegion = $barDistrict = $barWard = null;

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

  // num_of_branches validation
  if (empty(trim($_POST["num_of_branches"]))) {
    array_push($qp_errors, "Number of branches is required");
  } else {
    $num_of_branches = trim($_POST["num_of_branches"]);
  }

  // bar region validation
  if (empty(trim($_POST["barRegion"]))) {
    array_push($qp_errors, "Bar Region is required");
  } else {
    $barRegion = trim($_POST["barRegion"]);
  }

  // bar district validation
  if (empty(trim($_POST["barDistrict"]))) {
    array_push($qp_errors, "Bar District is required");
  } else {
    $barDistrict = trim($_POST["barDistrict"]);
  }

  // bar ward validation
  if (empty(trim($_POST["barWard"]))) {
    array_push($qp_errors, "Bar Ward is required");
  } else {
    $barWard = trim($_POST["barWard"]);
  }

  // check errors before inserting bar into database
  if (count($general_errors) == count($qp_errors)) {

    // prepare an insert statement
    $barSql = "INSERT INTO `bar`(`barName`, `brellaNumber`, `barOwner`, `barContact`, `barEmail`, `employeeNumber`, `barBranches`, `barRegion`, `barDistrict`, `barWard`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($statement = $mysqli->prepare($barSql)) {
      // bind variables
      $statement->bind_param("sisisiiiii", $param_barName, $param_brellaNum, $param_barOwner, $param_barContact, $param_barEmail, $param_num_employees, $param_num_of_branches, $param_barRegion, $param_barDistrict, $param_barWard);

      // set parameter
      $param_barName            = $barName;
      $param_brellaNum          = $brellaNum;
      $param_barOwner           = $barOwner;
      $param_barEmail           = $barEmail;
      $param_barContact         = "(+255)" . $barContact;
      $param_num_employees      = $num_employees;
      $param_num_of_branches    = $num_of_branches;
      $param_barRegion          = $barRegion;
      $param_barDistrict        = $barDistrict;
      $param_barWard            = $barWard;

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

