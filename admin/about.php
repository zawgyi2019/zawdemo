<?php
session_start();
include("connection.php");
if($_SESSION['ssname']=="")
{
	header('location:index.php');
}
else{
	?>
	<!DOCTYPE html>
	<html lang="mm">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Peacook</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="" />
		<link rel="shortcut icon" href="img/logo.png">
		<link rel="stylesheet" type="text/css" href="style/slick.css">
		<link rel="stylesheet" type="text/css" href="style/slick-theme.css">
		<link rel="stylesheet" type="text/css" href="style/base.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>

		<div id="wrapper">
			<div id="sidebar">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="wrap" id="about">
				<h1 class="title01">Contact</h1>
		<div class="aboutBlog">
			<h2 class="title03">OUR MISSION</h2>
			<p>Bringing good food into your everyday. That's our mission.</p>
			<p>That means we don't just deliver--we bring it, always going the extra mile to make your experience memorable.</p>
			<p>And it means this is delicious food you can enjoy everyday: from vibrant salads for healthy office lunches, to indulgent family-sized pizzas, to fresh sushi for a romantic night in. Whatever you crave, we can help.</p>
		</div>
		<figure class="aboutImg">
			<img src="img/about01.png" alt="about01">
		</figure>
		<div class="aboutBlog">
			<h2 class="title03">Business models of food ordering platforms can vary according to the project aims and requirements.
			</h2>
			<p>Business models of food ordering platforms can vary according to the project aims and requirements.
			</p>
			<p>Your food delivery service can be local or worldwide. According to McKinsey&Company, the worldwide food delivery market stands for €83 billion, so it takes only 1% of the total turnover. Such services as UberEats or Delivery.com can be called worldwide because they operate across several countries.</p>
			<p>On the other hand, there is a local or traditional model. It stands for common food delivery from nearby places. A lot of restaurants, especially in urban areas, now offer delivery. So local food delivery service usually works only within one country or even city.
			</p>
			<p>Food delivery gives many opportunities to start your own business. How to make a food delivery website? First of all, you need to choose an appropriate business model.</p>
		</div>
		<div class="aboutlogo">
			<img src="img/main_logo01.png" alt="logo">
		</div>
			</div>
		</div><!-- wrapper -->
		<div id="footer">
			<div class="footerInner">
				<p>copyriaght&copy; 2020 Peacook Food Delivery</p>
				<a href="\."><img src="img/main_logo02.png" alt="main_logo02"></a>
			</div>
		</div><!-- footer -->
	<?php }  ?>
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/other.js"></script>
</body>
</html>