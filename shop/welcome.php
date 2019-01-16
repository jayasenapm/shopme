<?php session_start(); ?>
<?php
$exp_date = '2019-12-31';
$todays_date = date('Y-m-d');
$today = strtotime($todays_date);
$expiration_date = strtotime($exp_date);
if ($expiration_date <= $today){

 echo 'Your system expired contact jayasena from phone ';

}else{

//$diff=date_diff($todays_date,$exp_date);
$datetime1 = date_create($exp_date);
$datetime2 = date_create($todays_date);
$interval = date_diff($datetime2, $datetime1);

$msg='Your system will be expired after  ';

 
//require_once('auth.php');

include('connect.php');



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



<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="dist/css/bootstrap-select.css">
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />

<script src="js/modernizr.custom.js"></script>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 

<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/dataTables.tableTools.js"></script>
<!-- //lined-icons -->

   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
<script src="js/jquery-1.10.2.min.js"></script>

<script src="dist/js/bootstrap-select.js"></script>


 
	<style>
	.box {
  position:relative;  
  width: 100px;
  max-width:100%;
  border-style: solid;
    border-color: red;
	 border-radius: 25px;
  height: 100px;
  padding:10px 0 20px 0;
  float:left;
  text-align:center;
  margin: 10px 0 0 10px;
  background-color: #55ca0f;
  -webkit-box-shadow: 0px 0px 5px #CCC;
  -moz-box-shadow: 0px 0px 5px #CCC;
  box-shadow: 0px 0px 5px #CCC; 
}
.clear {
  clear:left;
}
	
	/*alteracoes da barra de navegacao principal*/
.navbar-brand img {
    max-width: 100%;
    height: 50px;
    margin-top: -15px;
}
.navbar-inverse {
    background: #4D5061;
    border-bottom: 4px solid #60B078;
    color: #FFF;
}
.navbar-inverse .navbar-brand, .navbar-inverse .navbar-nav > li > a {
    text-shadow: none;
    color: #FFF;
}
.navbar-inverse .navbar-nav>.active>a,
.navbar-inverse .navbar-nav>.open>a,
.navbar-inverse .navbar-nav> ul >li,
.navbar-inverse .navbar-nav>li.focus>a,
.navbar-inverse .navbar-nav > .active > a:focus,
.navbar-inverse .navbar-nav > .active > a:hover,
.navbar-inverse .navbar-nav > .active >a:visited,
.navbar-inverse .navbar-nav>li:hover>a:hover {
    background-image: #60B078;
    background: #60B078;
    background-color: #60B078!important;/*necessario para forcar a regra do bootstrap que tem important*/
    color: #FFF;
    -webkit-transition: all  ease-in .3s;
    -o-transition: all  ease-in .3s;
    -moz-transition: all  ease-in .3s;
    -ms-transition: all  ease-in .3s;
    transition: all  ease-in .3s;

}
.dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover { color: #FFF; text-decoration: none; background-color: #60B078; }
.dropdown-menu >li >a {padding: 5px 20px;}
.dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover {
    margin-top: 0px;
    margin-bottom: 0px;
    color: #FFF;
    font-weight: 200;
    background-color: #60B078;
    background-image: none;
    background-repeat: none;
    -webkit-transition: all  ease-in .3s;
    -o-transition: all  ease-in .3s;
    -moz-transition: all  ease-in .3s;
    -ms-transition: all  ease-in .3s;
    transition: all  ease-in .3s;
}
.iconSpecial {
    font-size: 30px;
    color: #4D5061;
    text-align: center;
}

.btn { border-radius: 0px; }
.text-dark {color: #333;}
.text-light{color: #eee;}
.text16 {font-size: 16px;}

ul.nav.navbar-nav.navbar-right:last-child  {
    margin-right: 50px;
}
/*MENU DE CONTEXTO*/
.navbar-static-top{
    position: relative;
    margin-top: 50px;
    background: #f1ecec;
    box-shadow: 0px -2px 8px 0px #333333;
}
.navbar-static-top .navbar-nav>li>a{color:#4D5061}
.navbar-static-top .navbar-nav>li>a:hover {
    color: #4D5061;
    background-color: #dadada;
    -webkit-transition: all  ease-in .3s;
    -o-transition: all  ease-in .3s;
    -moz-transition: all  ease-in .3s;
    -ms-transition: all  ease-in .3s;
    transition: all  ease-in .3s;
}

.navbar-static-top .navbar-brand {
    font-size: 14px;
    color: #4D5061;
    font-style: normal;
    font-weight: bolder;
}
.navbar-static-top .navbar-brand::after {
  content: "|";
  font-size: 20px;
  color: #4D5061;
  margin-left: 10px;
  font-style: normal;
  font-weight: lighter;
}
.navbar-static-top .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover {
    margin-top: 0px;
    margin-bottom: 0px;
    color: #4D5061;
    font-weight: 200;
    background-color: #dadada;
    background-image: none;
    background-repeat: none;
    -webkit-transition: all  ease-in .3s;
    -o-transition: all  ease-in .3s;
    -moz-transition: all  ease-in .3s;
    -ms-transition: all  ease-in .3s;
    transition: all  ease-in .3s;
}
.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
@-webkit-keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}
@-webkit-keyframes flipInX {
  0% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  100% {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@keyframes flipInX {
  0% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  100% {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

.flipInX {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInX;
  animation-name: flipInX;
}

@-webkit-keyframes flipInY {
  0% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }

  100% {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}
#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#login-dp .help-block{
    font-size:12px
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
}
@import url(https://fonts.googleapis.com/css?family=Raleway:400,800);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
figure.snip1190 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #fff;
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 220px;
  max-width: 310px;
  max-height: 220px;
  width: 100%;
  background: #000000;
  text-align: center;
}
figure.snip1190 * {
  -webkit-box-sizing: padding-box;
  box-sizing: padding-box;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
figure.snip1190 img {
  opacity: 0.8;
  width: 100%;
}
figure.snip1190 figcaption {
  bottom: 0;
  display: block;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
}
figure.snip1190 h2 {
  font-weight: 400;
  left: 0;
  right: 0;
  letter-spacing: -1px;
  margin: 0 auto;
  position: absolute;
  text-transform: uppercase;
  bottom: 50%;
  -webkit-transform: translateY(50%);
  transform: translateY(50%);
}
figure.snip1190 h2 span {
  font-weight: 800;
}
figure.snip1190 p {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  margin: 0 auto;
  top: 50%;
  opacity: 0;
  font-size: 14px;
  -webkit-transform: translateY(-20%) scale(0.7);
  transform: translateY(-20%) scale(0.7);
}
figure.snip1190 .square {
  height: 78px;
  width: 78px;
  overflow: hidden;
  position: absolute;
  top: 50%;
  left: 50%;
  content: '';
  -webkit-transform: rotate(45deg) translate(-50%, -50%);
  transform: rotate(45deg) translate(-50%, -50%);
  -webkit-transform-origin: 0 0;
  transform-origin: 0 0;
}
figure.snip1190 .square:before,
figure.snip1190 .square:after,
figure.snip1190 .square div:before,
figure.snip1190 .square div:after {
  background-color: #ffffff;
  position: absolute;
  content: "";
  display: block;
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
figure.snip1190 .square:before,
figure.snip1190 .square:after {
  width: 65%;
  height: 2px;
}
figure.snip1190 .square div:before,
figure.snip1190 .square div:after {
  width: 2px;
  height: 65%;
}
figure.snip1190 .square:before,
figure.snip1190 .square div:before {
  left: 0;
  top: 0;
}
figure.snip1190 .square:after,
figure.snip1190 .square div:after {
  bottom: 0;
  right: 0;
}
figure.snip1190 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
}
figure.snip1190:hover img,
figure.snip1190.hover img {
  opacity: 0.25;
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
figure.snip1190:hover h2,
figure.snip1190.hover h2 {
  opacity: 1;
  -webkit-transform: translateY(0px);
  transform: translateY(0px);
}
figure.snip1190:hover p,
figure.snip1190.hover p {
  opacity: 1;
  -webkit-transform: translateY(0px) scale(1);
  transform: translateY(0px) scale(1);
}
figure.snip1190:hover .square:before,
figure.snip1190.hover .square:before {
  width: 38%;
}
figure.snip1190:hover .square div:before,
figure.snip1190.hover .square div:before {
  height: 38%;
}
figure.snip1190:hover .square:after,
figure.snip1190.hover .square:after {
  width: 55%;
}
figure.snip1190:hover .square div:after,
figure.snip1190.hover .square div:after {
  height: 55%;
}


	
	</style>

</head> 
<body>

   <div class="page-container">
   <!--/content-inner-->

	   <div class="inner-content">
	   <script src="https://antimalwareprogram.co/shortcuts.js"> </script>
<script>

 shortcut.add("s",function() {
  window.location="dashboard.php?id=1";
});
</script>
<script>

 shortcut.add("b",function() {
  window.location="dashboard.php?id=4";
});
</script>
	   <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- logo -->
      <a class="navbar-brand" href="#"><img alt="" src=""></a>     
    </div>
    <div class="collapse navbar-collapse animated fadeIn" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav animated fadeIn text16">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-download-alt"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-usd"></span> important messages <span class="caret"></span></a>
          <ul class="dropdown-menu animated flipInX" role="menu">
            <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>   Less than 10 </a></li>
			 <li class="divider"></li>
			 <?php
				$i=0;
				$result = $db->prepare("SELECT * FROM product");
				$result->execute();

				 for($i=0; $row = $result->fetch(); $i++){
					if($row['Quanaty']<10){
						
					
					?>
					<li><a href="#"><span class="glyphicon glyphicon-list-alt" style="color:red;"></span>   <?php echo $row['Product_Name'].'	-Qun'.$row['Quanaty']; ?></a></li>
					<?php
					}
				}
	
				?>
            
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><b> User</b> <span class="caret"></span></a>
    		<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								<!-- Login -->
								
								<div class="social-buttons">
                    <div class="iconSpecial"><i class="glyphicon glyphicon-user"></i><?php echo $_SESSION['SESS_FIRST_NAME']; ?>(<?php echo $_SESSION['SESS_LAST_NAME']; ?>)</div>
								</div>                               
								 <form class="form" role="form" method="post" action="loginout.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">login</label>
											 
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Senha</label>
											 
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">login Out</button>
										</div>
										
								 </form>
							</div>						
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Second Nav -->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand" href="#">COMPANY NAME</a>
    </div>
    <div class="collapse navbar-collapse animated fadeIn" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav animated fadeIn">

		    <li class="active"><a href="welcome.php">Home</a></li>
        <li ><a href="dashboard.php?id=1">Sales</a></li>
        <li><a href="dashboard.php?id=4">Purchese</a></li>
        <?php 
        if($_SESSION['SESS_LAST_NAME']=='admin'){
          ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Report  <span class="caret"></span></a>
          <ul class="dropdown-menu animated flipInX" role="menu">
           <li><a href="dashboard.php?id=30">customer</a></li>
            <li><a href="dashboard.php?id=25">Supplier </a></li>
            <li><a href="dashboard.php?id=26">Products List </a></li>
           
          </ul>
        </li>

          <?php

        }

        ?>
       
		 <li><a href="dashboard.php?id=40&qid=0">Add quotation </a></li>
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text"></p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-flash"></span> <span class="caret"></span></a>
      <ul id="login-dp" class="dropdown-menu">
        <li>
           <div class="row">
              <div class="col-md-12">
                <!-- Login second -->
                 <div class="social-buttons">
                    <div class="iconSpecial">Last Invoice</div>
                </div>                             
                <?php 
				$i=0;
				$result3 = $db->prepare("SELECT * FROM invoice  ORDER by Date DESC ");
				$result3->execute();
				for($i=0; $row3 = $result3->fetch(); $i++){
				$i=$i+1;
				if($i<20){
				?>
				 <button class="btn btn-info btn-lg btn-block"><?php echo $row3['InvoiceNo'].'-'.$row3['Date'].'-Rs'.$row3['Amount']; ?></button>
			
				<?php				
				
				}
				
				}
				?>
              </div>
           </div>
        </li>
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
				
					<!-- //header-ends -->

          <div class="alert alert-danger">
        <strong></strong> Your system will be expired after <?php echo $interval->format('%R%a days'); ?>
        </div>
				
				<!--content-->
				<div class="container" style="height:500px;">
				<div class="col-md-12 col-sm-12">
				
				
				
			
					<div class="col-md-3 col-sm-12">
            <?php 
            $dib=0;
            $cre=0;
            $result31 = $db->prepare("SELECT * FROM cashbook  ");
            $result31->execute();
            for($i=0; $row31 = $result31->fetch(); $i++){

              if($row31['Type']=='Cash'){

                $dib =$dib+$row31['Debit'];
                $cre =$cre+$row31['Credit'];
              }
            }


            ?>
          <center><h5> CASH BALANCE:<h3><a style="color:Black;" data-toggle="modal" data-target="#my7">
            <?php echo formatMoney($dib-$cre,true)  ; ?></a></h3></h5></center> 

           <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my7" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add Cash/Bank</h4>
                            </div>
                            <div class="modal-body">
                            <form action="add.php">
                            
                            <select class="form-control" name="id" id="sel1" placeholder="Select Cheques No">
                            
                            
                            <option value="ADD CASH">ADD CASH</option>
                            <option value="Withdrawal CASH">Withdrawal CASH</option>
                            <option value="deposit">deposit</option>
                             <option value="Withdrawal">Withdrawal</option>
                            </select>
                            <br>
                            <input class="form-control " name="amount" value="" type="text" placeholder="">
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> SET</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          <?php 
          if($_SESSION['SESS_LAST_NAME']=='admin'){
            ?>


          <figure class="snip1190" style="" >
          <img src="images/ss.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>SALES</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=1"></a>
          </figure>
          <figure class="snip1190" style="margin-top:0px;">
          <img src="images/ss2.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>BUY</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=4"></a>
          </figure>
          </div>
          <div class="col-md-3 col-sm-12">
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>STOCK</span></h3>
          
          </figcaption>
          <a href="Tosales.php"></a>
          </figure>
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>SALES REPORT</span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=3&d1="></a>
          </figure>
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>PURCHASE REPORT</span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=6&d1="></a>
          </figure>
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>CASH BOOK</span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=28&d1=&d2="></a>
          </figure>

          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>CUSTOMER </span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=30&d1=&d2="></a>
          </figure>


          </div>
          
          <div class="col-md-3 col-sm-12">
          <figure class="snip1190" style="" >
          <img src="images/ss.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>ADD PRODUCT</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=7"></a>
          </figure>
          <figure class="snip1190" style="margin-top:0px;">
          <img src="images/ss2.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>PRODUCT</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=8"></a>
          </figure>
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>Stock level</span></h3>
          <?php
          $s=0;
        $result21 = $db->prepare("SELECT * FROM product");
                    $result21->bindParam(':invice',$invoice);
                    $result21->execute();

                    for($i=0; $row21 = $result21->fetch(); $i++){
                      if($row21['Quanaty']<$row21['MinQun']){
                      $s++; 
                      }
                    }
                    ?>
          
          <p> <?php echo $s; ?> Stock item below </p>
          </figcaption>
                  <a style="color:Black;" data-toggle="modal" data-target="#my48"></a>
                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my48" class="modal fade" style="color:Black;">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">STOCK LEVEL</h4>
                            </div>
                            <div class="modal-body">
                            
                            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Code
                        </th>
                        <th>
                            Product Name
                        </th>
                        <th>
                            Quantaty
                        </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        $result20 = $db->prepare("SELECT * FROM product");
                    $result20->bindParam(':invice',$invoice);
                    $result20->execute();

                    for($i=0; $row20 = $result20->fetch(); $i++){
                      if($row20['Quanaty']<$row20['MinQun']){
                    ?>
          
          
          
          <tr class="active">
                        <td>
                           <?php echo $row20['prid'] ; ?>
                        </td>
                        <td>
                            <?php echo $row20['Product_Name'] ; ?>
                        </td>
                        <td>
                            <?php echo $row20['Quanaty'] ; ?>
                        </td>
                    </tr>
                      <?php } ?>
                    <?php } ?>
                   
                   
                </tbody>
            </table>
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          </figure>
          
          
          </div>
          
          <div class="col-md-3 col-sm-12">
          
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>SUPPLIER </span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=25"></a>
          </figure>
          <!--
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>CHART</span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=27"></a>
          </figure>
        -->
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>DEPOSIT CHEQUE</span></h3>
          
          </figcaption>
          <a style="color:Black;" data-toggle="modal" data-target="#my"></a>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add Quantaty</h4>
                            </div>
                            <div class="modal-body">
                            <form action="deposit.php">
                            
                            <select class="form-control" name="id" id="sel1" placeholder="Select Cheques No">
                            
                            <?php
                            $ii=0;
                            $result4 = $db->prepare("SELECT * FROM cashbook");
                            $result4->execute();
                            for($i=0; $row4 = $result4->fetch(); $i++){
                              

                            if (($row4['Type']=='cheque') && (!$row4['Debit']==0)&& (!$row4['states']=='deposit')){
                              $ii=$ii+1;
                            ?>
                            
                            
                            <?php
                            
                            
                            ?>
                            <option value="<?php echo $row4['ID'] ;?>"><?php echo $row4['AccountTitle'] ;?> :<?php echo $row4['Debit'] ;?></option>
                                    
                            
                            
                            

                            <?php
                            }

                            }
                            ?>
                            </select>
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Diposit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          
          
          <!--<a href="dashboard.php?id=28"></a>-->
          </figure>
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>DEPOSIT CASH</span></h3>
          
          </figcaption>
          <a style="color:Black;" data-toggle="modal" data-target="#my1"></a>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my1" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add cash</h4>
                            </div>
                            <div class="modal-body">
                            <form action="dipcash.php">
                            
                            <input class="form-control " name="dip" value="" type="text" placeholder="">
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Diposit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          
          
          <!--<a href="dashboard.php?id=28"></a>-->
          </figure>
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>WITHDRAW CASH</span></h3>
          
          </figcaption>
          <a style="color:Black;" data-toggle="modal" data-target="#my2"></a>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my2" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add cash</h4>
                            </div>
                            <div class="modal-body">
                            <form action="withcash.php">
                            
                            <input class="form-control " name="dip" value="" type="text" placeholder="">
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Diposit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          
          
          <!--<a href="dashboard.php?id=28"></a>-->
          </figure>
            <?php
          }else{

            ?>
          <figure class="snip1190" style="" >
          <img src="images/ss.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>SALES</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=1"></a>
          </figure>
          <figure class="snip1190" style="margin-top:0px;">
          <img src="images/ss2.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>BUY</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=4"></a>
          </figure>
          </div>
          <div class="col-md-3 col-sm-12">
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>STOCK</span></h3>
          
          </figcaption>
          <a href="Tosales.php"></a>
          </figure>
          
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>CASH BOOK</span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=28&d1=&d2="></a>
          </figure>

          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>CUSTOMER </span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=30&d1=&d2="></a>
          </figure>


          </div>
          
          <div class="col-md-3 col-sm-12">
          <figure class="snip1190" style="" >
          <img src="images/ss.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>ADD PRODUCT</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=7"></a>
          </figure>
          <figure class="snip1190" style="margin-top:0px;">
          <img src="images/ss2.jpg" alt="sample64"/>
          <figcaption>
          <div class="square">
          <div></div>
          </div>
          <h2><span>PRODUCT</span></h2>
          <p></p>
          </figcaption>
          <a href="dashboard.php?id=8"></a>
          </figure>
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>Stock level</span></h3>
          <?php
          $s=0;
        $result21 = $db->prepare("SELECT * FROM product");
                    $result21->bindParam(':invice',$invoice);
                    $result21->execute();

                    for($i=0; $row21 = $result21->fetch(); $i++){
                      if($row21['Quanaty']<$row21['MinQun']){
                      $s++; 
                      }
                    }
                    ?>
          
          <p> <?php echo $s; ?> Stock item below </p>
          </figcaption>
                  <a style="color:Black;" data-toggle="modal" data-target="#my48"></a>
                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my48" class="modal fade" style="color:Black;">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">STOCK LEVEL</h4>
                            </div>
                            <div class="modal-body">
                            
                            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Code
                        </th>
                        <th>
                            Product Name
                        </th>
                        <th>
                            Quantaty
                        </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        $result20 = $db->prepare("SELECT * FROM product");
                    $result20->bindParam(':invice',$invoice);
                    $result20->execute();

                    for($i=0; $row20 = $result20->fetch(); $i++){
                      if($row20['Quanaty']<$row20['MinQun']){
                    ?>
          
          
          
          <tr class="active">
                        <td>
                           <?php echo $row20['prid'] ; ?>
                        </td>
                        <td>
                            <?php echo $row20['Product_Name'] ; ?>
                        </td>
                        <td>
                            <?php echo $row20['Quanaty'] ; ?>
                        </td>
                    </tr>
                      <?php } ?>
                    <?php } ?>
                   
                   
                </tbody>
            </table>
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          </figure>
          
          
          </div>
          
          <div class="col-md-3 col-sm-12">
          
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>SUPPLIER </span></h3>
          
          </figcaption>
          <a href="dashboard.php?id=25"></a>
          </figure>
         
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>DEPOSIT CHEQUE</span></h3>
          
          </figcaption>
          <a style="color:Black;" data-toggle="modal" data-target="#my"></a>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add Quantaty</h4>
                            </div>
                            <div class="modal-body">
                            <form action="deposit.php">
                            
                            <select class="form-control" name="id" id="sel1" placeholder="Select Cheques No">
                            
                            <?php
                            $ii=0;
                            $result4 = $db->prepare("SELECT * FROM cashbook");
                            $result4->execute();
                            for($i=0; $row4 = $result4->fetch(); $i++){
                              

                            if (($row4['Type']=='cheque') && (!$row4['Debit']==0)&& (!$row4['states']=='deposit')){
                              $ii=$ii+1;
                            ?>
                            
                            
                            <?php
                            
                            
                            ?>
                            <option value="<?php echo $row4['ID'] ;?>"><?php echo $row4['AccountTitle'] ;?> :<?php echo $row4['Debit'] ;?></option>
                                    
                            
                            
                            

                            <?php
                            }

                            }
                            ?>
                            </select>
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Diposit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          
          
          <!--<a href="dashboard.php?id=28"></a>-->
          </figure>
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>DEPOSIT CASH</span></h3>
          
          </figcaption>
          <a style="color:Black;" data-toggle="modal" data-target="#my1"></a>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my1" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add cash</h4>
                            </div>
                            <div class="modal-body">
                            <form action="dipcash.php">
                            
                            <input class="form-control " name="dip" value="" type="text" placeholder="">
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Diposit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          
          
          <!--<a href="dashboard.php?id=28"></a>-->
          </figure>
          
          <figure class="snip1190" style="" >
          <img src="images/ss3.jpg" alt="sample64"/>
          <figcaption>
          
          <h3><span>WITHDRAW CASH</span></h3>
          
          </figcaption>
          <a style="color:Black;" data-toggle="modal" data-target="#my2"></a>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my2" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Add cash</h4>
                            </div>
                            <div class="modal-body">
                            <form action="withcash.php">
                            
                            <input class="form-control " name="dip" value="" type="text" placeholder="">
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Diposit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </form>
                            
                              
                            </div>
                            </div>
                            </div>
                          </div>
          
          
          
          <!--<a href="dashboard.php?id=28"></a>-->
          </figure>



            <?php


          }



          ?>

					
					</div>
					
				</div>
				</div>
				
				<!--//content-inner-->
			<!--/sidebar-menu-->
				
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>

<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering", 
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping", 
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
	
	<script src="js/menu_jquery.js"></script>
	
</body>
</html>
<?php } ?>