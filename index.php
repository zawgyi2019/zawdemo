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
			<a href="./" class="logoHeader"><img src="img/logo02.png" alt="logo02"></a>
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
			<li><a href="./">Home</a></li>
			<li><a href="food.php">Food</a></li>			
			<li><a href="service.php">Service</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="about.php">About As</a></li>
			<li><?php if($_SESSION['cstname']==""){ ?>
				<a href="login.php">Login</a>
				<?php }
				else{ 
				echo '<p>'. $_SESSION["cstname"].'</p><a href="logout.php">Logout</a>';
				 }?>
			</li>			
		</ul>
	</div><!-- header -->
	<div id="container">
		<ul class="slider">
			<li><img src="img/slide01.png" alt="slide01"></li>
			<li><img src="img/slide02.png" alt="slide01"></li>
			<li><img src="img/slide03.png" alt="slide01"></li>
			<li><img src="img/slide04.png" alt="slide01"></li>
			<li><img src="img/slide05.png" alt="slide01"></li>
		</ul>
		<div id="wrapper">
			<div class="topBlog">
				<div class="subBlog" data-aos="fade-down" data-aos-duration="500" data-aos-delay="300">
					<img src="img/img01.png" alt="img01">
					<h2>Fast Delivery</h2>
					<p>Depending on your area and local restaurant hours, we begin delivering as early as 7am and run as late as 2am. If a particular restaurant is not available for delivery, you will see it marked as “Closed”.</p>
				</div>
				<div class="subBlog" data-aos="zoom-in-up" data-aos-duration="500" data-aos-delay="300">
					<img src="img/img02.png" alt="img02">
					<h2>Many Food</h2>
					<p>Feed your cravings with your favorite foods delivered to you, wherever you are.From small bites to big meals, we won’t limit your cravings. Go ahead and order what you want.</p>
				</div>
				<div class="subBlog" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
					<img src="img/img03.png" alt="img03">
					<h2>Satisfication</h2>
					<p>Full amount in cash must be paid to delivery-partner. Although our delivery-partners do carry some change, it is appreciated if you also have some change onhand.</p>
				</div>
			</div>
		
			<div class="catBlog">
				<div class="catBar">
					<h2 data-aos="zoom-in" data-aos-duration="500">Hey! You can choose food category .</h2>
				</div>				
				<ul class="catItem">
					<?php
					$cate=mysql_query("select * from category");
							
					if ($cate == 0) {
						echo '<p class="alert">Category are not avaliable</p>';
					}
					else{
						$i=0;
						while($arr=mysql_fetch_array($cate))
						{
							$showimg=$arr['catimg'];
						?>							
					<li>
						<a href="category.php?id=<?php echo $arr['catID'];?>">
							<img src="admin/food/<?php if($showimg!=""){echo $arr['catimg'];}else{echo 'no_img.png';}  ?>">
							<p><?php echo $arr['catname']; ?></p>
						</a>
					</li>
					<?php 
							$i++;
						}
					} 
					?>
				</ul>
				<div class="catBlogBrn">
					<a href="food.php" class="btn01">Show Foods</a>
				</div>
			</div>
			<div class="manualBlog">
				<div class="userManual" data-aos="flip-right" data-aos-duration="500">
					<h2>User Manual</h2>
					<p>You Must be login to Order and Purchase. You may use satify your user name. And than strong password given to you. So you must be use satification our syatem. </p>
					<a href="Service.php">Service</a>
				</div>
			</div>
			<div class="locationBlog">
				<div class="maps">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.3924603849455!2d96.12137481434638!3d16.8564695223374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194ca1ca6955b%3A0x9655fbed55d4e9c!2sInsein%20Rd%2C%20Yangon!5e0!3m2!1sen!2smm!4v1602347087375!5m2!1sen!2smm"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="ourLocation">
					<h2 class="title01">Our Location</h2>
					<p>No. 233-B, Second Floor, Insein Road.<br>
						Hlaing Township. Yangon<br>
						Phone: <a href="tel:09694380024">09694380024</a>, <a href="tel:09543821155">09438557155</a><br>
					email: <a href="mailto:peacook2020@gmail.com">peacook2020@gmail.com</a>
					</p>
					<div class="locationBlogBtn">
						<a href="contact.php" class="btn01">Contact</a>
					</div>
				</div>
			</div>
		</div><!-- wrapper -->
	</div><!-- content -->
	<div id="footer">
		<div id="pageTop">
	        <a href="#top"><img src="img/pg_top.png" alt="pg_top"></a>
	    </div>
		<div class="footerTop">
			<ul class="footerMenu">
				<li><a href="./">Home</a></li>
				<li><a href="food.php">Food</a></li>
				<li><a href="service.php">Service</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="about.php">About As</a></li>
			</ul>
		</div>
		<div class="footerMiddle">
			<div class="footerLogo">
				<a href="./"><img src="img/logo01.png" alt="logo01"></a>				
			</div>
			<div class="footerMiddleblog">
				<ul class="social">
					<li><a href="#"><img src="img/fb_logo.png" alt="fb_logo"></a></li>
					<li><a href="#"><img src="img/twitter_logo.png" alt="twitter_logo"></a></li>
					<li><a href="#"><img src="img/instargram_logo.png" alt="instargram_logo"></a></li>
					<li><a href="#"><img src="img/linkin_logo.png" alt="linkin_logo"></a></li>
					<li><a href="#"><img src="img/youyube_logo.png" alt="youyube_logo"></a></li>
				</ul>
				<p>To Contact : <a href="tel:09694380024">09694380024</a>, <a href="tel:09543821155">09543821155</a></p>
			</div>
		</div>
		<p class="ft">copyriaght&copy;2020 Peacook Food Delivery</p>
	</div><!-- footer -->
	
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/other.js"></script>
</body>
</html>