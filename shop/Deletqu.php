<?php
include('connect.php');
$QIID=$_GET['QIID'];

$result3 = $db->prepare("DELETE FROM quitems WHERE QIID = :userid");
$result3->bindParam(':userid', $QIID);
$result3->execute();	
echo'<script>window.location="dashboard.php?id=40";</script>';



?>