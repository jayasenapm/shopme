
<div class="content">
<?php 
include('connect.php');
$total=0;

 ?>




  
  
    <div class="row" >
	
      <div class="col-lg-4 col-md-4 ">
      <div id="boxshadow" >
	  
		<h4>Bill No:<?php echo $_SESSION["bill"]; ?></h4>
        
		<?php 
		$result = $db->prepare("SELECT * FROM supplier WHERE SUID= :invice");
		$result->bindParam(':invice',$_SESSION["sup"]);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					?>
					Supplier  Name:<?php echo $row['Name']; ?></h4>
					<?php
				}
		
		
		?>
		
									<div class="search">
										<form action="addstock.php">
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
		$ii=0;
		$bill=$_SESSION["bill"];
		
		$result = $db->prepare("SELECT * FROM buy WHERE billNo= :invice");
		$result->bindParam(':invice',$bill);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					$in=$in+1;
					$total=$total+$row['Total'];
					$ii++;
					$bid=$row['BtransactioId'];
					?>
					<tr>
                
                <td><?php echo $row['prid']; ?></td>
				<td><a style="color:Black;" data-toggle="modal" data-target="#my<?php echo $ii ; ?>"><u><?php echo formatMoney( $row['Price'],true); ?></u></a></td>
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my<?php echo $ii ; ?>" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Price</h4>
														</div>
														<div class="modal-body">
														<form action="updateprice.php">
														<input class="form-control " name="pric" value="<?php echo $row['Price']; ?>" type="text" placeholder="">
														<input class="form-control " name="id" value="<?php echo $bid; ?>" type="hidden" placeholder="">
														<input class="form-control " name="price" value="<?php echo $row['Price'];; ?>" type="hidden" placeholder="">
														<input class="form-control " name="prid" value="<?php echo $row['prid'];; ?>" type="hidden" placeholder="">
														<input class="form-control " name="newqu" value="<?php echo $row['Quan']; ?>" type="hidden" placeholder="">
														<br>
														<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
														 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
														</form>
														
															
														</div>
														</div>
														</div>
													</div>
				
				
				
				<td><?php echo $row['Quan']; ?></td>
                <td><?php echo formatMoney( $row['Quan']*$row['Price'],true); ?></td>
				<td class="text-center"><a href="deletsales.php?bid=1&code=<?php echo $row['BtransactioId']; ?> "> <img src="img/delete.png" alt="Delete" style="width:20px;height:20px;"> 
		</a></td>
            </tr>
					
					<?php
					
				}
		?>
            
           
                
          
          
           
           <tr>
		   <td style="background-color:green;" colspan="3">Total</td>
            <td><?php echo formatMoney($total,true) ; ?></td>  
		   </tr>
		   <tr>
			<td style="background-color:green;" colspan="3">Tax(15%)</td>

			<?php 
				$tax=0;
				$dis=0;

				$result12 = $db->prepare("SELECT * FROM buil WHERE BilNo= :invice");
				$result12->bindParam(':invice',$bill);
				$result12->execute();

				for($i=0; $row12 = $result12->fetch(); $i++){
					$tax=$row12['tax'];
					$dis=$row12['Discount'];

				}



			?>

				<td><a style="color:Black;" data-toggle="modal" data-target="#my"><u><?php echo  formatMoney( $tax,true); ?></u></a></td>
            
							<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content" style="width:50%;">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Tax</h4>
														</div>
														<div class="modal-body">
														<form action="tax.php">
														<input class="form-control " name="tax" value="" type="text" placeholder="">
														<input class="form-control " name="bill" value="<?php echo $bill; ?>" type="hidden" placeholder="">
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
				


		   </tr>
		   <tr>
			<td style="background-color:green;"  colspan="3">Discount</td>
            <td><a style="color:Black;" data-toggle="modal" data-target="#mymenu"><u><?php echo formatMoney($dis,true) ; ?></u></a></td>
        </tr>


										<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mymenu" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content" style="width:50%;">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Discount</h4>
														</div>
														<div class="modal-body">
														<form action="taxdis.php">
														<input class="form-control " name="tax" value="" type="text" placeholder="">
														<input class="form-control " name="bill" value="<?php echo $bill; ?>" type="hidden" placeholder="">
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




				</tr>
				<tr>
			<td style="background-color:gray;"  colspan="3">Grade Total</td>
            <td><?php echo formatMoney($total+$tax-$dis,true); ?></td> 
		   </tr>

			</tbody>
    </table>
	<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Payment</button>
	
	<a href="clearbuy.php" button type="button" class="btn btn-primary btn-block">Clear</button></a>
	<a href="cancelbuy.php" button type="button" class="btn btn-primary btn-block">Cancel</button></a>
	
