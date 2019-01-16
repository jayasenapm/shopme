<?php 
session_start();
include('connect.php');
$q = $_GET['q'];
$total=0;
$bil=0;
$dis=0;
$tax=0;
		$bill=$_SESSION["bill"];
		
		$result = $db->prepare("SELECT * FROM buy WHERE billNo= :invice");
		$result->bindParam(':invice',$bill);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					
					$total=$total+$row['Total'];
				}

		$result = $db->prepare("SELECT * FROM buil WHERE BilNo= :invice");
		$result->bindParam(':invice',$bill);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					
					$bil=$bil+$row['Payid'];
					$dis=$dis+$row['Discount'];
					$tax=$row['tax'];
				}



					
?>


<div id="txtHint55">
		<br>
		<hr>
		<?php 
		if($q=='Cash' ){
			
			
			?>
		
			<form role="form" action="Bill.php">
															
			<div class="form-group">
			<label for="exampleInputEmail1">Paid:</label>
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="No" value="0">
			
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="tot2" value="<?php echo $total ; ?>">
			<input type="text" class="form-control" id="exampleInputEmail3" name="tot" value="<?php echo $total+$tax-$dis-$bil ; ?>">
			</div>
                                               
                                                 
			<button type="submit" class="btn btn-primary">Save</button>
			<button type="button" class="btn btn-info primary-md" data-toggle="modal" data-target="#myModal">Cancel</button>
			</form>
		
		
		<?php } ?>
		
		<?php 
		if($q=='cheque' ){
			
			
			?>
		
		<form role="form" action="Bill.php">
				<div class="form-group">
			<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<label for="exampleInputEmail1">cheque No:</label>
											  
			<input type="text" class="form-control" id="exampleInputEmail3" name="No" value="" required>
			</div>											
			<div class="form-group">
			<label for="exampleInputEmail1">Paid:</label>
													  
			<input type="text" class="form-control" id="exampleInputEmail3" name="tot" value="<?php echo $total-$dis-$bil  ; ?>">
			</div>
                                               
                                                 
			<button type="submit" class="btn btn-primary">Save</button>
			</form>
		
		
		<?php } ?>
		
		<?php 
		if($q=='Credit Card' ){
			
			
			?>
		
		<form role="form" action="Bill.php">
				<div class="form-group">
				<input type="hidden" class="form-control" id="exampleInputEmail3" name="mth" value="<?php echo $q; ?>">	
			<label for="exampleInputEmail1">Credit Card No:</label>
													  
			<input type="text" class="form-control" id="exampleInputEmail3" name="No" value="" required>
			</div>											
			<div class="form-group">
			<label for="exampleInputEmail1">Paid:</label>
													  
			<input type="text" class="form-control" id="exampleInputEmail3" name="tot" value="<?php echo $total-$dis-$bil  ; ?>">
			</div>
                                               
                                                 
			<button type="submit" class="btn btn-primary">Save</button>
			</form>
		
		
		<?php } ?>
		
		
		</div>

