<?php
include('connect.php');
$q = $_GET['q'];
$result = $db->prepare("SELECT * FROM product WHERE Product_Name = '".$q."'");
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
	$cid=$row['CaId'];
}
$age;
$wi;
$product;



?>
<div id="txtHint222">
		
		<div class="tab-content" style=" width:100%; height: 500px; background-color:white; float:left; overflow-y:scroll;}">
                                        <div role="tabpanel" class="tab-pane 
										
										<?php if($cid==1){
											echo "active";
											} 
											
											?>
										id="home">
									
										
										
										
										<hr>
										<div class="row">
										
										<?php
										 
										$result = $db->prepare("SELECT * FROM product WHERE CaId = '1' AND Product_Name = '".$q."'");
		
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
										<a href="dashboard.php?id=5" class="btn btn-info" role="button">Back</a>
										</div>
								
      
                                        <div role="tabpanel" class="tab-pane 
										
										<?php if($cid==2){
											echo "active";
											} 
											?>
											 id="profile">
										
										<hr>
										<div class="row">
										
										
										<?php
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product WHERE CaId = '2' AND Product_Name = '".$q."'");
		
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
										<a href="dashboard.php?id=5" class="btn btn-info" role="button">Back</a>
										</div>
										
										
										</div>
                                        <div role="tabpanel" class="tab-pane" id="messages">
										<div role="tabpanel" class="tab-pane active" id="home">
										
										
										<hr>
										<div class="row">
										
										
										
										<?php
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product  WHERE CaId = '3' AND Product_Name = '".$q."'");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail" style="height:180px;">
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
                                        <div role="tabpanel" class="tab-pane" id="settings">
										
										<div role="tabpanel" class="tab-pane active" id="home">
										
										
										<hr>
										<div class="row">
										
										
										
										<?php
										 include('connect.php');
										$result = $db->prepare("SELECT * FROM product  WHERE CaId = '4' AND Product_Name = '".$q."'");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<div class="thumbnail" style="height:180px;">
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

