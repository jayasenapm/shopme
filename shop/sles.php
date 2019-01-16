



<div class="content">
<?php 
include('connect.php');
$total=0;
$tax=0;




 ?>




  
  
    <div class="row" >
	
      <div class="col-lg-4 col-md-4 ">
     
	  
		<h4>Invoice No:<?php echo "#000". $_SESSION["invoic"]; ?></h4>
        
		<?php 
		$result = $db->prepare("SELECT * FROM costumer WHERE COID= :invice");
		$result->bindParam(':invice',$_SESSION["cus"]);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					?>
					customer Name:<?php echo $row['Name']; ?></h4>
					<?php
				}
		
		
		?>
		<div class="search">
										<form  method="post" action="addselse.php">
											<!--<input type="text" name="code" onmouseover="this.focus();">-->
											<input type="text" name="code" id="my-input" autofocus="autofocus">
											
											<script>
												if (!("autofocus" in document.createElement("input"))) {
												document.getElementById("my-input").focus();
												}
											</script>
											
											<input type="hidden" name="quantity" value="1" id="my-input" >
											<input type="hidden" name="kk" value="1" id="my-input" >
											<input type="submit" value="">
										</form>
									</div>
		
		
        
		<table class="table table-scroll table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantaty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$in=0;
		$sid='';
		$ii=0;
		$s=0;
		$discount=0;
		$invoice='#000'.$_SESSION["invoic"];
		
		$result = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :invice");
		$result->bindParam(':invice',$invoice);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					$in=$in+1;
					$total=$total+$row['price']*$row['quanaty'];
					$sid=$row['TransactioId'];
					$ii++;
					$s++;
					?>
					<tr>
                
                <td><?php echo $row['prid']; ?></td>
				<td><a style="color:Black;" data-toggle="modal" data-target="#my<?php echo $s ; ?>"><u><?php echo formatMoney($row['price'],true); ?></u></a></td>
				
														<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my<?php echo $s ; ?>" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content" style="width:50%;">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Price</h4>
														</div>
														<div class="modal-body">
														<form action="updatesalesprice.php">
														<input class="form-control " name="pric" value="<?php echo $row['price']; ?>" type="text" placeholder="">
														<input class="form-control " name="id" value="<?php echo $sid; ?>" type="hidden" placeholder="">
														<input class="form-control " name="price" value="<?php echo $row['Price'];; ?>" type="hidden" placeholder="">
														<input class="form-control " name="prid" value="<?php echo $row['prid'];; ?>" type="hidden" placeholder="">
														<input class="form-control " name="newqu" value="<?php echo $row['quanaty']; ?>" type="hidden" placeholder="">
														<br>
														<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
														 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
														</form>
														
															
														</div>
														</div>
														</div>
													</div>
				
				
				
				
				
				
                <td align="center"><a style="color:Black;" data-toggle="modal" data-target="#mym<?php echo $ii ; ?>"><?php echo $row['quanaty']; ?></a></td>
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mym<?php echo $ii ; ?>" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content" style="width:50%;">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Quantaty</h4>
														</div>
														<div class="modal-body">
														<form action="updatequan.php">
														<input class="form-control " name="qun" value="1" type="text" placeholder="">
														<input class="form-control " name="id" value="<?php echo $sid; ?>" type="hidden" placeholder="">
														<input class="form-control " name="price" value="<?php echo $row['price'];; ?>" type="hidden" placeholder="">
														<input class="form-control " name="prid" value="<?php echo $row['prid'];; ?>" type="hidden" placeholder="">
														<input class="form-control " name="newqu" value="<?php echo $row['quanaty'];; ?>" type="hidden" placeholder="">
														<br>
														<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
														 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
														</form>
														
															
														</div>
														</div>
														</div>
													</div>
				
				
				
                <td><?php echo formatMoney($row['price']*$row['quanaty'],true); ?></td>
				<td class="text-center"><a href="deletsales.php?bid=0&code=<?php echo $row['TransactioId']; ?> "> <img src="img/delete.png" alt="Delete" style="width:20px;height:20px;"> 
		</a></td>
            </tr>
					
					<?php
					
				}
		?>
            
           
                
          
          
           
           <tr>
		   <td style="background-color:green;" colspan="3">Total</td>
            <td align="right"><?php echo formatMoney($total,true) ; ?></td>  
		   </tr>
		   
			
			<?php
			$paied=0;
			$result6 = $db->prepare("SELECT * FROM invoice WHERE InvoiceNo= :invice");
			$result6->bindParam(':invice',$invoice);
			$result6->execute();

				for($i=0; $row6 = $result6->fetch(); $i++){
					$discount=$row6['Discount'];
					$paied=$row6['Payid'];
					$tax=$row6['tax']
					?>

				<tr>
				<td style="background-color:green;" colspan="3">Tax(15%)</td>
	            <td align="right"><p style="color:Black;" data-toggle="modal" data-target="#tax"><?php echo formatMoney($tax,true); ?></p></td> 

										<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tax" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Tax</h4>
														</div>
														<div class="modal-body">
														<form action="addtax.php">
														<input class="form-control " name="tax" value="<?php echo $total*0.15; ?>" type="text" placeholder="">
														<input class="form-control " name="id" value="<?php echo $invoice; ?>" type="hidden" placeholder="">
														<br>
														<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
														 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
														</form>
														
															
														</div>
														</div>
														</div>
													</div>



			   </tr>
			   <tr>
				<td style="background-color:green;" colspan="3">Total</td>
	            <td align="right"><?php echo formatMoney($total+$tax,true) ; ?></td> 
				</tr>
				<tr>
					<td style="background-color:green;"  colspan="3">Discount</td>
			<td align="right"> <p style="color:Black;" data-toggle="modal" data-target="#discount"><?php echo formatMoney($row6['Discount'],true); ?></p></td><tr>
					<?php
				}
				?>
			
			
           
														<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="discount" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Discount</h4>
														</div>
														<div class="modal-body">
														<form action="adddiscount.php">
														<input class="form-control " name="discount" value="0" type="text" placeholder="">
														<input class="form-control " name="id" value="<?php echo $invoice; ?>" type="hidden" placeholder="">
														<br>
														<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
														 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
														</form>
														
															
														</div>
														</div>
														</div>
													</div>
				</tr>
				<tr>
			<td style="background-color:gray;"  colspan="3">Grade Total</td>
            <td align="right"><?php echo formatMoney($total+$tax-$discount,true); ?></td> 
		   </tr>		   
			</tbody>
    </table>
	<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Payment</button>
	
	<a href="clear.php" button type="button" class="btn btn-primary btn-block">Clear</button></a>
	<a href="cancel.php" button type="button" class="btn btn-primary btn-block">Cancel</button></a>
	
	
	<!-- Modal -->
											<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content" style="width:70%;">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Payment</h4>
														</div>
														<div class="modal-body">
														
														
														
														
														
														
														<h3>Total Sales:<?php echo formatMoney($total+$tax-$discount,true);  ?></h3>
														<h3>Total Paied:<?php echo formatMoney($paied,true);  ?></h3>
														<hr>
														<h3>To be Paied:<?php echo formatMoney(($total+$tax-$discount)-$paied,true);  ?></h3>	
														
														
														<div class="col-sm-3">
														<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser4(this.value)" title="Please select a  Coustmer">
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
												
	
      
	  
      </div>
    

    <div class="col-md-8 col-xs-12 col-sm-12">
	
							
	 
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" style="background-color:  #1dcdec  !important;" role="tablist" style="width:100%;">
                                        <li role="presentation" class="active"><a style="
											color:black;" href="#home" aria-controls="home" role="tab" data-toggle="tab">Book </a></li>
										<!--	
                                        <li role="presentation"><a style="
											color:black;" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Stationery Items </a></li>
                                        <li role="presentation"><a style="
											color:black;" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Computer Items  </a></li>
                                        <li role="presentation"><a style="
											color:black;" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Printing Items </a></li>
										-->
                                    </ul>
		<br>

					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal23">Add Product</button>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal23" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Product</h4>
														</div>
														<div class="modal-body">
														
														<form action="upload.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
															<input type="hidden" name="inv" value="1">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Code/ISBN Number: </label>

										<div class="col-sm-9">
											<!--<input type="text" name="code" onmouseover="this.focus();">-->
											<input type="text" id="form-field-1-1" name="code" placeholder="" class="form-control" onmouseover="this.focus();" required/>
											
										</div>
										
										
									</div>
									<input type="hidden" id="form-field-1-1" name="ls" placeholder="" value="1" class="form-control" />
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="pname" placeholder="" class="form-control" required/>
										</div>
										
										
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quanaty: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="Quen" placeholder="" class="form-control" required/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Discount: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="Dis" placeholder="" class="form-control" required/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="price" placeholder="" class="form-control" required/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Catagries:</label>

										<div class="col-sm-3">
												<select class="form-control" Name="catid">
												<option></option>
												<?php
											include('connect.php');
	
												$result = $db->prepare("SELECT * FROM product_cat");
												$result->bindParam(':userid', $res);
												$result->execute();
												for($i=0; $row = $result->fetch(); $i++){
												?>
												
												
												<option value="<?php echo $row['CaId'];?>"><?php echo $row['Cat_Name'];?></option>
												<?php
												}
												?>
												</select>
												
												<!--<p><a href="#myModal10" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></p> -->
												
												
												
												
												
												
												
										</div>
									</div>
									<input type="hidden" name="ms" value="unit">
									
									
									
									
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> පින්තුරය තෝරන්න<p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p> </label>
									
									
									<input type="file" name="file">
									
									</div>
									
									
								
									
									<div class="form-group ">
										<label class="control-label col-sm-3 requiredField" for="date">
										</span></label>
										
										<div class="input-group">
										
											<input type="submit" class="btn btn-info" value="Submit Button">
											<button type="reset" class="btn btn-info" value="Reset">Reset</button>
									</div>
									</div>
									</form>
														</div>
														</div>
														</div>
													</div>


					
									
		<div id="txtHint">
		
		<div class="tab-content" style=" width:100%; height: 400px; background-color:white; float:left; overflow-y:scroll;}">
                                        <div role="tabpanel" class="tab-pane active " id="home">
										<br>
										<form class="form-inline" action="admin.php?id=2">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser(this.value)" title="Please select a  Coustmer">
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
										
										<hr>
										<div class="row">
										
										<?php
										 include('connect.php');
										 $s=0;
										$result = $db->prepare("SELECT * FROM product");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<a href="#product_view<?php echo $s; ?>" data-toggle="modal" class="">
											<div class="thumbnail" style="height:100px; background-color:#669999;" >
											<center>
											
											<?php 
											if($row['Image']==''){
												
											}else{
											
											?>
											
											<?php } ?>
											<div style="height:50px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											
											
											
											</center>
											</div>
											</a>
											
											
											</div>
											
											
								
								
								<div class="modal fade product_view" id="product_view<?php echo $s; ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="width:50%;">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Product Name: <?php echo $row['Product_Name']; ?> </h3>
            </div>
            <div class="modal-body">
                <div class="row">
				
				<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
				<input type="hidden" name="kk" value="0" id="my-input" >
                    <div class="col-md-12 product_img">
                        <img src="uploads\<?php echo $row['Image'];?>" class="img-responsive">
                   
                        <h4>Product Id: <span><?php echo $row['prid']; ?></span></h4>
                       
                        <p></p>
                        <h3 class="cost"><span class="glyphicon glyphicon-Rs"></span> Rs <?php echo $row['Price']; ?> </h3>
                        <div class="row">
                            
                            
                            <div class="col-md-6 col-sm-12">
                                
								Quantaty <?php echo $row['scale']; ?>:<input type="text" class="form-control" id="exampleInputEmail3" name="quantity" value="" required>
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                            
                        </div>
						
                    </div>
					</form>
					
					
                </div>
				
				
            </div>
        </div>
    </div>
