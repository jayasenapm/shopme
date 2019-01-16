<div class="content">
<div class="monthly-grid"style="  border-style: solid;
    border-color: red;
	 border-radius: 25px;">
						<div class="panel panel-widget">
							
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt">
									
	<div class="row">
	<div class="col-md-8 col-sm-12">
	
	<div class="panel-title">
							  Add New Customer 
							  
							</div>
	<form class="form-horizontal" role="form" action="AddCustomer.php">
        <fieldset>

          <!-- Form Name -->
          <legend></legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="name" name="name" class="form-control"required="true" >
			   <input type="hidden" placeholder="name" name="k" class="form-control"required="true" >
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Address</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Address " name="Address" class="form-control" required="true">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">email</label>
            <div class="col-sm-10">
              <input type="email" placeholder="City" name="email" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Phone1</label>
            <div class="col-sm-4">
              <input type="text" placeholder="phone No" name="ph1" class="form-control" required="true">
            </div>

            <label class="col-sm-2 control-label" for="textinput">pone2</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Phone number" name="ph2" class="form-control">
            </div>
          </div>



          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">contact person</label>
            <div class="col-sm-10">
              <input type="text" placeholder="contact person" name="person" class="form-control" required="true">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-default">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
	
	
	</div>
	
 



	<div class="col-md-4 col-sm-12" >
	<div class="panel-title">
	Select Customer 
							  
	</div>
	
	<form class="form-inline" action="addInvoice.php">
    
    <div class="form-group">
      <select id="lunch" name="cus" class="selectpicker" data-live-search="true" title="Please select a  Coustmer" required="true">
	  <option value="no">working customer</option>
	<?php 
	  include('connect.php');
	  $result = $db->prepare("SELECT * FROM costumer");
		
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					
					?>
					<option value="<?php echo $row['COID'];?>"><?php echo $row['Name'];?></option>
					<?php
					
	  
				}
	  
	  
	  ?>
	   
      </select>
    </div>
	<br>
	<br>
	
	<button type="submit" name="id" value="2" class="btn btn-success">Proceed</button>
  </form>

	
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
