<?php 


?>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<div class="container">
<div class="mmm">
<a href="dashboard.php?id=8" class="btn btn-success" role="button">By Image</a>
<a href="dashboard.php?id=50" class="btn btn-success" role="button">By List</a>
<a href="dashboard.php?id=59" class="btn btn-success" role="button">By category</a>
</div>
<br>


<center><strong>
									

									<div class="mmm">
									<form class="form-inline" action="admin.php?id=2">
										<select id="lunch" name="users" class="selectpicker" data-live-search="true" onchange="showUser8(this.value)" title="Please select a  Product">
										<?php
										 
										$result = $db->prepare("SELECT * FROM product_cat ");
		
										$result->execute();

										for($i=0; $row = $result->fetch(); $i++){
												$pid=$row['prid'];
											?>
											<option value="<?php echo $row['Cat_Name']; ?>"><?php echo $row['Cat_Name']; ?></option>
										<?php } ?>
										</select>
										
										</form>
									</div>
 




</strong></center>


<div id="txtHint44">
<div class="content" id="content">
<table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th width=""> NO </th>
			<th width=""> Code </th>
			<th width=""> Product Name </th>
			<th width=""> Price </th>
			<th width=""> Discount Rate </th>
			<th width=""> Avalable Quantaty </th>
			
			
			<th width=""> Min Quanaty </th>
			<th width=""> Edit </th>
			
			
                   </thead>
    <tbody>
	<?php
			
	$ii=1;
	
				
				$result = $db->prepare("SELECT * FROM product  ORDER by prid DESC ");
				
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				//$cname=$row['CustmerID'];
				//$f=$row['InvoiceNo'];
				//$paid=$row['PaiedAmount'];
				//$gpaid=$gpaid+$paid;
				$ii++;
			?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
	<td><?php echo $i; ?></td>
    <td><?php echo $row['prid']; ?></td>
    <td><?php echo $row['Product_Name']; ?></td>
	
    <td align="right"><?php echo formatMoney($row['Price'],true); ?></td>
	 <td align="right"><?php echo $row['discount']; ?></td>
	 <td align="right"><?php echo $row['Quanaty']; ?></td>
	 
	  <td align="right"><?php echo $row['MinQun']; ?></td>
	  
	  
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $ii; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    
	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?php echo $ii; ?>" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															<h4 class="modal-title">Add Sales</h4>
														</div>
														<div class="modal-body">
														
														<form action="upload2.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Code: </label>

										<div class="col-sm-9">
											<!--<input type="text" name="code" onmouseover="this.focus();">-->
											<input type="text" id="form-field-1-1" name="code" placeholder="" class="form-control" value="<?php echo $row['prid']; ?>" required/>
											<input type="hidden" id="form-field-1-1" name="code1" placeholder="" class="form-control" value="<?php echo $row['prid']; ?>" required/>
										</div>
										
										
									</div>
									<br><br>
									<input type="hidden" id="form-field-1-1" name="ls" placeholder="" value="1" class="form-control" />
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="pname" placeholder="" value="<?php echo $row['Product_Name']; ?>" class="form-control" required/>
										</div>
										
										
									</div>
									
									<br><br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quanaty: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="Quen" value="<?php echo $row['Quanaty']; ?>" placeholder="" class="form-control" required/>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Discount: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="Dis" value="<?php echo $row['discount']; ?>" placeholder="" class="form-control" required/>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" value="<?php echo formatMoney($row['Price'],true); ?>" name="price" placeholder="" class="form-control" required/>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Catagries:</label>

										<div class="col-sm-3">
												<select class="form-control" Name="catid">
												
												<?php
											
												
												$result11 = $db->prepare("SELECT * FROM product_cat");
												$result11->bindParam(':userid', $res);
												$result11->execute();
												for($i=0; $row11 = $result11->fetch(); $i++){
												?>
												
												
												<option value="<?php echo $row5['CaId'];?>"><?php echo $row5['Cat_Name'];?></option>
												<?php
												}
												?>
												
												
												
												
												</select>
												
												<!--<p><a href="#myModal10" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></p> -->
												
												
												
												
												
												
												
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">types of measurement:</label>

										<div class="col-sm-3">
												<select class="form-control" Name="ms">
												<option>Unit</option>
												<option>Kg</option>
												<option>L</option>
												<option>m</option>
												</select>
												
												<!--<p><a href="#myModal10" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></p> -->
												
												
												
												
												
												
												
										</div>
									</div>
									<br><br>
									
									
									
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> පින්තුරය තෝරන්න<p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p> </label>
									
									
									<input type="file" name="file">
									
									</div>
									
									<br><br>
								
									
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
	
	
    
	
	</tr>
	
    
	
	
	
	
	
	
   
	
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
    </div> 
  </div>
	
	
	
				   <?php } ?>
 
    

    
    
 
    
    
 
    
   
    
   
    
    </tbody>
	
	
	
	
        
</table>








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