<?php

session_start();
include('connect.php');

$total=0;
$inv=$_SESSION["bill"];
$prid='';
try{
$result = $db->prepare("SELECT * FROM buy  WHERE billNo= :userid");
$result->bindParam(':userid', $inv);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
$quan=$row['Quan'];
$prid=$row['prid'];
echo $prid;
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
$result = $db->prepare("DELETE FROM buil WHERE BilNo = :userid");
$result->bindParam(':userid',$inv);
$result->execute();	

$result = $db->prepare("DELETE FROM buy WHERE billNo = :userid");
$result->bindParam(':userid',$_SESSION["bill"]);
$result->execute();	
//header("location: index.php?id=5");
echo'<script>window.location="welcome.php?id=";</script>';
} catch (Exception $e) {
    
       $ms=$e->getMessage();
		
	echo'<script>window.location="error.php?pn=5&ms='.$ms.'";</script>';
	//echo '<a href="dashboard.php?id=4&ms=$ms">BACK</a>';
}




?>