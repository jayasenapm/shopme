

<?php
$s=0;
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
<div id="txtHint">
		
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
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<a href="#product_view<?php echo $s; ?>" data-toggle="modal" class="">
											<div class="thumbnail" style="height:100px;background-color:#669999;">
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<input type="hidden" name="kk" value="0" id="my-input" >
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>"  ​class="img-thumbnail" alt="Cinque Terre" width="50" height="50""></div>
											<div style="height:40px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											
											</form>
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
										<a href="dashboard.php?id=2" class="btn btn-info" role="button">Back</a>
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
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<a href="#product_view<?php echo $s; ?>" data-toggle="modal" class="">
											<div class="thumbnail" style="height:100px; background-color:#80dfff;">
											<center>
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>"  ​class="img-thumbnail" alt="Cinque Terre" width="50" height="50""></div>
											<div style="height:40px;"><strong><?php echo $row['Product_Name']; ?></strong></div>
											
											</form>
											</center>
											</div>
											</a>
											
											
											</div>
											
											<div class="modal fade product_view" id="product_view<?php echo $s; ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="width=50%;">
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
										<a href="dashboard.php?id=2" class="btn btn-info" role="button">Back</a>
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
												$s=$s+1;
											?>
											<div class="col-xs-4 col-sm-2 col-md-2 ">
											<a href="#product_view1<?php echo $s; ?>" data-toggle="modal" class="">
											<div class="thumbnail" style="height:180px;">
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
											</a>
											
											</div>
											
											<div class="modal fade product_view" id="product_view1<?php echo $s; ?>">
    <div class="modal-dialog" style="width=50%;">
        <div class="modal-content" >
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
											<form method="post" action="addselse.php?action=add&code=<?php echo $row['prid']; ?>">
											<input type="hidden" name="kk" value="0" id="my-input" >
											<div class="product-image"><img src="uploads\<?php echo $row['Image'];?>"  ​class="img-thumbnail" alt="Cinque Terre" width="50" height="50""></div>
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

