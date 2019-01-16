<?php

session_start();
include('connect.php');
$k=$_GET['k'];

if($k==1){
	try{
	$name = $_GET['name'];
	$address= $_GET['Address'];
	$email = $_GET['email'];
	$ph1 = $_GET['ph1'];
	$ph2 = $_GET['ph2'];
	$person = $_GET['person'];
	
	$sql = "INSERT INTO supplier (Name,Address,email,phone1,phone2,Contact) VALUES (:a,:b,:c,:d,:e,:f)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$name,':b'=>$address,':c'=>$email,':d'=>$ph2,':e'=>$ph2,':f'=>$person));

	//header("location: dashboard.php?id=4");
	echo'<script>window.location="dashboard.php?id=4";</script>';
	} catch (Exception $e) {
    
       $ms=$e->getMessage();
		
		echo'<script>window.location="error.php?pn=4&ms='.$ms.'";</script>';
	//echo '<a href="dashboard.php?id=4&ms=$ms">BACK</a>';
}



	
}else{

	try{
	$name = $_GET['name'];
	$address= $_GET['Address'];
	$email = $_GET['email'];
	$ph1 = $_GET['ph1'];
	$ph2 = $_GET['ph2'];
	$person = $_GET['person'];
	$sql = "INSERT INTO costumer (Name,Address,phone1,phone2,person) VALUES (:a,:b,:c,:d,:e)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$name,':b'=>$address,':c'=>$email,':d'=>$ph2,':e'=>$person));

//header("location: dashboard.php?id=1");
echo'<script>window.location="dashboard.php?id=1&k=";</script>';
} catch (Exception $e) {
    
       $ms=$e->getMessage();
		
		echo'<script>window.location="error.php?pn=1&ms='.$ms.'";</script>';
	//echo '<a href="dashboard.php?id=4&ms=$ms">BACK</a>';
}


}



?>