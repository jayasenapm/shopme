<?php 


?>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<div class="content" id="content">
	<?php
	if(isset($_GET['msg'])){
		?>
		<div class="alert alert-warning">
		<strong>Warning!</strong> <?php echo $_GET['msg']; ?>Indicates a warning that might need attention.
		</div>

		<?php
	}

	?>
	
  	
	
<table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
               <tr>
            <th>No</th>
            <th width="16%">Product </th>
			<th width="13%"> Bill No </th>
			<th width="20%"> Quentaty </th>
			<th width="18%"> Price per unit </th>
			<th width="18%"> Total</th>
			
			<th width="13%"> Edit </th>
			


               </tr>    
           
			
                   </thead>
    <tbody>
	<?php
			
	
	
				$gtotal=0;
				$gpaid=0;
				$dat;
				$bia=0;
				$dis=0;
				$ii=0;
				$tax=0;
				$sn=0;
				include('connect.php');
				$d1=0;
				
				if($d1==0){
					$result = $db->prepare("SELECT * FROM buy WHERE catagrize='No' ");
					
				}else{
				
				$d1 = date("Y-m-d", strtotime($d1));
				$d2=$_GET['d2'];
				$d2 = date("Y-m-d", strtotime($d2));
				$result = $db->prepare("SELECT * FROM buil WHERE Date BETWEEN :a AND :b ORDER by Date DESC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);

				}
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				//$cname=$row['SUID'];
				//$f=$row['BilNo'];
				//$paid=$row['PaiedAmount'];
				//$gpaid=$gpaid+$paid;
				//$dat=$row['Date'];
				//$gtotal=$gtotal+$row['Amount'];
				//$tax=$tax+$row['tax'];
				//$gpaid=$gpaid+$row['Payid'];
				//$sn=$f
				$sn++;
				$ii++;
			?>
    <tr>
    <td><?php echo $sn; ?></td>
    <td><?php echo $row['prid']; ?></td>
    <td><?php echo $row['billNo']; ?></td>
	
	
    <td><?php echo $row['Quan']; ?></td>
	<td><?php echo $row['Price']; ?>
		

	</td>

    <td><?php echo $row['Total']; ?></td>
	 
	 <div class="mmm">
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $ii ; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
	
    
    </div>
	
	</tr>


	<div class="modal fade" id="edit<?php echo $ii ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Product</h4>
      </div>
          <div class="modal-body">
		 
        
         
       <form action="catarize.php">
       <div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product : </label>

			<div class="col-sm-9">
											
										<select class="form-control" Name="pid">
												<option></option>
												<?php
											
	
												$result13 = $db->prepare("SELECT * FROM product");
												$result13->bindParam(':userid', $res);
												$result13->execute();
												for($i=0; $row13 = $result13->fetch(); $i++){
												?>
												
												
												<option value="<?php echo $row13['prid'];?>"><?php echo $row13['Product_Name'];?></option>
												<?php
												}
												?>
										</select>
											
			</div>
										
										
			</div>
			<br>
			<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quanaty: </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" name="Quen" placeholder="" class="form-control" required/>
										</div>
									</div>
       
	    <input class="form-control " name="id" value="<?php echo $row['billNo']; ?>" type="hidden" placeholder="">
	    
	   <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </form>
	  
	
      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
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