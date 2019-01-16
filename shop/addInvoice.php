<?php 
	session_start();
	include('connect.php');
	$su=$_GET['cus'];
	$a=0;
	if($su==2){
		//$dat=date("Y/m/d");
		$_SESSION["sup"] =$_GET['cus'];
		$_SESSION["bill"] =$_GET['bill'];
		$cust=$_SESSION["sup"];
		$bill=$_GET["bill"];
		$dat=$_GET["date"];
		$sql = "INSERT INTO buil (BilNo,SUID,Date) VALUES (:a,:b,:c)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$bill,':b'=>$cust,':c'=>$dat));
		header("location: dashboard.php?id=5&cus=");
	}else{
		if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
			}
	$dat=date("Y/m/d");
		$ln="#000";
		if($_GET['cus']=="no"){
			$_SESSION["cus"] ='working Coustmer';
			 $cust=$_SESSION["cus"];
		}else{
	  $_SESSION["cus"] =$_GET['cus'];
	  $cust=$_SESSION["cus"];
		}
	 
	  $invoice=1;
	  $result = $db->prepare("SELECT * FROM invoice");
		
		$result->execute();

				for($i=0; $row1 = $result->fetch(); $i++){
					//$invoice=$invoice+1;
					$invoice = strip_tags($row1['InvoiceNo']);
					$id= substr($invoice, 4, 6);
					//$_SESSION["invoic"] = substr($title, 4, 5);
					if($id>$a){
						$a=$id;
						
					}else{
						
						
					}
					
					
					
				}
				
		$_SESSION["invoic"] = $a+1;
		$inno="#000".$_SESSION["invoic"];
		$sql = "INSERT INTO invoice (InvoiceNo,CustmerID,Date) VALUES (:a,:b,:c)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$inno,':b'=>$cust,':c'=>$dat));
		header("location: dashboard.php?id=2&cus=");
		
	  
	}
	  ?>