<?php

session_start();
include('connect.php');

$pid = $_GET['cname'];

$sql = "INSERT INTO product_cat(Cat_Name) VALUES (:a)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$pid));

header("location: dashboard.php?id=55");





?>