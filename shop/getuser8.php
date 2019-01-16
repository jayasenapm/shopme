<?php 
session_start();
include('connect.php');
$q = $_GET['q'];
function formatMoney($number, $fractional=false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
					
?>


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
			
	$i=1;
	
				
				$result = $db->prepare("SELECT * FROM product WHERE Product_Name = '".$q."'");
				
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				//$cname=$row['CustmerID'];
				//$f=$row['InvoiceNo'];
				//$paid=$row['PaiedAmount'];
				//$gpaid=$gpaid+$paid;
				$i++;
			?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
	<td><?php echo $i; ?></td>
    <td><?php echo $row['prid']; ?></td>
    <td><?php echo $row['Product_Name']; ?></td>
	
   
    <td align="right"><?php echo formatMoney($row['Price'],true); ?></td>
	 <td align="right"><?php echo $row['discount']; ?></td>
	 <td align="center"><?php echo $row['Quanaty']; ?></td>
	 
	  <td align="center"><?php echo $row['MinQun']; ?></td>
	  
	  
	  
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $i ; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
   
    
	
	</tr>
	<div class="modal fade" id="edit<?php echo $i ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Invoice</h4>
      </div>
          <div class="modal-body">
		 
        
         
       <form action="ss.php">
       
       
	    <input class="form-control " name="id" value="<?php echo $row['InvoiceNo']; ?>" type="hidden" placeholder="">
	   <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </form>
	  
	
      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
	
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
    </div>ent --> 
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
</div>

		
		
		
		
		
		
		</div>