<!-- Modal -->
											<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Purchese</h4>
														</div>
														<div class="modal-body">
														
														
														
														
														
														
														<h2>Total Buy:<?php echo $total+$tax-$dis;  ?></h2>
														<?php
														$pd=0; 
														$result44 = $db->prepare("SELECT * FROM buil WHERE BilNo= :invice");
														$result44->bindParam(':invice',$bill);
														$result44->execute();

														for($i=0; $row44 = $result44->fetch(); $i++){
															$pd=$row44['Payid'];

														}




														?>

														<h2>Total Paied:<?php echo $pd;  ?></h2>
														<h2>To be Paied:<?php echo ($total+$tax-$dis)-$pd;  ?></h2>
														<?php 
														$s=$total-$pd;
														if($s<=0){
															?>
														<div class="col-sm-3">

														</div>

															<?php

														}else{
															?>
														<div class="col-sm-3">
														<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser5(this.value)" title="Please select a  Coustmer">
														<option>Cash</option>
														<option>cheque</option>
														<option>Credit Card</option>
														</select>
												
														</div>

															<?php
														}

														?>
														
															<br>
															<div id="txtHint55">
															
															</div>
														</div>
														</div>
														</div>
													</div>
	
      </div>
	  
      </div>
    

    <div class="col-md-8 col-xs-12 col-sm-12">
							
	 
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist" style="width:100%;">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Book </a></li>
                                        <!--
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Building Materials </a></li>
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Floors, Walls & Ceilings </a></li>
                                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Door & Window </a></li>
										-->
                                    </ul>
		
									<br>

									<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal23">Add Product</button>
									
		<div id="txtHint">

	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal23" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			<h4 class="modal-title">Add Product</h4>
			</div>
			<div class="modal-body">
														
			<form action="bulk.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
			<input type="hidden" name="inv" value="2">
				<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product : </label>

			<div class="col-sm-9">
											
										<select class="form-control" Name="catid">
												<option></option>
												<?php
											include('connect.php');
	
												$result = $db->prepare("SELECT * FROM product_cat");
												$result->bindParam(':userid', $res);
												$result->execute();
												for($i=0; $row = $result->fetch(); $i++){
												?>
												
												
												<option><?php echo $row['Cat_Name'];?></option>
												<?php
												}
												?>
												</select>
											
			</div>
										
										
									</div>
									<input type="hidden" id="form-field-1-1" name="ls" placeholder="" value="1" class="form-control" />
									
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quanaty: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="Quen" placeholder="" class="form-control" required/>
										</div>
									</div>
									
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="price" placeholder="" class="form-control" required/>
										</div>
									</div>
									
									
									<div class="form-group ">
										<label class="control-label col-sm-3 requiredField" for="date">
										</span></label>
										
										<div class="input-group">
										
											<input type="submit" class="btn btn-info" value="ADD">
											<button type="reset" class="btn btn-info" value="Reset">Reset</button>
									</div>
									</div>
									</form>
														</div>
														</div>
														</div>
													</div>
		<div class="tab-content" style=" width:100%; height: 400px; background-color:white; float:left; overflow-y:scroll;}">
                                        <div role="tabpanel" class="tab-pane active " id="home">
										<br>
										<form class="form-inline" action="admin.php?id=2">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser1(this.value)" title="Please select a  Coustmer">
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
										$result = $db->prepare("SELECT * FROM product ");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail" style="height:180px;">
											
											<center>
											<form method="post" action="addstock.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" class="" width="50px;" height="50px;""></div>
											<div style="height:90px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											<input type="text"  name="quantity" value="" style="width:50px;" size="1" required />
											<input type="submit" value="Add " class="btn btn-info btn-xs" />
											</form>
											</center>
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
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser1(this.value)" title="Please select a  Coustmer">
										
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
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product where caid=1");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail" style="height:180px;">
											<center>
											<form method="post" action="addstock.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" class="" width="50px;" height="50px;""></div>
											<div style="height:90px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											<input type="text"  name="quantity" value="" style="width:50px;" size="1" required />
											<input type="submit" value="Add " class="btn btn-info btn-xs" />
											</form>
											</center>
											</div>
											
											
											
											</div>
											
											
											<?php
					
	  
											}
	  
	  
											?>
										
										</div>
										
										</div>
										
										
										
                                        <div role="tabpanel" class="tab-pane" id="messages">
										
										<form class="form-inline" action="/action_page.php">
										<br>
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser1(this.value)" title="Please select a  Coustmer">
										
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
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail" style="height:180px;">
											<center>
											<form method="post" action="addstock.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" class="" width="50px;" height="50px;""></div>
											<div style="height:90px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											<input type="text"  name="quantity" value="" style="width:50px;" size="1" required />
											<input type="submit" value="Add " class="btn btn-info btn-xs" />
											</form>
											</center>
											</div>
											
											
											
											</div>
											
											
											<?php
					
	  
											}
	  
	  
											?>
										
										</div>
										
										</div>
										
                                        <div role="tabpanel" class="tab-pane" id="settings">
										
										
										<form class="form-inline" action="/action_page.php">
										<br>
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser1(this.value)" title="Please select a  Coustmer">
										
											<?php
										 
										$result = $db->prepare("SELECT * FROM product where caid=4");
		
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
										$result = $db->prepare("SELECT * FROM product where caid=4");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail">
											<center>
											<form method="post" action="addstock.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" class="img-responsive""></div>
											<div style="height:40px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											<div class="product-price">Rs:<?php echo $row['Price']; ?></div>
											<input type="text"  name="quantity" value="" style="width:50px;" size="1" required />
											<input type="submit" value="Add " class="btn btn-info btn-xs" />
											</form>
											</center>
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
  
