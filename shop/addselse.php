<?php session_start(); ?>
<?php


include('connect.php');
$dat=date("Y/m/d");
$pid = $_GET['code'];
$kk=$_POST['kk'];
if($kk==1){
$qun=$_GET['quantity'];
}else{
$qun=$_POST['quantity'];
}
$invoice='#000'.$_SESSION["invoic"];
$pname="";
$price=0;
$quan=0;
$lasttot=0;
$dis=0;
$result = $db->prepare("SELECT * FROM product WHERE prid= :userid");
$result->bindParam(':userid', $pid);
$result->execute();	
for($i=0; $row = $result->fetch(); $i++){
	
	$pname=$row['Product_Name'];
	$price=$row['Price'];
	$quan=$row['Quanaty'];
}

$result21 = $db->prepare("SELECT * FROM invoice WHERE InvoiceNo= :userid");
$result21->bindParam(':userid', $invoice);
$result21->execute();	
for($i=0; $row21 = $result21->fetch(); $i++){
	
	$lasttot=$row21['Amount'];
	$dis=$row21['Discount'];
	
}



if($quan>=$qun){
	
$sql = "UPDATE product SET Quanaty = :a WHERE prid =:id";
		$query1 = $db->prepare($sql);
        $query1->bindValue(":a", $quan-$qun);
		$query1->bindValue(":id", $pid);
		
		$result1 = $query1->execute();

$total=$price*$qun;
$newtot=($lasttot+$total*1.15);
$sql = "UPDATE invoice SET Amount = :a WHERE InvoiceNo =:id";
		$query122 = $db->prepare($sql);
        $query122->bindValue(":a", $newtot);
		$query122->bindValue(":id", $invoice);
		
		$result122 = $query122->execute();




$sql = "INSERT INTO sales(prid,InvoiceNo,Quanaty,price,total,Date) VALUES (:a,:e,:b,:c,:d,:date)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$pname,':e'=>$invoice,':b'=>$qun,':c'=>$price,':d'=>$total,':date'=>$dat));



echo'<script>window.location="dashboard.php?id=2";</script>';

//header("location: dashboard.php?id=2");
}else{
	$message = 'not Product Balance.';

    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"dashboard.php?id=2\");
    </SCRIPT>";
}





?>