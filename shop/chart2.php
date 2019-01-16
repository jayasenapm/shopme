<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "shopme");
$query = "SELECT * FROM product";
$result = mysqli_query($connect, $query);
$chart_data = '';
$name='';
$tot=0;
while($row = mysqli_fetch_array($result))
{
	
	$name=$row["Product_Name"];
	$query2 = "SELECT * FROM sales  where prid='". $name. "'";
	$result2 = mysqli_query($connect, $query2);
	while($row2 = mysqli_fetch_array($result2)){
		$tot=$row2['total'];
		 
	}
$chart_data .= "{ Product:'".$row["Product_Name"]."', profit:".$tot.", purchase:".$row["discount"].", sale:".$row["discount"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
 <div class="container" >
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Product',
 ykeys:['profit', 'purchase', 'sale'],
 labels:['Profit', 'Purchase', 'Sale'],
 hideHover:'auto',
 stacked:true
});
</script>