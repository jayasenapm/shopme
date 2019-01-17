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
	Add New Supplier 
							  
	</div>
	
	<form class="form-horizontal" role="form" action="AddCustomer.php?k=1">
        <fieldset>

          <!-- Form Name -->
          <legend></legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="name" name="name" class="form-control"required="true" >
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
                <button type="submit" name="k" value="1" class="btn btn-default">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
	
	
	</div>
	
 



	<div class="col-md-4 col-sm-12" >
	
     
	<div class="panel-title">
	Add New Supplier 
							  
	</div>

	<?php
	$kkk=$_GET['tt'];
	if($kkk==1){
		?>
		<form class="" action="addbil.php">

	<?php
	}else{
		?>
		<form class="" action="buybulk.php">

	<?php


	}


	?>
	<form class="" action="addbil.php">
    
    <div class="form-group">
      <select id="lunch" name="cus" class="selectpicker" data-live-search="true" title="Please select a  Coustmer" required="true">
	  <option value="no">working customer</option>
	<?php 
	  include('connect.php');
	  $result = $db->prepare("SELECT * FROM supplier");
		
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					
					?>
					<option value="<?php echo $row['SUID'];?>"><?php echo $row['Name'];?></option>
					<?php
					
	  
				}
	  
	  
	  ?>
	   
      </select>
    </div>
	
         <div class="form-group">
            
              <input type="text" placeholder="Bill No" name="bill" class="form-control" required="true">
           
            
          </div>    
	 <div class="form-group">
           
            
              <input type="date"  placeholder=" Bill Date" name="date" class="form-control" required="true">
            

            
          </div>  
            <br>
          <div class="form-group">
            
           
             <button type="submit" name="id" value="0" class="btn btn-success">Proceed</button>
         

            
          </div>  

	
	
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
