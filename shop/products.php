 
<?php 
include('connect.php');


?>
<div class="container">
<a href="dashboard.php?id=8" class="btn btn-success" role="button">By Image</a>
<a href="dashboard.php?id=50" class="btn btn-success" role="button">By List</a>

</div>
										<center>
									<form class="form-inline" action="admin.php?id=2">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser3(this.value)" title="Please select a  product">
										<?php
										 
										$result = $db->prepare("SELECT * FROM product ");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<option value="<?php echo $row['Product_Name']; ?>"><?php echo $row['Product_Name']; ?></option>
										<?php } ?>
										</select>
										
										</form>
										</center>
				
				<!--content-->
			<div class="content">
			
	<div class="women_main">
	<!-- start content -->

   <div class="w_content">
  
										
   
   
   
   <div class="">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
				
					<div class="cbp-vm-options">
						<a href="getuser3.php?id=1" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
						
					</div>
					
					<div id="txtHint">
					
					<ul>
					<?php 
					$result = $db->prepare("SELECT * FROM product");
							$result->bindParam(':userid', $res);
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++){
								$id=$row['prid'];
					
					
					
					?>
					
						<li>
						<div class="thumbnail" style="" >
							<a class="cbp-vm-image" href="#"><img src="uploads\<?php echo $row['Image'];?>" width="100px;"></a>
							<h3 class="cbp-vm-title"><?php echo $row['Product_Name']; ?></h3>
							<div class="cbp-vm-price">Rs:<?php echo $row['Price']; ?></div>
							<div class="cbp-vm-price">Quantaty:<?php echo $row['Quanaty']; ?></div>
							<div class="cbp-vm-details">
								
							</div>
							
						</div>
						</li>
							<?php } ?>
						
						
						
					</ul>
					</div>
				</div>
			</div><!-- /main -->
		</div><!-- /container -->
		
   
   
   
   
   
   
   
   
	
		
	</div>
   <div class="clearfix"></div>
	<!-- end content -->
	

</div>


			<!--content-->
	<script src="js/classie.js"></script>
		<script src="js/cbpViewModeSwitch.js"></script>	