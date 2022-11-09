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
			<div class="wrap" id="order">
				<h1 class="title01">Order</h1>
				<div class="main">
					<h2 class="title03">Order List</h2>
					
				</div>
				<div class="orderBlog">
					<?php 
						include("connection.php");
						$order=mysql_query("select * from order1");
						
						if ($order == '') {
							echo '<p class="alert">Do not Receive Order</p>';
						}
						else{
							
							echo'<table class="table">';
							?>
							<thead>
								<tr>
									<th>Order No</th>
									<th>Customer</th>
									<th>Food</th>
									<th>Time</th>
									<th>Address</th>
									<th>Condition</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									while($arr=mysql_fetch_array($order))
									{	

									$custid=$arr['cus_ids'];
									$customer=mysql_query("select * from customer where cus_id='$custid'");
									$cust=mysql_fetch_array($customer);
									$cname = $cust['cus_name'];

									$foodid=$arr['food_ids'];
									$food=mysql_query("select * from product where food_ID='$foodid'");
									$fo=mysql_fetch_array($food);
									$fname = $fo['food_name'];
								?>
								<tr>
									<td><?php echo $arr['order_no']; ?></td>
									<td><?php echo $cname; ?></td>
									<td><?php echo $fname; ?></td>
									<td><?php echo $arr['order_time']; ?></td>
									<td><?php echo $arr['cus_address']; ?></td>
									<td style="<?php if($arr['cond']=='pending'){
										echo 'color: #f00;';
									}else{ echo 'color: #008000;'; } ?>"><?php echo $arr['cond']; ?></td>
									<td><a href="orderdetail.php?id=<?php echo $arr['order_no'];?>">Detail</a></td>
								</tr>
							<?php
								$i++;
							 }
							echo "</tbody>";
						echo "</table>";
						}
						?>
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