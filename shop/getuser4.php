<?php //session_start(); ?>
<?php 

include('connect.php');
$q = $_GET['q'];

$total=0;
$dis=0;
/*
				$invoice='#000'.$_SESSION["invoic"];
		
					$result = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :invice");
					$result->bindParam(':invice',$invoice);
					$result->execute();

					for($i=0; $row = $result->fetch(); $i++){

					$total=$total+$row['price']*$row['quanaty']*1.15;
					
					}
				
					$result2 = $db->prepare("SELECT * FROM invoice WHERE InvoiceNo= :invice");
					$result2->bindParam(':invice',$invoice);
					$result2->execute();

					for($i=0; $row2 = $result2->fetch(); $i++){

					$dis=$row2['Discount'];
					
					}

	*/			
?>


<div id="txtHint55">
		<br>
		<hr>
		<?php 
		if($q=='Cash' ){
			
			
			?>
		
			<form role="form" action="salInvoice.php">
															
			<div class="form-group">
			<label for="exampleInputEmail1">Paid:</label>
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="No" value="0">
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="bank" value="-">
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="tot" value="<?php echo $total-$dis ; ?>">
			<input type="text" class="form-control" id="exampleInputEmail3" name="pay" value="">
			</div>
                                               
                                                 
			<button type="submit" class="btn btn-primary">Save</button>
			<button type="button" class="btn btn-info primary-md" data-toggle="modal" data-target="#myModal">Cancel</button>
			</form>
		
		
		<?php } ?>
		
		<?php 
		if($q=='cheque' ){
			
			
			?>
		
		<form role="form" action="salInvoice.php">
				<div class="form-group">
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<label for="exampleInputEmail1">cheque No:</label>
													  
			<input type="text" class="form-control" id="exampleInputEmail3" name="No" value="" required>
			</div>	
			<div class="form-group">
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<label for="exampleInputEmail1">Bank Name:</label>
													  
			<input type="text" class="form-control" id="exampleInputEmail3" name="bank" value="" required>
			</div>	
			
			<div class="form-group">
			<label for="exampleInputEmail1">Paid:</label>
													  
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="tot" value="<?php echo $total-$dis ; ?>">
			<input type="text" class="form-control" id="exampleInputEmail3" name="pay" value="<?php echo $total-$dis ; ?>">
			</div>
                                               
                                                 
			<button type="submit" class="btn btn-primary">Save</button>
			</form>
		
		
		<?php } ?>
		
		<?php 
		if($q=='Credit Card' ){
			
			
			?>
		
		<form role="form" action="salInvoice.php">
				<div class="form-group">
				<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<label for="exampleInputEmail1">Credit Card No:</label>
													  
			<input type="text" class="form-control" id="exampleInputEmail3" name="No" value="" required>
			</div>											
			<div class="form-group">
			<label for="exampleInputEmail1">Paid:</label>
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="tot" value="<?php echo $total-$dis ; ?>">										  
			<input type="text" class="form-control" id="exampleInputEmail3" name="pay" value="<?php echo $total-$dis ; ?>">
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="bank" value="-" required>
			</div>
                                               
                                                 
			<button type="submit" class="btn btn-primary">Save</button>
			</form>
		
		
		<?php } ?>
		
		
		</div>

