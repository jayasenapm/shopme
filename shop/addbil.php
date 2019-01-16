<?php session_start(); ?>
<?php


	include('connect.php');
	//
		//$dat=date("Y/m/d");
		$_SESSION["sup"] =$_GET['cus'];
		$_SESSION["bill"] =$_GET['bill'];
		$cust=$_SESSION["sup"];
		$bill=$_GET["bill"];
		$dat=$_GET["date"];
		$sql = "INSERT INTO buil (BilNo,SUID,Date) VALUES (:a,:b,:c)";
		$q = $db->prepare($sql);
		
		
	try {	
		
		$q->execute(array(':a'=>$bill,':b'=>$cust,':c'=>$dat));
		
		echo'<script>window.location="dashboard.php?id=5";</script>';
		
		
    
	} catch (Exception $e) {
    
       $ms=$e->getMessage();
		
	echo'<script>window.location="error.php?pn=4&ms='.$ms.'";</script>';
	//echo '<a href="dashboard.php?id=4&ms=$ms">BACK</a>';
    }
	
	

			
		
		
		?>