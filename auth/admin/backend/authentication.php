<?php
session_start();
include_once('../../../database/dbConnect.php');
if ((!isset($_SESSION['username']))&&(!isset($_SESSION['id']))) {
header("Location: ../../../index.php"); 

} else {
	$username       = $_SESSION['username'];
	$userID         = $_SESSION['id'];
}
