 <?php
include('connect.php');
$id= $_GET['id'];
 $deposit='deposit';
$sql = "UPDATE cashbook SET states = :a WHERE ID =:id";
		$query2 = $db->prepare($sql);
        $query2->bindValue(":a", $deposit);
		$query2->bindValue(":id", $id);
		
		$result2 = $query2->execute();
		
		//header("location: welcome.php?id=2");
		echo'<script>window.location="dashboard.php?id=28&d1=&d2=";</script>';
		
?>