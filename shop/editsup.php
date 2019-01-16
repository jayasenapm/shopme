
		<?php
		include('connect.php');
		$id=$_GET['id'];
		$name=$_GET['name'];
		$add=$_GET['address'];
		$ph=$_GET['phone'];
		$sql = "UPDATE supplier SET Name = :a,Address=:b,phone2=:c WHERE SUID =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a",$name );
		$query2->bindValue(":b",$add );
		$query2->bindValue(":c",$ph );
		$query2->bindValue(":id",$id );

		$result2 = $query2->execute();
		
		//header("location: dashboard.php?id=25");
		echo'<script>window.location="dashboard.php?id=25";</script>';
		
		?>