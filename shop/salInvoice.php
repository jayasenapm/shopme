<?php 

session_start();
include('connect.php');
function formatMoney($number, $fractional=false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
$no=$_GET['No'];
$tot=$_GET['tot'];
$mthd=$_GET['mth'];
$bank=$_GET['bank'];
$pay=$_GET['pay'];
$amount=0;
$date='';
$ay=0;
$k=0;
$log=0;
$yy=0;
$dis=0;
$tax=0;
$inno="#000".$_SESSION["invoic"];
try{
	$result11 = $db->prepare("SELECT * FROM sales  where InvoiceNo=:userid");
	$result11->bindParam(':userid', $inno);
	$result11->execute();

	for($i=0; $row11 = $result11->fetch(); $i++){
		$amount=$amount+ $row11['total'];
		
	}
	$result12 = $db->prepare("SELECT * FROM invoice  where InvoiceNo=:userid");
	$result12->bindParam(':userid', $inno);
	$result12->execute();

	for($i=0; $row12 = $result12->fetch(); $i++){
		
		$date=$row12['Date'];
		$py=$row12['Payid'];
		$dis=$row12['Discount'];
		$tax=$row12['tax'];
		

	}
	
	$log=$py+$pay;
	$amount=($amount+$tax)-$dis;
	if($log>$amount){
		$k=$amount;

	}else{

		$k=$py+$pay;
	}
	$ll=$amount-$py;
	if($pay>$ll){
		$yy=$ll;

	}else{

		  $yy=$pay; 
	}
	$date=date("Y-m-d");

$sql = "UPDATE invoice SET Amount = :a,Method = :b,No = :c,Payid = :d WHERE InvoiceNo =:id";
		$query = $db->prepare($sql);
        $query->bindValue(":a", $amount+$tax);
		$query->bindValue(":b", $mthd);
		 $query->bindValue(":c", $no);
		$query->bindValue(":d", $k);
        $query->bindValue(":id", $inno);
		$result = $query->execute();

		$sql = "INSERT INTO cashbook (Date,AccountTitle,Invoic,Type,Debit,Bank) VALUES (:a,:b,:Invoic,:c,:d,:bank)";
		$q = $db->prepare($sql);
		$q->execute(array(':a'=>$date,':b'=>$no,':Invoic'=>$inno,':c'=>$mthd,':d'=>$yy,':bank'=>$bank));
	} catch (Exception $e) {
    
       $ms=$e->getMessage();
		
	//echo'<script>window.location="error.php?pn=2&ms='.$ms.'";</script>';
	//echo '<a href="dashboard.php?id=4&ms=$ms">BACK</a>';
}	
		
		
		
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

@media print {  
    @page {  
      size:10cm 20cm; 
      margin-top: 2cm;
  	  margin-bottom: 2cm; 
  	 margin-left: 1cm; 
  	 margin-right: 1cm;
	
    } 

    h4 {
    	font-size: 8pt;
    }
   h3 {
    	font-size: 8pt;
    }
     p {
    	font-size: 8pt;
    }
}


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
<div class="container">
    <section class="content content_content" style="; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
								<center>
                                    <h4>ABC COMPANY</h4> 
									 <h4>No:150</h4>
									<h4>Bandarawela</h4> 
									<h4>Te:057 00000</h4> 
                                    <small >Date: <?php echo  date("Y/m/d"); ?></small>
                               </center>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            
                            <div class="col-sm-12 invoice-col">
                                To
								
							<?php 
							$cus='';
							$amount1=0;
							$no='';
							$inno="#000".$_SESSION["invoic"];
							$result = $db->prepare("SELECT * FROM invoice  where InvoiceNo=:userid");
							$result->bindParam(':userid', $inno);
							$result->execute();

							for($i=0; $row = $result->fetch(); $i++){
								$cus=$row['CustmerID'];
								$amount1=$row['Payid'];
								$no=$row['No'];
							}
							
							$result2 = $db->prepare("SELECT * FROM costumer  where COID=:userid");
							$result2->bindParam(':userid', $cus);
							$result2->execute();

							for($i=0; $row2 = $result2->fetch(); $i++){
							if(empty($row2['Name'])){
								?>
								 <strong><?php echo 'Cash'; ?></strong>
								<?php
								
								
							}else{
							
							
							?>
								
								
								
                                <address>
                                    <strong><?php echo $row2['Name']; ?></strong>
                                                                        
                                    <br>
                                   
                                   <?php echo $row2['Address']; ?>                                  <br>
                                    
                                   <?php echo $row2['phone2']; ?>                                  <br>
                                    Email:<?php echo $row2['Name']; ?>
								</address>
									
							<?php }} ?>
                            </div><!-- /.col -->
                            <div class="col-sm-12 invoice-col">
						
							<?php 
							$inno="#000".$_SESSION["invoic"];
							$result = $db->prepare("SELECT * FROM invoice  where InvoiceNo=:userid");
							$result->bindParam(':userid', $inno);
							$result->execute();

							for($i=0; $row = $result->fetch(); $i++){
							
							
							
							?>
                                
                                <br>
                                <h3>Invoice:</b> <?php echo $inno; ?></h3><br>
                                
								
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
										$total1=0;
                                       $inno='#000'.$_SESSION["invoic"];
										$result = $db->prepare("SELECT * FROM sales  where InvoiceNo=:userid");
										$result->bindParam(':userid', $inno);
										$result->execute();

										for($i=0; $row4 = $result->fetch(); $i++){
							
										$total=$total+$row4['total'];?>
							 
                                        
                                            <tr>
											<td><?php echo $row4['prid'] ; ?></td>
                                            <td ><?php echo formatMoney($row4['price'],true); ?></td>
                                            
                                            <td><?php echo $row4['quanaty']; ?></td>
                                            <td align="right"><?php echo formatMoney($row4['total'],true);  ?></td>
											</tr>
										<?php } ?>
                                                                            </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                               
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
										<?php
											$dis=0;
											$pi=0;
                                            $result1 = $db->prepare("SELECT * FROM invoice  where InvoiceNo=:userid");
											$result1->bindParam(':userid', $inno);
											$result1->execute();

											for($i=0; $row5 = $result1->fetch(); $i++){
											$total1=$row5['Amount'];
											$dis=$row5['Discount'];
											$pi=$row5['Payid'];
											}
							
                                            ?>
                                            <tr>
                                                <th>Net:</th>
                                                <td align="right"> <?php echo formatMoney($total,true); ?></td>
                                            </tr>
											<tr>
                                                <th>Tax:</th>
                                                <td align="right"> <?php echo formatMoney($tax,true); ?></td>
                                            </tr>
											<tr >
											<tr>
                                                <th>Total:</th>
                                                <td align="right"> <?php echo formatMoney($total+$tax,true);?></td>
                                            </tr>
											
											
											
											
                                                <th>Discount:</th>
                                                <td align="right"> <?php echo formatMoney($dis,true); ?></td>
                                            </tr>
											
											<tr>
                                                <th>Net Total</th>
                                                <td align="right"> <?php echo formatMoney(($total+$tax)-$dis,true); ?></td>
                                            </tr>
											
											<tr>
                                                <th>Paied</th>
                                                <td align="right"> <?php echo formatMoney($py,true); ?></td>
                                            </tr>
											<tr>
                                                <th>Cash Tendered:(<?php echo $no; ?>)</th>
                                                <td align="right"> <?php echo formatMoney($pay,true); ?></td>
                                            </tr>
											<tr>
                                                <th>Balance:</th>
                                                <?php
                                                $a=($total+$tax)-$dis-$py;
                                                $b=$pay+$pi-$py;
                                                ?>
                                                <td align="right"> <?php echo formatMoney($pay-$a,true); ?></td>
                                            </tr>
											
											
                                        </tbody>
                                    </table>
									<hr>
									<center>Thank You <br>
									Visit Again</center>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
<br>
<br>
                        <!-- this row will not appear when printing -->

<div id="cheq" style="width: 5cm;background-color:black; height: 10;">

</div>







                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="" id="printPageButton" class="btn btn-default" onclick="myFunction()"><i class="fa fa-print"></i> Print</a>
								<a href="cancel.php" id="printPageButton" class="btn btn-success pull-right""><i class="fa fa-print"></i> cancel</a>
								<a href="dashboard.php?id=2" id="printPageButton" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Back</a>
								<a href="welcome.php" id="printPageButton" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Finished</a>
                                <script>
									function myFunction() {
									window.print();
									}
								</script>
                            </div>
                        </div>
                    </section>
                </section>
				</div>
</body>
</html>