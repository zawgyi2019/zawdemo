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
		
	if(isset($_POST['editcustomer'])){
        $userid=$_POST['cusid'];
        if(!empty($userid)){
            $_SESSION['cusid']=$userid;
            header("Location:customeredit.php");
        }
        else{
        	echo 'user is not set';
        	header("Location:cusdetail.php");
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
		<div class="wrap" id="cusdetail">
			<h1 class="title01">Customer</h1>
			<div class="main">
				<h2 class="title03">Customer Detail</h2>
				<form class="UserForm" method="post">
				<?php 
				include("connection.php");
				$custid = $_GET['id'];
				$custdetail=mysql_query("select * from customer where cus_ID='$custid'");
				$arr=mysql_fetch_array($custdetail);

				$customerid = $arr['cus_ID'];
				$customername = $arr['cus_name'];
				$customermail = $arr['cus_mail'];
				$customerpw = $arr['cus_pw'];
				$customergender = $arr['cus_gen'];
				$customerph = $arr['cus_ph'];
				$customeraddress= $arr['cus_address'];

				
				 ?>					
					<div class="userRow">						
						<label>Customer ID</label>
						<input type="hidden" name="cusid" value="<?php echo $customerid; ?>">
						<?php echo '<p class="userData">'.$customerid.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Customer Name</label>
						<?php echo '<p class="userData">'.$customername.'</p>'; ?>
					</div>					
					<div class="userRow">
						<label>E-mail</label>
						<?php echo '<p class="userData">'.$customermail.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Password</label>
						<?php echo '<p class="userData">'.$customerpw.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Gender</label>
						<?php echo '<p class="userData">'.$customergender.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Phone No</label>
						<?php echo '<p class="userData">'.$customerph.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Address</label>
						<?php echo '<p class="userData">'.$customeraddress.'</p>'; ?>
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="editcustomer" value="Edit" class="btn02">
						<a href="customer.php" class="btn02">Back</a>
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