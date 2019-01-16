<?php 

session_start();
include('connect.php');

$no=$_GET['No'];
$tot=$_GET['tot'];

$mthd=$_GET['mth'];
$amount=0;
$pd=0;
$dis=0;
$ftot=0;
$tax=0;
$inno=$_SESSION["bill"];
	$result11 = $db->prepare("SELECT * FROM buy  where billNo=:userid");
	$result11->bindParam(':userid', $inno);
	$result11->execute();

	for($i=0; $row11 = $result11->fetch(); $i++){
		$amount=$amount+ $row11['Total'];
		
	}
	$result12 = $db->prepare("SELECT * FROM buil  where BilNo=:userid");
	$result12->bindParam(':userid', $inno);
	$result12->execute();

	for($i=0; $row12 = $result12->fetch(); $i++){
		
		$date=$row12['Date'];
        $pd=$row12['Payid'];
        $dis=$row12['Discount'];
        $tax=$row12['tax'];
       
	}
	
	
$sql = "UPDATE buil SET Amount = :a,Method = :b,No = :c,Payid = :d WHERE BilNo =:id";
		$query = $db->prepare($sql);
        $query->bindValue(":a", $amount);
		$query->bindValue(":b", $mthd);
		 $query->bindValue(":c", $no);
		$query->bindValue(":d", $tot+$pd);
        $query->bindValue(":id", $inno);
		$result = $query->execute();

		
		$date=date("Y-m-d");
		
		$sql = "INSERT INTO cashbook (Date,AccountTitle,Type,Credit) VALUES (:a,:b,:c,:d)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$no,':c'=>$mthd,':d'=>$tot));
		
		
		
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>POS</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
	@media print {
  #printPageButton {
    display: none;
  }
}
	
	</style>
</head>

<body >
    <section class="content content_content" style="width: 70%; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> COMPANY LOGO
                                    <small class="pull-right">Date: <?php echo  date("Y/m/d"); ?></small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>
                                                                            </strong>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
								
							<?php 
							$cus=$_SESSION["sup"];
							$result = $db->prepare("SELECT * FROM supplier  where Name=:userid");
							$result->bindParam(':userid', $cus);
							$result->execute();

							for($i=0; $row = $result->fetch(); $i++){
							
							
							
							?>
								
								
								
                                <address>
                                    <strong><?php echo $row['Name']; ?></strong>
                                                                        
                                    <br>
                                    Address:
                                   <?php echo $row['Address']; ?>                                  <br>
                                    Phone:
                                   <?php echo $row['phone2']; ?>                                  <br>
                                    Email:<?php echo $row['Name']; ?>                                </address>
									
							<?php } ?>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
						
							<?php 
							$payied=0;
							$no='';
							$inno=$_SESSION["bill"];
							$result = $db->prepare("SELECT * FROM buil  where BilNo=:userid");
							$result->bindParam(':userid', $inno);
							$result->execute();

							for($i=0; $row = $result->fetch(); $i++){
								$payied=$row['Payid'];
								$no=$row['No'];
							
							?>
                                
                                <br>
                                <b>Invoice:</b> <?php echo $inno; ?><br>
                                <b>Payment Due:</b> 2/22/2014<br>
                                <b>Account:</b> 968-34567
								
							<?php } ?>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                             <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										$total=0;
                                       $inno=$_SESSION["bill"];
										$result = $db->prepare("SELECT * FROM buy  where billNo=:userid");
										$result->bindParam(':userid', $inno);
										$result->execute();

										for($i=0; $row4 = $result->fetch(); $i++){
							
										$total=$total+$row4['Total'];?>
							 
                                        
                                            <tr>
                                            <td><?php echo $row4['prid']; ?></td>
                                            <td><?php echo $row4['Price']; ?></td>
                                            <td><?php echo $row4['Quan']; ?></td>
                                            <td><?php echo $row4['Total']; ?></td>
											</tr>
										<?php } ?>
                                                                            </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <p class="lead">Amount Due 2/22/2014</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            
                                            
                                            <tr>
                                                <th>Total:</th>
                                                <td align="right"> <?php echo $total; ?></td>
                                            </tr>
											<tr>
                                                <th>Tax:</th>
                                                <td align="right"> </td>
                                            </tr>
											<tr >
                                                <th>Discount:</th>
                                                <td align="right"> <?php echo '000'; ?></td>
                                            </tr>
											<tr>
                                                <th>Total:</th>
                                                <td align="right"> <?php echo $total; ?></td>
                                            </tr>
											
											<tr>
                                                <th>Payied:</th>
                                                <td align="right"> <?php echo '('.$no. ')'.  $payied; ?></td>
                                            </tr>
											<tr>
                                                <th>Balance:</th>
                                                <td align="right"> <?php echo $total-$payied; ?></td>
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="" id="printPageButton" class="btn btn-default" onclick="myFunction()"><i class="fa fa-print"></i> Print</a>
								<a href="cancelbuy.php" id="printPageButton" class="btn btn-success pull-right""><i class="fa fa-print"></i> cancel</a>
								<a href="dashboard.php?id=5" id="printPageButton" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Back</a>
								<a href="welcome.php?id=1" id="printPageButton" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Finished</a>
                                <script>
									function myFunction() {
									window.print();
									}
								</script>
                            </div>
                        </div>
                    </section>
                </section>
</body>
</html>