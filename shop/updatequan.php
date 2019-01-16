<?php
session_start();
include('connect.php');
$sid= $_GET['id'];
$qun= $_GET['qun'];
$price= $_GET['price'];
$prid= $_GET['prid'];
$new= $_GET['newqu'];
$tqun=0;
$total=0;
$orqun=0;
$result3 = $db->prepare("SELECT * FROM product WHERE Product_Name= :invice");
		$result3->bindParam(':invice',$prid);
		$result3->execute();

				for($i=0; $row3 = $result3->fetch(); $i++){
					
					$tqun=$tqun+$row3['Quanaty']+$new;
					$orqun=$orqun+$row3['Quanaty'];
				}
	
if($tqun >= $qun){				
				
$sql = "UPDATE sales SET quanaty = :a ,total=:b WHERE TransactioId =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $qun);
		$query2->bindValue(":b", $qun*$price);
		$query2->bindValue(":id", $sid);
		
		$result2 = $query2->execute();
		
		
	$sql = "UPDATE product SET quanaty = :a  WHERE Product_Name =:id";
		$query5 = $db->prepare($sql);
        $query5->bindValue(":a",$tqun- $qun);
		
		$query5->bindValue(":id", $prid);
		
		$result5 = $query5->execute();	
		
		
		
		
		$invoice='#000'.$_SESSION["invoic"];
		
		$result = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :invice");
		$result->bindParam(':invice',$invoice);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					//$total=$total+$row[''];
				}				
		
		//header("location: dashboard.php?id=2");
		echo'<script>window.location="dashboard.php?id=2";</script>';
}else{
	
	$message = 'not Product Balance.';

    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"dashboard.php?id=2\");
    </SCRIPT>";
	
	
}
		
?>