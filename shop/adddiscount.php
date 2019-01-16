<?php session_start(); ?>

<?php
include('connect.php');
$sid= $_GET['id'];
$qun= $_GET['discount'];
$invoice='#000'.$_SESSION["invoic"];
$lasttot=0;
$result21 = $db->prepare("SELECT * FROM invoice WHERE InvoiceNo= :userid");
$result21->bindParam(':userid', $invoice);
$result21->execute();	
for($i=0; $row21 = $result21->fetch(); $i++){
	
	$lasttot=$row21['Amount'];
	
}

$orgin=$lasttot;
$sql = "UPDATE invoice SET Discount = :a,Amount=:b WHERE InvoiceNo =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $qun);
         $query2->bindValue(":b", $orgin);
		$query2->bindValue(":id", $sid);
		
		$result2 = $query2->execute();
		
		//header("location: dashboard.php?id=2");
	echo'<script>window.location="dashboard.php?id=2";</script>';	
		
?>