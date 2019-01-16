<?php 

include('connect.php');
$price= $_GET['pric'];
$bid= $_GET['id'];


echo $price;

$sql = "UPDATE quitems SET Price = :a  WHERE QIID =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $price);
		
		$query2->bindValue(":id", $bid);
		
		$result2 = $query2->execute();

echo'<script>window.location="dashboard.php?id=40";</script>';
		?>