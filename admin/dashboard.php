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
			<div class="wrap" id="dashboard">
				<h1 class="title01">Dashboard</h1>
				<div class="main">
					<div class="bannerImg">
						<img src="img/admin_banner01.png" alt="admin_banner01">
					</div>
					<h2 class="title02">Welcome Our Dashboard</h2>
					<div class="dashboardBlog">
						<p>Let your dashboard do the work; we got it ready!<br>
 Your driver won’t miss an order with the push notifications sent by the system.</p>
					</div>
					<h2 class="title02">Latest Food</h2>
					<div class="foodBlogWrap">
						<?php $product=mysql_query("select * from product ORDER BY food_ID DESC ");
						
						if ($product == 0) {
							echo '<p class="alert">product are not avaliable</p>';
						}
						else{
							echo'<ul class="footItemBlog">';
							$n=0;
							while($n<3)
							{
								$arr=mysql_fetch_array($product);
								$foodimg = $arr['food_img'];
								$foodID = $arr['food_ID'];

								
								?>
								<li>
								<img src="<?php echo 'food/'.$foodimg; ?>" alt="<?php echo $foodimg; ?>">								
								<p><?php echo $arr['food_name']; ?></p>
								<p><?php echo  $arr['price']; ?>　Kyats</p>
								</li>
								<?php
								
								$n++;

							}
							echo "</ul>";

						} ?>
						<a href="food.php" class="btn01">Show Food</a>
					</div>
					<h2 class="title02">Latest Order</h2>
					<div class="orderDashboard">
						<?php 
						$choo = 'pending';
						$order=mysql_query("select * from order1 where cond='$choo' ORDER BY order_no DESC");
						
						if ($order == 0) {
							echo '<p class="alert">Order are not avaliable</p>';
						}
						else{
							echo'<ul class="orderItem">';
							$n=0;
							while($n<3)
							{
								$ord=mysql_fetch_array($order);
								$ono = $ord['order_no'];
								$custid=$ord['cus_ids'];
								$customer=mysql_query("select * from customer where cus_id='$custid'");
								$cust=mysql_fetch_array($customer);
								$cname = $cust['cus_name'];								
								?>
								<li>
									<a href="orderdetail.php?id=<?php echo $ono;?>">
										<p><?php echo $ord['order_time']; ?></p>							
										<p><?php echo $cname; ?></p>
										<p><?php echo  $ord['cus_address']; ?></p>
										<p><?php echo  $ord['cus_ph']; ?></p>
										<span>
											<img src="img/carlogo.png" alt="carlogo">
										</span>										
									</a>
								</li>
								<?php
								
								$n++;

							}
							echo "</ul>";

						} ?>
					</div>
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