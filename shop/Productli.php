<div class="container">
	<div class="row">
		
		

        <div class="col-md-12">
        <h4>Product List </h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Product Name</th>
 
                     
                     <th>Quantity</th>
                     <th>Discount </th>
                      <th>Price</th>
                      
                       <th>Delete</th>
                   </thead>
    <tbody>
	<?php
	$i=0;
    $result = $db->prepare("SELECT * FROM product");
					$result->execute();

				   for($i=0; $row = $result->fetch(); $i++){
					$i++;
	
	
	?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php echo $row['Product_Name']; ?></td>
    <td><?php echo $row['Quanaty']; ?></td>
    <td><?php echo $row['discount']; ?></td>
    <td><?php echo $row['Price']; ?></td>
   
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $i ; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
	<div class="modal fade" id="edit<?php echo $i ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Customer Detail</h4>
      </div>
          <div class="modal-body">
		  <form action="editpro.php">
          <div class="form-group">
		 <input class="form-control " name="id" value="<?php echo $row['prid']; ?>" type="hidden" placeholder="">
        <input class="form-control " name="name" type="text" value="<?php echo $row['Product_Name']; ?>">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" name="address" value="<?php echo $row['discount']; ?>">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" name="phone" value="<?php echo $row['Price']; ?>">
        </div>
		<div class="modal-footer ">
        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
	  </form>
      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
	
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form action="Delet.php">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
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
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        </div>
	</div>
</div>


