



	
	
<div class="content">
<div class="monthly-grid"style="  border-style: solid;
    border-color: red;
	 border-radius: 25px;">
						<div class="panel panel-widget">
							<div class="panel-title">
							  Add New Book 
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt">
									
	<div class="col-md-12 col-sm-12">					
					
					
					
					
					
					
					
							
							
							<form action="upload.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Code/ISBN Number: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="code" placeholder="" class="form-control" autofocus="autofocus" required/>
											<script>
												if (!("autofocus" in document.createElement("input"))) {
												document.getElementById("my-input").focus();
												}
											</script>
										</div>
										
										
									</div>
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
												<select class="form-control" Name="catid" required>
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
								</div>
									</div>
								</div>
								
									
								<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal10" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Add New Product Catagry</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="addCat.php">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Category Name:</label>
													  
                                                      <input type="text" class="form-control" id="exampleInputEmail3" name="cname" value="">
                                                  </div>
                                               
                                                 
                                                  <button type="submit" class="btn btn-primary">Save</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
								</div>
									
									
					
										
						