</div>
											<?php
					
	  
											}
	  
	  
											?>
										
										
										
										</div>
										
										</div>
								
      
                                        <div role="tabpanel" class="tab-pane " id="profile">
										
										<form class="form-inline" action="/action_page.php">
										<br>
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser(this.value)" title="Please select a  Coustmer">
										
											<?php
										 
										$result = $db->prepare("SELECT * FROM product where caid=1");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												
											?>
											<option value="<?php echo $row['Product_Name']; ?>"><?php echo $row['Product_Name']; ?></option>
										<?php } ?>
										</select>
										</form>
										
										<hr>
										<div class="row">
										
										
										
										<?php
										
										$result = $db->prepare("SELECT * FROM product where caid=1");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<a href="#product_view<?php echo $s; ?>" data-toggle="modal" class="">
											<div class="thumbnail" style="height:100px; background-color:#ff80bf;">
											<center>
											
											<!--<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>"  ​class="img-thumbnail" alt="Cinque Terre" width="50" height="50""></div>-->
											<div style="height:40px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											
											</center>
											</div>
											</a>
											
											
											
											</div>
											
											<div class="modal fade product_view" id="product_view<?php echo $s; ?>">
    <div class="modal-dialog" >
        <div class="modal-content" style="width:50%;">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Product Name: <?php echo $row['Product_Name']; ?> </h3>
            </div>
            <div class="modal-body">
                <div class="row">
				
				<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
				<input type="hidden" name="kk" value="0" id="my-input" >
                    <div class="col-md-12 product_img">
                        <img src="uploads\<?php echo $row['Image'];?>" class="img-responsive">
                   
                        <h4>Product Id: <span><?php echo $row['prid']; ?></span></h4>
                        
                        <p></p>
                        <h3 class="cost"><span class="glyphicon glyphicon-Rs"></span> Rs <?php echo $row['Price']; ?> </h3>
                        <div class="row">
                            
                            
                            <div class="col-md-6 col-sm-12">
                                
								Quantaty <?php echo $row['scale']; ?>:<input type="text" class="form-control" id="exampleInputEmail3" name="quantity" value="" required>
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                            
                        </div>
						
                    </div>
					</form>
					
					
                </div>
				
				
            </div>
        </div>
    </div>
