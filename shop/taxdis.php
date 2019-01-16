<?php 

include('connect.php');
$tax= $_GET['tax'];
$bill= $_GET['bill'];


$sql = "UPDATE buil SET Discount = :a  WHERE BilNo =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $tax);
		
		$query2->bindValue(":id", $bill);
		
		$result2 = $query2->execute();

		//header("location: dashboard.php?id=5");
		echo'<script>window.location="dashboard.php?id=5";</script>';

?>