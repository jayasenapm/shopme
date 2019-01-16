<?php

session_start();
include('connect.php');

$pid = $_GET['code'];
$bid = $_GET['bid'];
//$qun=$_POST['quantity'];
$pname="";
$price=0;
$quan=0;
$total=0;
$prid='';
$pp='';
$amount=0;
$amount2=0;
$payd=0;
if($bid==1){
$result = $db->prepare("SELECT * FROM buy WHERE BtransactioId= :userid");
$result->bindParam(':userid', $pid);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
$quan=$row['Quan'];
$prid=$row['prid'];

}	
$result1 = $db->prepare("SELECT * FROM product WHERE Product_Name= :userid");
$result1->bindParam(':userid', $prid);
$result1->execute();	
for($i=0; $row1 = $result1->fetch(); $i++){
	
	$pname=$row1['Product_Name'];
	$price=$row1['Price'];
	$total=$row1['Quanaty'];
	
}
$sql = "UPDATE product SET Quanaty = :a WHERE Product_Name =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $total-$quan);
		$query2->bindValue(":id", $prid);
		
		$result2 = $query2->execute();	
	
$result3 = $db->prepare("DELETE FROM buy WHERE BtransactioId = :userid");
$result3->bindParam(':userid', $pid);
$result3->execute();	
header("location: dashboard.php?id=5");
	
	
}else{
$result = $db->prepare("SELECT * FROM sales WHERE TransactioId= :userid");
$result->bindParam(':userid', $pid);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
$quan=$row['quanaty'];
$prid=$row['prid'];
$inv=$row['InvoiceNo'];
$payd=$row['InvoiceNo'];
$amount2=$row['total'];
}
$result = $db->prepare("SELECT * FROM product WHERE Product_Name= :userid");
$result->bindParam(':userid', $prid);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$pname=$row['Product_Name'];
	$price=$row['Price'];
	$total=$row['Quanaty'];
	
}

$result = $db->prepare("SELECT * FROM invoice WHERE InvoiceNo= :userid");
$result->bindParam(':userid', $inv);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$amount=$row['InvoiceNo'];
	$payd=$row['Payid'];
}

$lastAmu=$amount-$amount2*1.15;
	$sql = "UPDATE invoice SET Amount = :a WHERE InvoiceNo =:id";
		$query1 = $db->prepare($sql);
        $query1->bindValue(":a", $lastAmu);
		
		$query1->bindValue(":id", $inv);
		
		$result1 = $query1->execute();
		
		$sql = "UPDATE product SET Quanaty = :a WHERE Product_Name =:id";
		$query1 = $db->prepare($sql);
        $query1->bindValue(":a", $total+$quan);
		$query1->bindValue(":id", $prid);
		
		$result1 = $query1->execute();
		
$result = $db->prepare("DELETE FROM sales WHERE TransactioId = :userid");
$result->bindParam(':userid', $pid);
$result->execute();	
//header("location: dashboard.php?id=2");
echo'<script>window.location="dashboard.php?id=2";</script>';
}




?>