</div>
											
											
											
											
											
											
											<?php
					
	  
											}
	  
	  
											?>
										
										</div>
										
										</div>
										
										
										
                                        <div role="tabpanel" class="tab-pane" id="messages">
										<br>
										<form class="form-inline" action="/action_page.php">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser(this.value)" title="Please select a  Coustmer">
										
											<?php
										 
										$result = $db->prepare("SELECT * FROM product where caid=2");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												
											?>
											<option value="<?php echo $row['Product_Name']; ?>"><?php echo $row['Product_Name']; ?></option>
										<?php } ?>
										</select>
										
										</form>
										
										<hr>
										<div class="row">
										
										
										
										<?php
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product where caid=2");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<a href="#product_view<?php echo $s; ?>" data-toggle="modal" class="">
											<div class="thumbnail" style="height:100px; background-color:#80dfff;">
											<center>
											
											<!--<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>"  ​class="img-thumbnail" alt="Cinque Terre" width="50" height="50""></div>-->
											<div style="height:40px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											
											</center>
											</div>
											</a>
											
											
											
											</div>
											
																					
											<div class="modal fade product_view" id="product_view<?php echo $s; ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="width:50%;">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Product Name: <?php echo $row['Product_Name']; ?> </h3>
            </div>
            <div class="modal-body">
                <div class="row">
				
				<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
				<input type="hidden" name="kk" value="0" id="my-input" >
                    <div class="col-md-12 product_img">
                        <img src="uploads\<?php echo $row['Image'];?>" class="img-responsive">
                    
                        <p></p>
                        <h3 class="cost"><span class="glyphicon glyphicon-Rs"></span> Rs <?php echo $row['Price']; ?> </h3>
                        <div class="row">
                            
                            
                            <div class="col-md-6 col-sm-12">
                                
								Quantaty <?php echo $row['scale']; ?>:<input type="text" class="form-control" id="exampleInputEmail3" name="quantity" value="" required>
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                            
                        </div>
						
                    </div>
					</form>
					
					
                </div>
				
				
            </div>
        </div>
    </div>
