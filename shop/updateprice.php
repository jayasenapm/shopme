<?php 

include('connect.php');
$price= $_GET['pric'];
$bid= $_GET['id'];
$qun=$_GET['newqu'];

$sql = "UPDATE buy SET Price = :a,Total=:b  WHERE BtransactioId =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $price);
		$query2->bindValue(":b", $price*$qun);
		$query2->bindValue(":id", $bid);
		
		$result2 = $query2->execute();

		//header("location: dashboard.php?id=5");
		echo'<script>window.location="dashboard.php?id=5";</script>';

?>