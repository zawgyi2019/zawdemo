<?php
session_start();
include("connection.php");
if($_SESSION['ssname']=="")
{
	header('location:index.php');
}
else{
?>
<?php
	if(isset($_POST['saveOrder'])){
		$ordno=$_POST['ordno'];		
		$fid=$_POST['foodid'];
		$oprice=$_POST['price'];
		$oamount=$_POST['amt'];
		$tot=$_POST['tot'];
		$opay=$_POST['paymethod'];
		$ocond=$_POST['cond'];
		echo $ordno.",".$fid.",".$oprice.",".$oamount.",".$tot.",".$opay.",".$ocond;

		$userqry="UPDATE order1 SET food_ids = '$fid', price = '$oprice', tot_amt = '$oamount', tot_cost = '$tot', pay_mth = '$opay', cond = '$ocond' WHERE order_no = '$ordno'";
		 	$result=mysql_query($userqry) or die ("save items query fail.");

		header('location:orderdetail.php?id='.$ordno);
	}  
	mysql_close($con);
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
		<div class="wrap" id="editorder">
			<h1 class="title01">Order</h1>
			<div class="main">
				<h2 class="title03">Edit Order</h2>
				<form class="orderForm" method="post">
				<?php 
				include("connection.php");
				$orderno =  $_SESSION['ono'];
				$odetail=mysql_query("select * from order1 where order_no='$orderno'");
				$arr=mysql_fetch_array($odetail);

				$ono = $arr['order_no'];
				$price = $arr['price'];
				$amount = $arr['tot_amt'];
				$total= $arr['tot_cost'];
				$paymth = $arr['pay_mth'];
				$time = $arr['order_time'];
				$ph = $arr['cus_ph'];
				$address= $arr['cus_address'];
				$cond= $arr['cond'];

				$custid=$arr['cus_ids'];
				$customer=mysql_query("select * from customer where cus_id='$custid'");
				$cust=mysql_fetch_array($customer);
				$cname = $cust['cus_name'];

				$foodid=$arr['food_ids'];
				
				 ?>								
					<div class="orderRow">						
						<label>Order No</label>
						<input type="hidden" name="ordno" value="<?php echo $ono; ?>">
						<?php echo '<p class="userData">'.$ono.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Customer Name</label>
						<?php echo '<p class="userData">'.$cname.'</p>'; ?>
					</div>	
					<div class="orderRow">
						<label>Food Name</label>
						<select id="food">
							<?php 
								$pd=mysql_query("select * from product");
								while($row = mysql_fetch_array($pd)){;
									?>
									<option value="<?php echo $row[0];?>"  data-othervalue="<?php echo $row[4];?>" <?php if($row[0] == $foodid) {echo "selected"; }?>><?php echo $row[1];?></option>
							<?php }?>
						</select>
						<input type="hidden" name="foodid" value="<?php echo $foodid; ?>" id="foodval">
					</div>					
					<div class="orderRow">
						<label>Price</label>
						<input type="text" name="price" value="<?php echo $price; ?>" id="price" readonly>
						
					</div>
					<div class="orderRow">
						<label>Amount</label>
						<input type="number" name="amt" value="<?php echo $amount; ?>" id="amt">
					</div>					
					<div class="orderRow">
						<label>Total</label>
						<input type="mail" name="tot" value="<?php echo $total; ?>" id="total" readonly>
					</div>
					<div class="orderRow">
						<label>Payment Method</label>
						<select name="paymethod">
							<option value="Cash" <?php if($paymth=="Cash") {echo "selected"; }?>>Cash</option>
							<option value="VISA" <?php if($paymth=="VISA") {echo "selected"; }?>>VISA</option>	
							<option value="Master" <?php if($paymth=="Master") {echo "selected"; }?>>Master</option>
							<option value="WavePay" <?php if($paymth=="WavePay") {echo "selected"; }?>>WavePay</option>
							<option value="KPay" <?php if($paymth=="KPay") {echo "selected"; }?>>KPay</option>
							<option value="AyaPay" <?php if($paymth=="AyaPay") {echo "selected"; }?>>AyaPay</option>
							<option value="WavePay" <?php if($paymth=="WavePay") {echo "selected"; }?>>CBPay</option>
							<option value="KPay" <?php if($paymth=="KPay") {echo "selected"; }?>>AGDPay</option>
							<option value="AyaPay" <?php if($paymth=="AyaPay") {echo "selected"; }?>>OnePay</option>
						</select>
					</div>
					<div class="orderRow">
						<label>Time</label>
						<?php echo '<p class="userData">'.$time.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Phone No</label>
						<?php echo '<p class="userData">'.$ph.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Address</label>
						<?php echo '<p class="userData">'.$address.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Condition</label>
						<select name="cond">
							<option value="received" <?php if($cond=="received") {echo "selected"; }?>>Received</option>
							<option value="pending" <?php if($cond=="pending") {echo "selected"; }?>>Pending</option>
						</select>
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="saveOrder" value="Save" class="btn02">
						<a href="orderdetail.php?id=<?php echo $orderno;?>" class="btn02">Back</a>
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