</div>
											<?php
					
	  
											}
	  
	  
											?>
										
										</div>
										
										</div>
										
                                        <div role="tabpanel" class="tab-pane" id="settings">
										
										<br>
										<form class="form-inline" action="/action_page.php">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser(this.value)" title="Please select a  Coustmer">
										
											<?php
										 
										$result = $db->prepare("SELECT * FROM product where caid=3");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												
											?>
											<option value="<?php echo $row['Product_Name']; ?>"><?php echo $row['Product_Name']; ?></option>
										<?php } ?>
										</select>
										<button type="submit" class="btn btn-default">Submit</button>
										</form>
										
										<hr>
										<div class="row">
										
										
										
										<?php
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product where caid=3");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 " style="height:180px;">
											<div class="thumbnail">
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>"  ​class="img-thumbnail" alt="Cinque Terre" width="50" height="50""></div>
											<div style="height:40px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											<div class="product-price">Rs:<?php echo $row['Price']; ?></div>
											<input type="text"  name="quantity" value="" style="width:50px;" size="1" required />
											<input type="submit" value="Add " class="btn btn-info btn-xs" />
											</form>
											</center>
											</div>
											
											
											
											</div>
											
																					
											<div class="modal fade product_view" id="product_view<?php echo $s; ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="width:50%;">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Product Name: <?php echo $row['Product_Name']; ?> </h3>
            </div>
            <div class="modal-body">
                <div class="row">
				
				<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
				<input type="hidden" name="kk" value="0" id="my-input" >
                    <div class="col-md-12 product_img">
                        <img src="uploads\<?php echo $row['Image'];?>" class="img-responsive">
                    
                        <p></p>
                        <h3 class="cost"><span class="glyphicon glyphicon-Rs"></span> Rs <?php echo $row['Price']; ?> </h3>
                        <div class="row">
                            
                            
                            <div class="col-md-6 col-sm-12">
                                
								Quantaty <?php echo $row['scale']; ?>:<input type="text" class="form-control" id="exampleInputEmail3" name="quantity" value="" required>
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                            
                        </div>
						
                    </div>
					</form>
					
					
                </div>
				
				
            </div>
        </div>
    </div>
</div>
											
											
											
											<?php
					
	  
											}
	  
	  
											?>
										
										</div>
										
										</div>
										</div>
                                    </div>
		
		
		</div>							
									
									
                                    <!-- Tab panes -->
                                    
</div>
                                
     
    </div>
 





	 
    </div>
  


