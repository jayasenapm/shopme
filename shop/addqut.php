<?php session_start(); ?>
<?php

include('connect.php');
$AT=$_GET['id'];
$ID=0;
$date=date("Y-m-d");


		$sql = "INSERT INTO quatation (Date,CID) VALUES (:a,:b)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$AT));

							  $result = $db->prepare("SELECT * FROM quatation");
                              $result->execute();

                              for($i=0; $row = $result->fetch(); $i++){
                              		$ID=$row['QID'];
                              }


		$_SESSION["qid"]=$ID;


		echo'<script>window.location="dashboard.php?id=40&qid=$ID";</script>';





?>