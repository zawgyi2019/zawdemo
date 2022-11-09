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
		
	if(isset($_POST['editorder'])){
        $orderno=$_POST['ono'];
        if(!empty($orderno)){
            $_SESSION['ono']=$orderno;
            header("Location:editorder.php");
        }
        else{
        	echo 'user is not set';
        	header("Location:orderdetail.php");
        }
    }
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
		<div class="wrap" id="orderDetail">
			<h1 class="title01">Order</h1>
			<div class="main">
				<h2 class="title03">Order Detail</h2>
				<form class="orderForm" method="post">
				<?php 
				include("connection.php");
				$oid = $_GET['id'];
				$orderdetail=mysql_query("select * from order1 where order_no='$oid'");
				$arr=mysql_fetch_array($orderdetail);

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
				$food=mysql_query("select * from product where food_ID='$foodid'");
				$fo=mysql_fetch_array($food);
				$fname = $fo['food_name'];				
				
				 ?>					
					<div class="orderRow">						
						<label>Order No</label>
						<input type="hidden" name="ono" value="<?php echo $ono; ?>">
						<?php echo '<p class="userData">'.$ono.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Customer Name</label>
						<?php echo '<p class="userData">'.$cname.'</p>'; ?>
					</div>	
					<div class="orderRow">
						<label>Food Name</label>
						<?php echo '<p class="userData">'.$fname.'</p>'; ?>
					</div>					
					<div class="orderRow">
						<label>Price</label>
						<?php echo '<p class="userData">'.$price.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Amount</label>
						<?php echo '<p class="userData">'.$amount.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>Total</label>
						<?php echo '<p class="userData">'.$total.'</p>'; ?>
					</div>
					<div class="orderRow">
						<label>payment Method</label>
						<?php echo '<p class="userData">'.$paymth.'</p>'; ?>
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
						<?php echo '<p class="userData">'.$cond.'</p>'; ?>
					</div>
					<div class="orderBtn">
						<a href="<?php if($cond=="pending")
						{
							echo "receive.php?id=".$oid;
						}
						else{ 
							echo "invdetail.php?id=".$oid;
						} ?>" class="btn02">Invoice</a>
						<input type="submit" name="editorder" value="Edit Order" class="btn02">
						<a href="deleteorder.php?id=<?php echo $oid;?>" class="btn02">Delete</a>
						<a href="order.php" class="btn02">Back</a>
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