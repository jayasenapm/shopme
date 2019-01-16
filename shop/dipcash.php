<?php
include('connect.php');
$dip= $_GET['dip'];
$cash='cash';
$diposit='bank';
$diposit2='Cash';
$bank='bank';

if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$date=date("Y/m/d");
$sql = "INSERT INTO cashbook(Date,AccountTitle,Type,Debit) VALUES (:date,:a,:e,:b)";
$q = $db->prepare($sql);
$q->execute(array(':date'=>$date,':a'=>$cash,':e'=>$diposit,':b'=>$dip));

$sql = "INSERT INTO cashbook(Date,AccountTitle,Type,Credit) VALUES (:date,:a,:e,:b)";
$q = $db->prepare($sql);
$q->execute(array(':date'=>$date,':a'=>$bank,':e'=>$diposit2,':b'=>$dip));


		
		//header("location: welcome.php?id=2");
		echo'<script>window.location="dashboard.php?id=28&d1=&d2=";</script>';
		
?>