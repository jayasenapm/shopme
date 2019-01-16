<?php

include('connect.php');
$code = $_POST['code'];
$code1 = $_POST['code1'];
$pname = $_POST['pname'];
$quen = $_POST['Quen'];
$dis = $_POST['Dis'];
$ms = $_POST['ms'];
$price = $_POST['price'];
$catid = $_POST['catid'];
$ls = $_POST['ls'];

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$name     = $_FILES['file']['name'];
	$tmpName  = $_FILES['file']['tmp_name'];
	$error    = $_FILES['file']['error'];
	$size     = $_FILES['file']['size'];
    $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  
	switch ($error) {
		case UPLOAD_ERR_OK:
			$valid = true;
			//validate file extensions
			if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
				$valid = false;
				$response = 'Invalid file extension.';
			}
			//validate file size
			if ( $size/1024/1024 > 2 ) {
				$valid = false;
				$response = 'File size is exceeding maximum allowed size.';
			}
			//upload file
			if ($valid) {
				$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $name;
				move_uploaded_file($tmpName,$targetPath);

			

				
				//header( 'Location: index.php' ) ;
				//exit;
			}
			break;
		case UPLOAD_ERR_INI_SIZE:
			$response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
			break;
		case UPLOAD_ERR_PARTIAL:
			$response = 'The uploaded file was only partially uploaded.';
			break;
		case UPLOAD_ERR_NO_FILE:
			$response = 'No file was uploaded.';
			break;
		case UPLOAD_ERR_NO_TMP_DIR:
			$response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
			break;
		default:
			$response = 'Unknown error';
		break;
	}

	//echo $response;
}
$sql = "UPDATE product SET prid = :j, Product_Name=:a, Quanaty=:b,discount=:c,Price=:d,CaId=:e,Image=:f,scale=:i WHERE prid =:id";
$query2 = $db->prepare($sql);
        $query2->bindValue(":j", $code);		
		$query2->bindValue(":a", $pname);
		$query2->bindValue(":b", $quen);		
		$query2->bindValue(":c", $dis);
		
		$query2->bindValue(":d", $price);		
		$query2->bindValue(":e", $catid);
		
		$query2->bindValue(":f", $name);		
		$query2->bindValue(":i", $ms);
		$query2->bindValue(":id",$code1 );
		
		$result2 = $query2->execute();
		$q = $db->prepare($sql);

header("location: dashboard.php?id=50");
exit;



?>