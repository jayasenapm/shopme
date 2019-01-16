<?php

include('connect.php');
$code = $_POST['code'];
$pname = $_POST['pname'];
$quen = $_POST['Quen'];
$dis = $_POST['Dis'];
$ms = $_POST['ms'];
$price = $_POST['price'];
$catid = $_POST['catid'];
$inv = $_POST['inv'];
//$ls = $_POST['ls'];

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

$sql = "INSERT INTO product (prid,Product_Name,Quanaty,discount,Price,CaId,Image,scale) 
VALUES (:j,:a,:b,:c,:d,:e,:f,:i)";
$q = $db->prepare($sql);
$q->execute(array(':j'=>$code,':a'=>$pname,':b'=>$quen,':c'=>$dis,':d'=>$price,':e'=>$catid,':f'=>$name,':i'=>$ms));

//header("location: dashboard.php?id=7");
if($inv==1){
echo'<script>window.location="dashboard.php?id=2";</script>';
}elseif ($inv==2) {
	# code...
	header("location: dashboard.php?id=5");

}else{
	echo'<script>window.location="dashboard.php?id=7";</script>';
exit;

}



?>