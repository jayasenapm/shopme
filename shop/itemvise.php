<?php 


?>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<div class="container">
<div class="mmm">
<a href="dashboard.php?id=3&d1=&d2=" class="btn btn-success" role="button">By Invoice</a>
<a href="dashboard.php?id=32&d1=&d2=" class="btn btn-success" role="button">By Items</a>
</div>


</div>
<br>
<div class="mmm">
<form action="dashboard.php?id=3" method="get">

 
<center><strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <input type="hidden" style="width: 223px; padding:14px;" name="id" class="tcal" value="32" />
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
                   <th width="">Product No </th>
			<th width=""> Product Name</th>
			<th width=""> Quantaty Sales </th>
			<th width=""> Income </th>
			
			
			
                   </thead>
    <tbody>
	<?php
			
	
	
				$gtotal=0;
				$gpaid=0;
				$dat;
				
				include('connect.php');
				
				$result3 = $db->prepare("SELECT * FROM product ");
				$result3->execute();
				for($i=0; $row3 = $result3->fetch(); $i++){
					?>
				
	
				
					
					<?php
				
				
				
				$d1=$_GET['d1'];
				$quan=0;
				$amount=0;
				if($d1==0){
					$result = $db->prepare("SELECT  * FROM sales where prid=:p ORDER by Date DESC ");
					$result->bindParam(':p', $row3['Product_Name']);
				}else{
				
				$d1 = date("Y-m-d", strtotime($d1));
				$d2=$_GET['d2'];
				$d2 = date("Y-m-d", strtotime($d2));
				$result = $db->prepare("SELECT * FROM sales WHERE prid=:p and Date BETWEEN :a AND :b ORDER by Date DESC ");
				$result->bindParam(':p', $row3['Product_Name']);
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				}
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
					$quan=$quan+$row['quanaty'];
					$amount=$amount+$row['total'];
					$gtotal=$gtotal+$row['quanaty'];
					$gpaid=$gpaid+$row['total'];
				}
					
				//$cname=$row['CustmerID'];
				//$f=$row['InvoiceNo'];
				
				//$paid=$row['PaiedAmount'];
				//$gpaid=$gpaid+$paid;
				//$dat=$row['Date'];
				//$gtotal=$gtotal+$row['Amount'];
				
				//$gpaid=$gpaid+$row['Payid'];
				//$sn=$f;
				
				if(!$quan==0){
					
					
					
				
				
			?>
			
			
				<tr>
    
				<td><input type="checkbox" class="checkthis" /></td>
				<td><?php echo $row3['prid']; ?> </td>
				<td><?php echo $row3['Product_Name']; ?> </td>	
					
    
				<td><?php echo $quan ; ?></td>
	
	
	
   
				<td><?php echo $amount ; ?></td
	</tr>
	
	

	
	
	
				   <?php 
				}
				   
				}?>
 
    

    
    
 
    
    
 
    
   
    
   
    
    </tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total: </th>
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
				echo $gtotal;
				?>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($gpaid,true); ?></th>
			
			
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