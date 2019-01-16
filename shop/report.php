<?php 


?>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>




<div class="mmm">

<form action="dashboard.php?id=6" method="get">

 
<center><strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <input type="hidden" style="width: 223px; padding:14px;" name="id" class="tcal" value="6" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
</div>
<?php 
if(!isset($_GET['d1'])){
	?>
	<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">

	Sales Report from&nbsp;<?php echo  date("Y-m-d", strtotime($_GET['d1'])) ?>&nbsp;to&nbsp;<?php echo  date("Y-m-d", strtotime($_GET['d2'])) ?>
	</div>
<?php	
}

?>

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
		 
        
         
       <form action="sss.php">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to edit this invoice?</div>
       
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
	
	<div class="modal fade" id="delete<?php echo $ii ; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form action="nnn.php">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       <input class="form-control " name="id" value="<?php echo $row['BilNo']; ?>" type="hidden" placeholder="">
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
	<thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				
				/*$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$d1 = date("Y-m-d", strtotime($d1));
				$d2 = date("Y-m-d", strtotime($d2));
				$results4 = $db->prepare("SELECT sum(amount) FROM sales_order WHERE date BETWEEN :a AND :b");
				$results4->bindParam(':a', $d1);
				$results4->bindParam(':b', $d2);
				$results4->execute();
				for($i=0; $rows = $results4->fetch(); $i++){
				//$dsdsd=$rows['sum(amount)'];
				
				}*/
				echo formatMoney($bia,true);
				?>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($tax,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($dis,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($gpaid,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($bia-$dis+$tax-$gpaid,true); ?></th>
		</tr>
	</thead>
	
	
	
        
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