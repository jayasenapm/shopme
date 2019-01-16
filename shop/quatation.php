
<?php
if(isset($_SESSION['qid'])){

   $qid=$_SESSION["qid"];
}



?>
<style>
  
@media print {
  .mmm {
    display: none;
  }


</style>

<div class="container">
	<div class="row">
		
		

        <div class="col-md-12">
          <div class="mmm">
        <h4><a style="color:Black;" data-toggle="modal" data-target="#my7">Customer </a></h4>
      </div>
                    <div class="row">
                            <div class="col-xs-12">
                <center>
                  jayasena
                                    <h4>ABC COMPANY</h4> 
                   <h4>No:150</h4>
                  <h4>Bandarawela</h4> 
                  <h4>Te:057 00000</h4> 
                                    <small >Date: <?php echo  date("Y/m/d"); ?></small>
                               </center>
                            </div><!-- /.col -->
                        </div>




                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my7" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add </h4>
                            </div>
                            <div class="modal-body">
                            <form action="addqut.php">
                            
                            <select class="form-control" name="id" id="sel1" placeholder="Select Cheques No">
                            
                            <?php
                              $result = $db->prepare("SELECT * FROM costumer");
                              $result->execute();

                              for($i=0; $row = $result->fetch(); $i++){


                            ?>
                            <option value="<?php echo $row['COID']; ?>"><?php echo $row['Name']; ?></option>

                            <?php } ?>
                            </select>
                            <br>
                            
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
                          <?php
                          if(isset($_SESSION['qid'])){
                            ?> <h3>Quatation No: <?php echo $qid; ?></h3><?php
                           
                            }

                            ?>
                         
                          <?php 
                          $cust=0;

                          $result2 = $db->prepare("SELECT * FROM quatation where QID=:userid");
                          $result2->bindParam(':userid', $qid);  
                          $result2->execute();

                          for($i=0; $row2 = $result2->fetch(); $i++){
                            $cust=$row2['CID'];
                            
                          }
                        $result11 = $db->prepare("SELECT * FROM costumer  where COID=:userid");
                        $result11->bindParam(':userid', $cust);
                        $result11->execute();

                        for($i=0; $row11 = $result11->fetch(); $i++){
                          ?>
                          <h5><?php echo $row11['Name']; ?> </h5>
                          <h5><?php echo $row11['Address']; ?> </h5>
                          <?php

                        }



                          ?>

<div class="mmm">
<a  class="btn btn-success" role="button" data-toggle="modal" data-target="#my8">Ad Items</a>
</div>

   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my8" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add Items </h4>
                            </div>
                            <div class="modal-body">
                            <form action="additems.php">
                            
                            <select class="form-control" name="id" id="sel1" placeholder="Select Cheques No">
                            
                            <?php
                              $result = $db->prepare("SELECT * FROM product");
                              $result->execute();

                              for($i=0; $row = $result->fetch(); $i++){


                            ?>
                            <option value="<?php echo $row['Product_Name']; ?>"><?php echo $row['Product_Name']; ?></option>

                            <?php } ?>
                            </select>
                            <br>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="quan" value="">
                            <input type="hidden" class="form-control" id="exampleInputEmail3" name="price" value="<?php echo $row['Price']; ?>">
                            <input type="hidden" class="form-control" id="exampleInputEmail3" name="qid" value="<?php echo $qid; ?>">
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>








        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th>S/NO</th>
                   <th>Product Name</th>
 
                     <th>Price</th>
                     <th>Qun</th>
                     <th>Total</th>
                    
                      
                       <th>Delete</th>
                   </thead>
    <tbody>
	<?php
	     $ii=0;

        $result14 = $db->prepare("SELECT * FROM quitems  where QID=:userid");
          $result14->bindParam(':userid', $qid);
					$result14->execute();

				   for($i=0; $row14 = $result14->fetch(); $i++){
					$ii++;
	
	
	?>
    <tr>
    <td><?php echo $ii; ?></td>
    <td><?php echo $row14['Name']; ?></td>
    <td><a style="color:Black;" data-toggle="modal" data-target="#my<?php echo $ii ; ?>"><u><?php echo $row14['Price']; ?></u></a></td>





    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my<?php echo $ii ; ?>" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content" style="width:50%;">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add Price</h4>
                            </div>
                            <div class="modal-body">
                            <form action="updatquprice.php">
                            <input class="form-control " name="pric" value="<?php echo $row14['Price']; ?>" type="text" placeholder="">
                            <input class="form-control " name="id" value="<?php echo $row14['QIID']; ?>" type="hidden" placeholder="">
                            <input class="form-control " name="price" value="<?php echo $row['Price'];; ?>" type="hidden" placeholder="">
                            <input class="form-control " name="prid" value="<?php echo $row['prid'];; ?>" type="hidden" placeholder="">
                            <input class="form-control " name="newqu" value="<?php echo $row['quanaty']; ?>" type="hidden" placeholder="">
                            <br>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
    <td><?php echo $row14['Quan']; ?></td>
    <td><?php echo $row14['Price']*$row14['Quan']; ; ?></td>
   
   <div class="mmm">
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?php echo $ii ; ?>" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
  </div>
    </tr>

	
	<div class="modal fade" id="delete<?php echo $ii ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form action="Deletqu.php">
         <input type="hidden" class="form-control" id="exampleInputEmail3" name="QIID" value="<?php echo $row14['QIID']; ?>">
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

               <div class="mmm">
                            <div class="col-xs-12">
                                <a href="" id="printPageButton" class="btn btn-default" onclick="myFunction()"><i class="fa fa-print"></i> Print</a>
               
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
</div>



    
    
    