<?php
session_start();
include_once('../database/dbConnect.php');
if ((!isset($_SESSION['username']))&&(!isset($_SESSION['id']))&&(!isset($_SESSION['role']))) {
header("Location: ../../index.php"); 

} else {
	$role           = $_SESSION['role'];
	$username       = $_SESSION['username'];
	$user_id        = $_SESSION['id'];
}
