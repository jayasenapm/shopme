<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Insert title here</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<br>
	<section class="container">

			<?php

			if(isset($_GET['msg'])){
				?>
				<div class="alert alert-danger" role="alert">
					<h3>you're password or username is missing try again</h3>
  					
				</div>
				<?php
			}

			if(isset($_GET['ex'])){
				?>
				<div class="alert alert-danger" role="alert">
					<h3>Your system date is expired please contact provider</h3>
  					
				</div>
				<?php
			}

			?>
			<section class="login-form">
				<form method="post" action="login.php" role="login">
					<img src="assets/images/logo.png" class="img-responsive" alt="" />
					<input type="text" name="name" placeholder="User Name" required class="form-control input-lg" />
					<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
					<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
					<div>
						
					</div>
				</form>
				<div class="form-links">
					<a href="#"></a>
				</div>
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>