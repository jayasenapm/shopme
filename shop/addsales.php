<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							  Add New Customer 
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt">
									<div class="container">
								<div class="row">
										<div class="col-md-8 col-sm-12">
	<?php 


include('connect.php');
$total=0;

 ?>



<section>
  
  
    <div class="row" >
	
      <div class="col-lg-4 col-md-4 ">
      <div id="boxshadow">
	  
		<h4>Invoice No:<?php echo "#000". $_SESSION["invoic"]; ?></h4>
        <h4>customer Name:<?php echo $_SESSION["cus"]; ?></h4>
        
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
		$invoice='#000'.$_SESSION["invoic"];
		include('connect.php');
		$result = $db->prepare("SELECT * FROM sales WHERE InvoiceNo= :invice");
		$result->bindParam(':invice',$invoice);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					$in=$in+1;
					$total=$total+$row['total']*$row['quanaty'];
					?>
					<tr>
                
                <td><?php echo $row['prid']; ?></td>
				<td><?php echo $row['total']; ?></td>
                <td><?php echo $row['quanaty']; ?></td>
                <td><?php echo $row['total']*$row['quanaty']; ?></td>
				<td class="text-center"><a href="deletsales.php?code=<?php echo $row['TransactioId']; ?> "> <img src="img/delete.png" alt="Delete" style="width:20px;height:20px;"> 
		</a></td>
            </tr>
					
					<?php
					
				}
		?>
            
           
                
          
          
           
           <tr>
		   <td style="background-color:green;" colspan="3">Total</td>
            <td><?php echo $total; ?></td>  
		   </tr>
			<td style="background-color:green;" colspan="3">Tax(15%)</td>
            <td><?php echo $total*.15; ?></td>  
		   </tr>
			<td style="background-color:green;"  colspan="3">Discount</td>
            <td>000</td>
				</tr>
				<tr>
			<td style="background-color:gray;"  colspan="3">Grade Total</td>
            <td><?php echo $total+($total*.15); ?></td> 
		   </tr>		   
			</tbody>
    </table>

	<a href="salInvoice.php" button type="button" class="btn btn-primary btn-block">Payment</button></a>
	<button type="button" class="btn btn-primary btn-block">Clear</button>
	<button type="button" class="btn btn-primary btn-block">Cancel</button>
	

	
      </div>
	  
      </div>
    
 

    <div class="col-md-8 col-xs-12 col-sm-12">
							
	 
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist" style="width:100%;">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Building Materials </a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Door & Window </a></li>
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Floors, Walls & Ceilings </a></li>
                                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Handtrucks </a></li>
										
                                    </ul>
		

									
									
		<div id="txtHint">
		
		<div class="tab-content" style=" width:100%; height: 500px; background-color:white; float:left; overflow-y:scroll;}">
                                        <div role="tabpanel" class="tab-pane active " id="home">
										<form class="form-inline" action="admin.php?id=2">
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
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product where caid=1");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail" >
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" width="80px""></div>
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
								
      
                                        <div role="tabpanel" class="tab-pane " id="profile">
										
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
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail">
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" width="80px""></div>
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
										
										
										
                                        <div role="tabpanel" class="tab-pane" id="messages">
										
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
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail">
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" width="80px""></div>
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
										
                                        <div role="tabpanel" class="tab-pane" id="settings">
										
										
										<form class="form-inline" action="/action_page.php">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser(this.value)" title="Please select a  Coustmer">
										
											<?php
										 
										$result = $db->prepare("SELECT * FROM product where caid=4");
		
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
										$result = $db->prepare("SELECT * FROM product where caid=4");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail">
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>" width="80px""></div>
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
  
</section>
	
										</div>
	
     
								<div class="col-md-1 hidden-xs divider"></div>

								</div>
								</div>
								
								</div>
								</div>
								<!-- status -->
							</div>
						</div>
					</div>
			
						<!--//area-->
							
						
						<div class="clearfix"></div>
						
					
		<!--area-->					
				
						<!--//area-->
		
			</div>