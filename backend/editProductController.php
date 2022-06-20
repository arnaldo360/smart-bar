<?php
//start session
session_start();

// require once database connection file
require_once("../database/dbConnect.php");

// Define variables and initialize with empty values
$productname = $description = $price = $quantity  = "";
$productname_err = $description_err = $price_err = $quantity_err = "";
$productId = $_GET["id"];

// Processing form data when form is submitted
if (isset($_POST['saveChanges'])) {

    // Validate productname 
    if (empty(trim($_POST["productname"]))) {
        $productname_err = "Please enter the product name.";
    } else {
        $productname = trim($_POST["productname"]);
    }

    // Validate description
    if (empty(trim($_POST["description"]))) {
        $description_err = "Please enter product description.";
    } else {
        $description = trim($_POST["description"]);
    }

    // Validate price
    if (empty(trim($_POST["price"]))) {
        $price_err = "Please enter product price.";
    } else {
        $price = trim($_POST["price"]);
    }

    // Validate quantity
    if (empty(trim($_POST["quantity"]))) {
        $quantity_err = "Please Select product quantity.";
    } else {
        $quantity = trim($_POST["quantity"]);
    }


    // Check input errors before updating the database
    if (empty($productname_err) && empty($description_err) && empty($price_err) && empty($quantity_err)) {

        // Prepare an update statement
        $sql = "UPDATE product SET productName = ?, productDescription = ?, productPrice = ?, productQuantity = ? WHERE productId = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssi", $param_productname, $param_description, $param_price, $param_quantity, $param_id);

            // Set parameters
            $param_productname          = $productname;
            $param_description          = $description;
            $param_price                = $price;
            $param_quantity             = $quantity;
            $param_id                   = $productId;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {

                // After successful update of record redurect  to view product page
                header("location: ../pages/viewProduct.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
