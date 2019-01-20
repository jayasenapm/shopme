
<?php session_start(); ?>
<?php
include('connect.php');
$pid=$_GET['pid'];
$id=$_GET['pid'];
$qun=$_GET['Quen'];
$bill=$_GET['id'];
$pname="";
$price=0;
$quan=0;
$lasttot=0;
$dis=0;
$bulk=0;
$tqun=0;
$result = $db->prepare("SELECT * FROM product WHERE prid= :userid");
$result->bindParam(':userid', $pid);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$quan=$quan+$row['Quanaty'];
}
$result = $db->prepare("SELECT * FROM buy WHERE billNo= :bil");
$result->bindParam(':bil', $bill);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$tqun=$tqun+$row['Quan'];
}
$result = $db->prepare("SELECT * FROM bulk WHERE billno= :bilno");
$result->bindParam(':bilno', $bill);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$bulk=$bulk+$row['qun'];
}
$ss=$tqun-$bulk;

if($ss>=$qun){

$sql = "INSERT INTO bulk(billno,qun) VALUES (:a,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$bill,':e'=>$qun));

$sql = "UPDATE product SET Quanaty = :a WHERE prid =:id";
		$query1 = $db->prepare($sql);
        $query1->bindValue(":a", $quan+$qun);
		$query1->bindValue(":id", $pid);
		
		$result1 = $query1->execute();
if($tqun==($qun+$bulk)){
		$sql = "UPDATE buy SET catagrize = :a WHERE billNo= :bil";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a",'Yes');
		$query2->bindValue(":bil", $bill);
		
		$result2 = $query2->execute();

}
		header("location: dashboard.php?id=44");
}else{
	$msg='INSERT CURRECT Q';
	header("location: dashboard.php?id=44&msg=$msg");
}


/*
$sql = "UPDATE invoice SET Amount = :a WHERE InvoiceNo =:id";
		$query122 = $db->prepare($sql);
        $query122->bindValue(":a", $newtot);
		$query122->bindValue(":id", $invoice);
		
		$result122 = $query122->execute();
*/
	
		
?>