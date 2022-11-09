<?php
session_start();
include("admin/connection.php");
	?>
<!DOCTYPE html>
<html lang="mm">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Peacock</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="" />
	<link rel="shortcut icon" href="img/logo.png">
	<link rel="stylesheet" type="text/css" href="style/slick.css">
	<link rel="stylesheet" type="text/css" href="style/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="style/aos.css">
	<link rel="stylesheet" type="text/css" href="style/base.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
</head>
<body id="top">
	<div id="header">
		<div class="topHeader">
			<a href="./" class="logoHeader"><img src="img/logo01.png" alt="logo01"></a>
			<div class="headerLeft">
				<?php 
				error_reporting(1);
				if($_SESSION['cstname']==""){ ?>
				<div class="headerCash">
					<img src="img/cash_r.png" alt="cash_r">
				</div>
					<?php }
					else{ ?>
				<a href="issue.php" class="headerCash">
					<img src="img/cash_r.png" alt="cash_r"><span><?php 
					if($_SESSION['ocount']=="") {
						echo "0";
					}
					else{
						echo $_SESSION['ocount'];
					}
					
					?></span>
				</a>
					<?php }?>
				
				<ul class="hamburgerMenu spOnly">
					<li class="line1"></li>
					<li class="line2"></li>
					<li class="line3"></li>
				</ul>
			</div>
		</div>
		<div class="mainHeader">
			<a href="index.php" class="logoHeader"><img src="img/logo02.png" alt="logo02"></a>
			<ul class="menu">
				<li><a href="./">Home</a></li>
				<li><a href="food.php">Food</a></li>			
				<li><a href="service.php">Service</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="about.php">About As</a></li>
				<li><?php 
				error_reporting(1);
				if($_SESSION['cstname']==""){ ?>
					<a href="login.php">Login</a>
					<?php }
					else{ 
					echo '<p>'. $_SESSION["cstname"].'</p><a href="logout.php">Logout</a>';
					 }?>
				</li>			
			</ul>
			<?php 
			error_reporting(1);
			if($_SESSION['cstname']==""){ ?>
				<div class="headerCash">
					<img src="img/cash_w.png" alt="cash_r">
				</div>
			<?php }
			else{ ?>
				<a href="issue.php" class="headerCash">
					<img src="img/cash_w.png" alt="cash_r"><span><?php 
					if($_SESSION['ocount']=="") {
						echo "0";
					}
					else{
						echo $_SESSION['ocount'];
					}
					
					?></span>
				</a>
			<?php }?>
		</div>
		<ul class="spNav">
			<li><a href="index.php">Home</a></li>
			<li><a href="food.php">Food</a></li>			
			<li><a href="service.php">Service</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="about.php">About As</a></li>
			<li><?php if($_SESSION['cstname']==""){ ?>
				<a href="login.php">Login</a>
				<?php }
				else{ 
				echo '<p>'. $_SESSION["cstname"].'</p><a href="logout.php">Logout</a>';
				 }?></li>			
		</ul>
	</div><!-- header -->