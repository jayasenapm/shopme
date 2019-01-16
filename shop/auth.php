<?php session_start(); ?>

<?php
	//Start session
	
	
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location:welcome.php");
		exit();
		
	}else{
		
		
	}
?>