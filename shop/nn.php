<?php session_start(); ?>

<?php


$id= $_GET['id'];


$title = strip_tags($id);

$_SESSION["invoic"] = substr($title, 4, 5);


include('connect.php');

$inv='#000'.$_SESSION["invoic"];
$result = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :userid");
$result->bindParam(':userid', $inv);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
$quan=$row['quanaty'];
$prid=$row['prid'];

$result1 = $db->prepare("SELECT * FROM product WHERE Product_Name= :userid");
$result1->bindParam(':userid', $prid);
$result1->execute();	
for($i=0; $row1 = $result1->fetch(); $i++){		
	$total=$row1['Quanaty'];
	
	$sql = "UPDATE product SET Quanaty = :a WHERE Product_Name =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $total+$quan);
		$query2->bindValue(":id", $prid);
		
		$result2 = $query2->execute();
	
	
}

}
$result = $db->prepare("DELETE FROM invoice WHERE InvoiceNo = :userid");
$result->bindParam(':userid',$inv);
$result->execute();	

$result = $db->prepare("DELETE FROM sales WHERE InvoiceNo = :userid");
$result->bindParam(':userid',$inv);
$result->execute();	
//header("location: dashboard.php?id=3&d1=");
echo'<script>window.location="dashboard.php?id=3&d1=";</script>';


?>