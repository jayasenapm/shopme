<?php 


?>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<div class="container">
<div class="mmm">
<a href="dashboard.php?id=3&d1=&d2=" class="btn btn-success" role="button">By Invoice</a>
<a href="dashboard.php?id=32&d1=&d2=" class="btn btn-success" role="button">By Items</a>
</div>


</div>
<br>
<div class="mmm">
<form action="dashboard.php?id=3" method="get">

 
<center><strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <input type="hidden" style="width: 223px; padding:14px;" name="id" class="tcal" value="3" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
</div>
<?php 
if(!isset($_GET['d1'])){
	?>
	<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">

	Sales Report from&nbsp;<?php echo  date("Y-m-d", strtotime($_GET['d1'])) ?>&nbsp;to&nbsp;<?php echo  date("Y-m-d", strtotime($_GET['d2'])) ?>
	</div>
<?php	
}

?>

<div class="content" id="content">





          
          

             <div class="col-lg-12">
        	<div class="panel panel-default"  ">
            <div class="panel-heading" ><h3>Sales Report </h3></div>
            <div class="panel-body">
<table class="table table-condensed" style="border-collapse:collapse;">

  	<thead>

			<th width="16%">  </th>
                   <th width="16%"> Invoice Number </th>
			<th width="13%"> Transaction Date </th>
			<th width="20%"> Customer Name </th>
			<th width="18%"> Amount </th>
			<th width="18%"> Tax </th>
			<th width="18%"> Discount </th>
			<th width="13%"> Paied </th>
			<th width="13%"> Balance </th>
			<th width="13%">Status </th>
			<div class="mmm">
			<th width="13%"> Edit </th>
			<!--<th width="13%"> Payment</th>-->
			<th width="13%"> Delete </th>
			</div>
			
       </thead>

    <tbody>
	<?php 
				$gtotal2=0;
				$gtotal=0;
				$gpaid=0;
				$dat;
				$ii=0;
				$nn=0;
				$dis=0;
				$pid=0;
				$tax=0;
				include('connect.php');

				$d1=$_GET['d1'];
				
				if($d1==0){
					$result = $db->prepare("SELECT * FROM invoice  ORDER by Date DESC ");
					
				}else{
				
				$d1 = date("Y-m-d", strtotime($d1));
				$d2=$_GET['d2'];
				$d2 = date("Y-m-d", strtotime($d2));
				$result = $db->prepare("SELECT * FROM invoice WHERE Date BETWEEN :a AND :b ORDER by Date DESC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				}
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$cname=$row['CustmerID'];
				$f=$row['InvoiceNo'];
				//$paid=$row['PaiedAmount'];
				//$gpaid=$gpaid+$paid;
				$dat=$row['Date'];
				$gtotal=$gtotal+$row['Amount'];
				
				$gpaid=$gpaid+$row['Payid'];
				$dis=$dis+$row['Discount'];
				$pid=$pid+$row['Payid'];
				$tax=$tax+$row['tax'];
				$sn=$f;
				$ii=$ii+1;
				$nn++;

			
			?>

        <tr data-toggle="collapse" data-target="#demo1<?php echo $nn; ?>" class="accordion-toggle">
          <div class="mmm"><td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td></div>
            

          <td><?php echo $row['InvoiceNo']; ?></td>

		  

<td><?php echo $row['Date']; ?></td>
	
	<?php 
	$balance=0;
	if ($row['CustmerID']==0) {
			?>
			<td><?php echo 'cash'; ?></td>
			<?php
		}else{
	$result5 = $db->prepare("SELECT * FROM costumer WHERE COID= :invice");
	$result5->bindParam(':invice',$row['CustmerID']);
	$result5->execute();

	for($i=0; $row5 = $result5->fetch(); $i++){
		$balance=($row['Amount']-$row['Discount'])- $row['Payid'];
	?>
		<td><?php echo $row5['Name']; ?></td>

	<?php	
		}
	}
	?>
	<td >
		<?php 
	$lamount=0;
	$result51 = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :invice");
	$result51->bindParam(':invice',$row['InvoiceNo']);
	$result51->execute();

	for($i=0; $row51 = $result51->fetch(); $i++){

		$lamount=$lamount+$row51['total'];

	}
		echo formatMoney($lamount,true); 

		?>

	</td>
	<td><?php echo formatMoney($row['tax'],true) ; ?></td>
	<td><?php echo formatMoney($row['Discount'],true) ; ?></td>
    <td><?php echo formatMoney($row['Payid'],true); ?></td>
	 <td><?php echo formatMoney((($lamount+$row['tax'])-$row['Discount'])- $row['Payid'],true); ?></td>
	 
	 <td>
	 <?php 
		$balance= ($lamount*1.15)-$row['Discount']- $row['Payid'];
	 if($balance>0){
		 ?>
		<span style="color: #C70039;" class="glyphicon glyphicon-remove"></span>
		 <?php
		 
	 }else{
		 
		  ?>
		<span style="color: green;" class="glyphicon glyphicon-ok"></span></td> 
		 <?php
	 }


	?>
	
<div class="mmm"><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $ii; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td></div>
    
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?php echo $ii; ?>" class="modal fade">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Invoice</h4>
      </div>
          <div class="modal-body">
		 
        
         
       <form action="ss.php">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to edit this invoice?</div>
       
	    <input class="form-control " name="id" value="<?php echo $row['InvoiceNo']; ?>" type="hidden" placeholder="">
	   <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </form>
	  
	
      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
	
	
	
	<!--
	
	<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#pay2<?php echo $nn; ?>" ><span class="glyphicon glyphicon-credit-card"></span></button></p></td>-->
	
	
											<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pay2<?php echo $nn; ?>" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content" style="width:70%;">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Payment</h4>
														</div>
														<div class="modal-body">
														
													
														<div class="col-sm-3">
														<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser41(this.value)" title="Please select a  Coustmer">
														<option>Cash</option>
														<option>cheque</option>
														<option>Credit Card</option>
														</select>
												
														</div>
															<br>
															
																
																	<div id="txtHint55">
																		

																	</div>	
																	

																
															
														</div>
														</div>
														</div>
													</div>
												
	
	
	
	
	
	<div class="mmm"><td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?php echo $i ; ?>" ><span class="glyphicon glyphicon-trash"></span></button></p></td></div>
    
	
	
	
	
	<div class="modal fade" id="delete<?php echo $i ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form action="nn.php">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       <input class="form-control " name="id" value="<?php echo $row['InvoiceNo']; ?>" type="hidden" placeholder="">
	   <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </form>
	  </div>
        <div class="modal-footer ">
        
      </div>
        </div>
    <!-- /.modal-cont
      <!-- /.modal-dialog --> 
    </div>ent --> 
  </div>
	

        </tr>

        

		
            <td colspan="12" class="hiddenRow"><div class="accordian-body collapse" id="demo1<?php echo $nn; ?>"> 
              <table class="table table-striped">
                      <thead>
                        <tr><td>Product Name</td><td>Quantaty</td><td>Amount</td><td>Reject</td></tr>
                        
                      </thead>
                      <tbody>

                      	<?php 
                      		
          					$result15 = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :invice");
							$result15->bindParam(':invice',$row['InvoiceNo']);
							$result15->execute();

							for($i=0; $row15 = $result15->fetch(); $i++){

							$gtotal2=$gtotal2+$row15['total'];

							?>
                        <tr>
                        	<form action="nnkk.php">
                        	<td><?php echo $row15['prid']; ?></td>
							<input class="form-control " name="invice" value="<?php echo $row15['TransactioId']; ?>" type="hidden" placeholder="">
							<input class="form-control " name="inv" value="<?php echo $row15['InvoiceNo']; ?>" type="hidden" placeholder="">
							<input class="form-control " name="q" value="<?php echo $row15['quanaty']; ?>" type="hidden" placeholder="">
							<input class="form-control " name="prid" value="<?php echo $row15['prid']; ?>" type="hidden" placeholder="">
							<input class="form-control " name="price" value="<?php echo $row15['price']; ?>" type="hidden" placeholder="">
                        	<td width="10%"><input class="form-control " name="quanaty" value="<?php echo $row15['quanaty']; ?>" type="text" placeholder=""></td>
                        	<td><?php echo $row15['price']; ?></td>
                        	<td>
                        	<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-cog"></i></button>
                        </td>
                  			</form>
              			</tr>
                        
                     		<?php } ?>
                    
                      </tbody>
               	</table>
              
              </div> </td>
        



		

        

        <?php } ?>
        
    
    </tbody>

<thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				
				/*$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$d1 = date("Y-m-d", strtotime($d1));
				$d2 = date("Y-m-d", strtotime($d2));
				$results4 = $db->prepare("SELECT sum(amount) FROM sales_order WHERE date BETWEEN :a AND :b");
				$results4->bindParam(':a', $d1);
				$results4->bindParam(':b', $d2);
				$results4->execute();
				for($i=0; $rows = $results4->fetch(); $i++){
				//$dsdsd=$rows['sum(amount)'];
				
				}*/
				echo formatMoney($gtotal2,true);
				?>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($tax,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($dis,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($pid,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney(($gtotal2+$tax-$dis)-$pid,true); ?></th>
		</tr>
	</thead>




</table>
            </div>
        
          </div> 
        
      </div>
       






</div><br>
<br>
		<div class="clearfix"></div>

               <div class="mmm">
               	<div class="pull-right" style="margin-right:100px;">
                            <div class="col-xs-12">
                                <a href="" id="printPageButton" class="btn btn-success btn-large" onclick="myFunction()"><i class="fa fa-print"></i> Print</a>
               
                                <script>
                  function myFunction() {
                  window.print();
                  }
                </script>
                            </div>
                        </div>
                        </div>  