

<?php
include('connect.php');
$pid=$_GET['pid'];
$qun=$_GET['Quen'];
$pname="";
$price=0;
$quan=0;
$lasttot=0;
$dis=0;
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

/*
$sql = "UPDATE invoice SET Amount = :a WHERE InvoiceNo =:id";
		$query122 = $db->prepare($sql);
        $query122->bindValue(":a", $newtot);
		$query122->bindValue(":id", $invoice);
		
		$result122 = $query122->execute();
*/
	//	header("location: uncategorystock.php?id=2");
		echo 'jaya';
?>