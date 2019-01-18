<?php 


?>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<div class="content" id="content">
<table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
            <th><input type="checkbox" id="checkall" /></th>
            <th width="16%"> Bill Number </th>
			<th width="13%"> Transaction Date </th>
			<th width="20%"> supplier Name </th>
			<th width="18%"> Amount </th>
			<th width="18%"> Tax </th>
			<th width="18%"> Discount </th>
			<th width="13%"> Paied </th>
			<th width="13%"> Balance </th>
			<th width="13%"> Edit </th>
			<th width="13%"> Delete </th>
			
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
				include('connect.php');
				$d1=$_GET['d1'];
				
				if($d1==0){
					$result = $db->prepare("SELECT * FROM buil  ORDER by Date DESC ");
					
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
				$cname=$row['SUID'];
				$f=$row['BilNo'];
				//$paid=$row['PaiedAmount'];
				//$gpaid=$gpaid+$paid;
				$dat=$row['Date'];
				$gtotal=$gtotal+$row['Amount'];
				$tax=$tax+$row['tax'];
				$gpaid=$gpaid+$row['Payid'];
				$sn=$f;
				$ii++;
			?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php echo $row['BilNo']; ?></td>
    <td><?php echo $row['Date']; ?></td>
	
	<?php 
	if ($row['SUID']==0) {
			?>
			<td><?php echo 'cash'; ?></td>
			<?php
		}else{
	$result5 = $db->prepare("SELECT * FROM supplier WHERE SUID= :invice");
	$result5->bindParam(':invice',$row['SUID']);
	$result5->execute();

	for($i=0; $row5 = $result5->fetch(); $i++){
		
	?>
		<td><?php echo $row5['Name']; ?></td>
	<?php	
		}
	}
	
	
	?>
	
   
    <td>
    	<?php
    	$bia2=0;
    	$result51 = $db->prepare("SELECT * FROM buy WHERE billNo= :invice");
		$result51->bindParam(':invice',$row['BilNo']);
		$result51->execute();

		for($i=0; $row51 = $result51->fetch(); $i++){

			$bia2=$bia2+$row51['Total'];
			$bia=$bia+$row51['Total'];
		}

		echo $bia2;
		?>


    </td>
    <td><?php echo $row['tax']; ?></td>
	<td><?php echo $row['Discount']; ?>
		<?php 

		$dis=$dis+$row['Discount'];


		?>


	</td>

    <td><?php echo $row['Payid']; ?></td>
	 <td><?php echo ($bia2+$row['tax']-$row['Discount'])- $row['Payid']; ?></td>
	 <div class="mmm">
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $ii ; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
	
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?php echo $ii ; ?>" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </div>
	
	</tr>


	<div class="modal fade" id="edit<?php echo $ii ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Invoice</h4>
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
												
												
												<option><?php echo $row13['Product_Name'];?></option>
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
       
	    <input class="form-control " name="id" value="<?php echo $row['BilNo']; ?>" type="hidden" placeholder="">
	   <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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