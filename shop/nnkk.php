<?php
session_start();
include('connect.php');
$sid= $_GET['invice'];
$qun= $_GET['quanaty'];
$prid= $_GET['prid'];
$price= $_GET['price'];
$inv= $_GET['inv'];
$q= $_GET['q'];
$orgin=$q-$qun;
$tqun=0;
$amount=0;

		$result3 = $db->prepare("SELECT * FROM product WHERE Product_Name= :invice");
		$result3->bindParam(':invice',$prid);
		$result3->execute();

				for($i=0; $row3 = $result3->fetch(); $i++){
					
					$tqun=$tqun+$row3['Quanaty'];
				}

		$result13 = $db->prepare("SELECT * FROM invoice WHERE InvoiceNo= :invice");
		$result13->bindParam(':invice',$inv);
		$result13->execute();

				for($i=0; $row13 = $result13->fetch(); $i++){
					
					$amount=$row13['Amount'];
				}

if($orgin>0){

$sql = "UPDATE sales SET quanaty = :a ,total=:b WHERE TransactioId =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $orgin);
		$query2->bindValue(":b", $orgin*$price);
		$query2->bindValue(":id", $sid);
		
		$result2 = $query2->execute();

}else{

$result3 = $db->prepare("DELETE FROM sales WHERE TransactioId = :userid");
$result3->bindParam(':userid', $sid);
$result3->execute();


}
				

		
		
	$sql = "UPDATE product SET quanaty = :a  WHERE Product_Name =:id";
		$query5 = $db->prepare($sql);
        $query5->bindValue(":a",$tqun+ $qun);
		
		$query5->bindValue(":id", $prid);
		
		$result5 = $query5->execute();	

	$sql = "UPDATE invoice SET Amount = :a  WHERE InvoiceNo =:id";
		$query15 = $db->prepare($sql);
        $query15->bindValue(":a",$amount-($orgin*$price) );
		
		$query15->bindValue(":id", $inv);
		
		$result15 = $query5->execute();	


		
		//header("location: dashboard.php?id=2");
		echo'<script>window.location="welcome.php?id=2";</script>';

		
?>