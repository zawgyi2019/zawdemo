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
			<div class="wrap" id="invoice">
				<h1 class="title01">Invoice</h1>
				<div class="main">
					<h2 class="title03">Invoice List</h2>
					
				</div>
				<div class="invoiceBlog">
					<?php 
						include("connection.php");
						$inv=mysql_query("select * from invoice");
						
						if ($inv == '') {
							echo '<p class="alert">Do not Receive Invoice</p>';
						}
						else{
							
							echo'<table class="table">';
							?>
							<thead>
								<tr>
									<th>Inv. No</th>									
									<th>Receive</th>
									<th>Customer</th>
									<th>Food</th>
									<th>Amount</th>
									<th>Ord. No</th>
									<th>Start</th>
									<th>Detail</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									while($arr=mysql_fetch_array($inv))
									{	
								?>
								<tr>
									<td><?php echo $arr['invo_no']; ?></td>
									<td><?php echo $arr['invo_time']; ?></td>
									<td><?php echo $arr['cus_name']; ?></td>
									<td><?php echo $arr['food_name']; ?></td>
									<td><?php echo $arr['amount']; ?></td>
									<td><?php echo $arr['order_no']; ?></td>
									<td><?php echo $arr['order_time']; ?></td>
									<td><a href="invdetail.php?id=<?php echo $arr['order_no'];?>">Detail</a></td>
									<td><a href="deleteinv.php?id=<?php echo $arr['order_no'];?>">Delete</a></td>
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