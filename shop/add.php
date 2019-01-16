<?php

include('connect.php');
$AT=$_GET['id'];
$Amount=$_GET['amount'];
$tital='';
$date=date("Y-m-d");
$mthd='';
$bank='-';

		if($AT=='ADD CASH'){
		$tital='Add Cash';
		$mthd='Cash';
		
		$sql = "INSERT INTO cashbook (Date,AccountTitle,Type,Debit,Bank) VALUES (:a,:b,:c,:d,:bank)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$tital,':c'=>$mthd,':d'=>$Amount,':bank'=>$bank));


	
		
		}elseif ($AT=='Withdrawal CASH') {
		$tital='Withdrawal Cash';
		$mthd='Cash';
		$sql = "INSERT INTO cashbook (Date,AccountTitle,Type,Credit,Bank) VALUES (:a,:b,:c,:d,:bank)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$tital,':c'=>$mthd,':d'=>$Amount,':bank'=>$bank));

	

		}elseif ($AT=='deposit') {

		$tital='deposit';
		$mthd='bank';
		$sql = "INSERT INTO cashbook (Date,AccountTitle,Type,Debit,Bank) VALUES (:a,:b,:c,:d,:bank)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$tital,':c'=>$mthd,':d'=>$Amount,':bank'=>$bank));

			
		}elseif ($AT=='Withdrawal') {
			
		$tital='Withdrawal';
		$mthd='Withdrawal';
		$sql = "INSERT INTO cashbook (Date,AccountTitle,Type,Credit,Bank) VALUES (:a,:b,:c,:d,:bank)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$tital,':c'=>$mthd,':d'=>$Amount,':bank'=>$bank));

		}


		echo'<script>window.location="welcome.php";</script>';
		

?>