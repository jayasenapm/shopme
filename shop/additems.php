<?php

include('connect.php');
$name=$_GET['id'];
$qun=$_GET['quan'];
$qid=$_GET['qid'];
$price=0;
$ID=0;
$date=date("Y-m-d");
							$result = $db->prepare("SELECT * FROM product where Product_Name=:userid");
							$result->bindParam(':userid', $name);
                            $result->execute();

                            for($i=0; $row = $result->fetch(); $i++){

								$price=$row['Price'];


                              }

		$sql = "INSERT INTO quitems (Name,Price,Quan,QID) VALUES (:a,:b,:c,:d)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$name,':b'=>$price,':c'=>$qun,':d'=>$qid));

							 

		echo'<script>window.location="dashboard.php?id=40";</script>';





?>