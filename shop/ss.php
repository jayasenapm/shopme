<?php 
session_start();
unset($_SESSION['invoic']);
$id= $_GET['id'];


$title = strip_tags($id);
echo substr($title, 4, 5);
$_SESSION["invoic"] = substr($title, 4, 5);
echo'<script>window.location="dashboard.php?id=2&d1=";</script>';
?>