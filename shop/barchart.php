

    
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    	<script src="dist/canvasjs.min.js"></script>
       <style>
	   .canvasjs-chart-credit {
		display: none;
		}
	   
	   </style>
     
        <?php
		$total=0;
		$total1=0;
		$total2=0;
		$total3=0;
		$total4=0;
		$total5=0;
		$date2='2017-8-31';
		$date3='2017-9-30';
		$date4='2017-10-31';
		$date5='2017-11-30';
		$date6='2017-12-31';
		include('connect.php');
		$result = $db->prepare("SELECT * FROM invoice ");
		$result->bindParam(':invice',$invoice);
		$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					
					$date=$row['Date'];
					if(strtotime($date) <= strtotime($date2)){
						$total=$total+$row['Amount'];
					}elseif(strtotime($date) <= strtotime($date3))
					{
						$total1=$total1+$row['Amount'];
					}elseif(strtotime($date) <= strtotime($date4))
					{
						$total2=$total2+$row['Amount'];
					}elseif(strtotime($date) <= strtotime($date5))
					{
						$total3=$total3+$row['Amount'];
					}elseif(strtotime($date) <= strtotime($date6))
					{
						$total4=$total4+$row['Amount'];
					}
				}
		
		
		
		$id=$total;
            $dataPoints = array(
                array("y" => $id, "label" => "August"),
                array("y" => $total1, "label" => "Sep"),
                array("y" => $total2, "label" => "Oct"),
                array("y" => 7, "label" => "Nov"),
                array("y" => 4, "label" => "Dec"),
                
            );
        ?>
     <div class="content">
        <div id="me" style=" height: 400px; width:100%; ">
            <div id="chartContainer" style=""></div>
			
		</div>
		<div id="ss" style=" height: 20px; width:500px;background-color: white; position: absolute;
    left: 0px;
    top: 605px;" >
	</div>
	</div>
            <script type="text/javascript">
     
                $(function () {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "theme1",
                        animationEnabled: true,
                        title: {
                            text: "monthly sales report"
                        },
                        data: [
                        {
                            type: "column",
							
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }
                        ]
                    });
                    chart.render();
                });
            </script>
        
     

