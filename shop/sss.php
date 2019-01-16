<?php 
session_start();
unset($_SESSION['bill']);
$id= $_GET['id'];



$_SESSION["bill"] = $id;
header("location: dashboard.php?id=5");
?>