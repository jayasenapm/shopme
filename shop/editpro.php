
		<?php
		include('connect.php');
		$id=$_GET['id'];
		$name=$_GET['name'];
		$add=$_GET['address'];
		$ph=$_GET['phone'];
		$sql = "UPDATE product SET Product_Name = :a,discount=:b,Price=:c WHERE prid =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a",$name );
		$query2->bindValue(":b",$add );
		$query2->bindValue(":c",$ph );
		$query2->bindValue(":id",$id );

		$result2 = $query2->execute();
		
		header("location: dashboard.php?id=26");
		
		
		?>