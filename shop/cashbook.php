<?php 


?>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<div class="mmm">
<form action="dashboard.php?id=28" method="get">

 
<center><strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <input type="hidden" style="width: 223px; padding:14px;" name="id" class="tcal" value="28" />
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
                   <tr>
                   <th rowspan="2"><input type="checkbox" id="checkall" /></th>
                   <th width="16%" rowspan="2"> Date </th>
			<th width="13%" rowspan="2" > Account Title </th>
			<th width="13%" rowspan="2" >Bank</th>
			<th width="20%" colspan="2"> Debit </th>
			<th width="18%" colspan="2"> Credit </th>
			
			</tr>
            <tr>       
                   
                   
                   <th width="16%" > Cash </th>
			<th width="13%"  > Bank </th>
			<th width="20%" > Cash </th>
			<th width="18%" > Bank </th>
			
			</tr>
                   </thead>
    <tbody>
	<?php
			
	
	
				$gtotal=0;
				$gpaid=0;
				$dat;
				$bank=0;
				$dip=0;
				include('connect.php');
				$d1=$_GET['d1'];
				
				if($d1==0){
					$result = $db->prepare("SELECT * FROM cashBook  ORDER by Date ASC ");
					
				}else{
				
				$d1 = date("Y-m-d", strtotime($d1));
				$d2=$_GET['d2'];
				$d2 = date("Y-m-d", strtotime($d2));
				$result = $db->prepare("SELECT * FROM cashBook WHERE Date BETWEEN :a AND :b ORDER by Date ASC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				}
				$result->execute();
				
				for($i=0; $row = $result->fetch(); $i++){
				
			?>
    <tr>
	<?php
	if(!$row['Debit']==0){
		?>
		<td><input type="checkbox" class="checkthis" /></td>
		<td><?php echo $row['Date']; ?></td>
		
		<?php
		if($row['AccountTitle']==0){
			?>
			<td><?php echo 'cash/'.$row['AccountTitle']; ?></td>
			<td>-</td>
			<?php
			
		}else{
		?>
		<td><?php echo $row['AccountTitle']; ?></td>
		<td><?php echo $row['Bank']; ?></td>
			<?php
		}
			if($row['Type']=='diposit'||$row['Type']=='bank'){
				$bank=$bank+$row['Debit'];
				?>
				
				<td></td>
				<td><?php echo $row['Debit']; ?></td>
				<td>-</td>
				<td>-</td>
				
				<?php
			}else{
				if($row['states']=='deposit'){
				$bank=$bank+$row['Debit'];
				
				?>
				<td>-</td>
				<td><?php echo $row['Debit']; ?></td>
				<td>-</td>
				<td>-</td>
				
				<?php
				}else{
				$gtotal=$gtotal+$row['Debit'];
				?>	
				<td><?php echo $row['Debit']; ?></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
					
					
				<?php	
				}
			}
				
			?>
		
		<?php
		
	}else{
		
		?>
		<td><input type="checkbox" class="checkthis" /></td>
		<td><?php echo $row['Date']; ?></td>
		<?php
		if($row['AccountTitle']==0){
			?>
			<td><?php echo 'cash/'.$row['AccountTitle']; ?></td>
			<td>-</td>
			<?php
			
		}else{
		?>
		
		
		
		
		<td><?php echo $row['AccountTitle']; ?></td>
		<td><?php echo $row['Bank']; ?></td>
		<?php
		}
		if($row['Type']=='diposit'){
			$gpaid=$gpaid+$row['Credit'];
			?>
			<td>-</td>
			<td>-</td>
			<td><?php echo $row['Credit']; ?></td>
			<td>-</td>
			
			
			<?php
			
		}elseif($row['Type']=='Cash'){
			$gpaid=$gpaid+$row['Credit'];
			?>
			<td>-</td>
			<td>-</td>
			<td><?php echo $row['Credit']; ?></td>
			<td>-</td>
			
			<?php
			
			
		}else{
			$dip=$dip+$row['Credit'];
			?>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td><?php echo $row['Credit']; ?></td>
			
			<?php
			
			
		}
		
		
		
		
		?>
		
		
		
		
		<?php
		
		
		
		
		
		
		
	}
	
	?>
    
    
	
    
	
	</tr>
	
	
	
	
	
	
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
				echo formatMoney($gtotal,true);
				?>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($bank,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($gpaid,true); ?></th>
			<th style="border-top:1px solid #999999"><?php echo formatMoney($dip,true); ?></th>
		</tr>
	</thead>
	
	<thead>
		<tr>
			<th colspan="7" style="border-top:1px solid #999999"> Balance in Bank: </th>
			
			
			<th style="border-top:1px solid #999999"><?php echo formatMoney($bank-$dip,true); ?></th>
			
		</tr>
	</thead>
	
     <thead>
		<tr>
			<th colspan="7" style="border-top:1px solid #999999"> Balance in Cash: </th>
			
			
			<th style="border-top:1px solid #999999"><?php echo formatMoney($gtotal-$gpaid,true); ?></th>
			
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