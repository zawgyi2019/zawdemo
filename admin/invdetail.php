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
		<div class="wrap" id="invdetail">
			<h1 class="title01">Invoice</h1>
			<div class="main">
				<h2 class="title03">Invoice Detail</h2>
				<form class="invoiceForm" method="post">
				<?php 
				include("connection.php");
				$ono = $_GET['id'];
				$invoice=mysql_query("select * from invoice where order_no='$ono'");
				$inv=mysql_fetch_array($invoice);				
				 ?>					
					<div class="invoiceRow">						
						<label>Inv. No</label>
						<input type="hidden" name="invno" value="<?php echo $inv['invo_no']; ?>">
						<?php echo '<p class="userData">'.$inv['invo_no'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Received</label>
						<?php echo '<p class="userData">'.$inv['invo_time'].'</p>'; ?>
					</div>					
					<div class="invoiceRow">
						<label>Customer</label>
						<?php echo '<p class="userData">'.$inv['cus_name'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Food</label>
						<?php echo '<p class="userData">'.$inv['food_name'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Price</label>
						<?php echo '<p class="userData">'.$inv['price'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Amount</label>
						<?php echo '<p class="userData">'.$inv['amount'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Total</label>
						<?php echo '<p class="userData">'.$inv['total_cost'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Payment Method</label>
						<?php echo '<p class="userData">'.$inv['payment_method'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Order No</label>
						<?php echo '<p class="userData">'.$inv['order_no'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Start</label>
						<?php echo '<p class="userData">'.$inv['order_time'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Phone No.</label>
						<?php echo '<p class="userData">'.$inv['cus_ph'].'</p>'; ?>
					</div>
					<div class="invoiceRow">
						<label>Address</label>
						<?php echo '<p class="userData">'.$inv['cus_address'].'</p>'; ?>
					</div>
					<div class="invoiceFormBtn">
						<a href="pdf/voucher.php?id=<?php echo $inv['invo_no'];?>" class="btn02" target="_blank">Print</a>
						<a href="invoice.php" class="btn02">Back</a>
					</div>						
				</form>
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