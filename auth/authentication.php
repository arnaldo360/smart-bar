<?php
session_start();
include_once('../database/dbConnect.php');
if ((!isset($_SESSION['username']))&&(!isset($_SESSION['id']))&&(!isset($_SESSION['role'])) && (!isset($_SESSION['barID']))) {
header("Location: ../../index.php"); 

} else {
	$role           = $_SESSION['userRole'];
	$username       = $_SESSION['username'];
	$userId         = $_SESSION['id'];
	$barId			= $_SESSION['barID'];
}
