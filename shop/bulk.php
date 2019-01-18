<?php

session_start();
include('connect.php');

$pid = $_POST['catid'];
$price=$_POST['price'];
$qun=$_POST['Quen'];
$bill=$_SESSION["bill"];
//$pname="";
//$price=0;
//$quan=0;
/*
$result = $db->prepare("SELECT * FROM product WHERE prid= :userid");
$result->bindParam(':userid', $pid);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$pname=$row['Product_Name'];
	$price=$row['Price'];
	$quan=$row['Quanaty'];
}

$sql = "UPDATE product SET Quanaty = :a WHERE prid =:id";
		$query1 = $db->prepare($sql);
        $query1->bindValue(":a", $quan+$qun);
		$query1->bindValue(":id", $pid);
		
		$result1 = $query1->execute();
*/
$total=$price*$qun;

$sql = "INSERT INTO buy(prid,billNo,Quan,price,total) VALUES (:a,:e,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$pid,':e'=>$bill,':b'=>$qun,':c'=>$price,':d'=>$total));

header("location: dashboard.php?id=5");





?>