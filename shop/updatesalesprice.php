<?php 

include('connect.php');
$price= $_GET['pric'];
$bid= $_GET['id'];
$prid= $_GET['prid'];
$newq= $_GET['newqu'];

echo $price;

$sql = "UPDATE sales SET price = :a,total=:b  WHERE TransactioId =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $price);
		$query2->bindValue(":b", $price*$newq);
		$query2->bindValue(":id", $bid);
		
		$result2 = $query2->execute();
		
$sql = "UPDATE product SET Price = :a  WHERE Product_Name =:id";
	$query3 = $db->prepare($sql);
     $query3->bindValue(":a", $price);
		
		$query3->bindValue(":id", $prid);
		
		$result3 = $query3->execute();	
		echo'<script>window.location="dashboard.php?id=2";</script>';

		//header("location: dashboard.php?id=2");


?>