<?php

session_start();

try {
include('connect.php');
$total=0;
$inv=$_SESSION["bill"];
$prid='';
$result = $db->prepare("SELECT * FROM buy  WHERE billNo= :userid");
$result->bindParam(':userid', $inv);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
$quan=$row['Quan'];
$prid=$row['prid'];

$result1 = $db->prepare("SELECT * FROM product WHERE Product_Name= :userid");
$result1->bindParam(':userid', $prid);
$result1->execute();	
for($i=0; $row1 = $result1->fetch(); $i++){		
	$total=$row1['Quanaty'];
	
	$sql = "UPDATE product SET Quanaty = :a WHERE Product_Name =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $total-$quan);
		$query2->bindValue(":id", $prid);
		
		$result2 = $query2->execute();
	
	
}

}



$result = $db->prepare("DELETE FROM buy WHERE billNo = :userid");
$result->bindParam(':userid',$_SESSION["bill"]);
$result->execute();	
//header("location: dashboard.php?id=5");

echo'<script>window.location="dashboard.php?id=5";</script>';

}
//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e;
}

?>