<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Free Bootstrap Error Page Template</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="css/bootstrap.css" rel="stylesheet" />
	  <!-- CUSTOM STYLE  -->
    <link href="css/custom-style.css" rel="stylesheet" />
   
</head>
<body>
 <div class="container">
     
   <div class="row pad-top text-center">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <h1><strong>  </strong> ERROR  </h1>
		   <?php 
		   $massage=$_GET['ms'];
		   $pn=$_GET['pn'];
		   
		   ?>
           <h3><?php echo $massage ;?></h3>
           <a href="dashboard.php?id=<?php echo $pn ; ?>" class="btn btn-default btn-lg">  <strong> BACK TO HOME </strong></a>
       </div>

   </div>
 </div>

</body>
</html>
