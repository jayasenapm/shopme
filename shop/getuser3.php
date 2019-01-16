<?php
$s=0;
include('connect.php');
$q = $_GET['q'];
$id = $_GET['id'];



	

?>




<div id="txtHint222">
		
		<ul>
					<?php 
					$result = $db->prepare("SELECT * FROM product WHERE Product_Name = '".$q."'");
							$result->bindParam(':userid', $res);
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++){
								$id=$row['prid'];
					
					
					
					?>
					
						<li>
						<div class="thumbnail" style="" >
							<a class="cbp-vm-image" href="#"><img src="uploads\<?php echo $row['Image'];?>" width="100px;"></a>
							<h3 class="cbp-vm-title"><?php echo $row['Product_Name']; ?></h3>
							<div class="cbp-vm-price">Rs:<?php echo $row['Price']; ?></div>
							<div class="cbp-vm-price">Quantaty:<?php echo $row['Quanaty']; ?></div>
							<div class="cbp-vm-details">
								
							</div>
							
						</div>
						</li>
							<?php } ?>
						
						
						
					</ul>
                                   
		
		
		</div>
		
		


