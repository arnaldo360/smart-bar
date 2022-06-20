<?php

// require once database connection file
require_once("../database/dbConnect.php");

// declare form field variables and initialize null
$productname = $type = $category = $alcoholPercentage = $volume = $unit = $quantity = $price = $description = $photo = $barId = null;
$productname_err = $type_err = $category_err = $alcoholPercentage_err = $volume_err = $unit_err = $quantity_err = $price_err = $description_err = $photo_err = $barId_err =  null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("../assets/image/upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/image/upload/" . $filename);
                $photo = $filename;
            }
        } else {
            $photo_err = "Error: There was a problem uploading your file. Please try again.";
            echo $photo_err;
        }
    } else {
        $photo_err = "Error: " . $_FILES["photo"]["error"];
        echo $photo_err;
    }

    // BarId validation
    if (empty(trim($_POST["barId"]))) {
        $barId_err = "BarId is required";
    } else {
        $barId = trim($_POST["barId"]);
    }

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

    // Product AlcoholPercentage  validation
    if (empty(trim($_POST["alcoholPercentage"]))) {
        $alcoholPercentage_err = "Product AlcoholPercentage is required";
    } else {
        $alcoholPercentage = trim($_POST["alcoholPercentage"]);
    }

    // Product Volume validation
    if (empty(trim($_POST["volume"]))) {
        $volume_err = "Product Volume is required";
    } else {
        $volume = trim($_POST["volume"]);
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

    // product unit validation
    if (empty(trim($_POST["unit"]))) {
        $unit_err = "Product Unit is required";
    } else {
        $unit = trim($_POST["unit"]);
    }

    // check errors before inserting bar into database
    if (empty($productname_err) && empty($type_err) && empty($category_err) && empty($alcoholPercentage_err) && empty($volume_err) && empty($unit_err) && empty($quantity_err) && empty($price_err) && empty($description_err) && empty($photo_err) && empty($barId_err)) {

        // prepare an insert statement
        $barSql = "INSERT INTO product (`productName`, `productDescription`, `productType`, `productCategory`, `productImage`, `productPrice`, `productQuantity`, `productUnit`, `productVolume`, `alcoholPercentage`, `barID`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($statement = $mysqli->prepare($barSql)) {
            // bind variables
            $statement->bind_param("sssssiisssi", $param_name, $param_description, $param_type, $param_category, $param_photo, $param_price, $param_quantity, $param_unit, $param_volume, $param_alcoholPercentage, $param_barId);

            // set parameter
            $param_name                     = $productname;
            $param_description              = $description;
            $param_type                     = $type;
            $param_category                 = $category;
            $param_volume                   = $volume;
            $param_photo                    = $photo;
            $param_price                    = $price;
            $param_unit                     = $unit;
            $param_alcoholPercentage        = $alcoholPercentage;
            $param_quantity                 = $quantity;
            $param_barId                    = $barId;

            if ($statement->execute()) {

                header("Location: ../pages/viewProduct.php?redirect=success");
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
