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
	if(isset($_POST['saveCustomer'])){
		$email=$_POST['cstmail'];
		function checkemail($str) {
			     return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
			}
		if(!checkemail($email)){
		  $nameErr = "Your email is invalid";
		  echo "<script type='text/javascript'>alert('$nameErr');</script>";
		}
		else {
		$cstid=$_POST['cstid'];
		$cstname=$_POST['cstname'];
		$cstmail=$_POST['cstmail'];
		$cstpw=$_POST['cstpw'];
		$cstgender=$_POST['gender'];
		$cstphone=$_POST['cstphno'];
		$cstaddress=$_POST['cstaddress'];

		$userqry="UPDATE customer SET cus_name = '$cstname', cus_mail = '$cstmail', cus_pw = '$cstpw', cus_gen = '$cstgender', cus_ph = '$cstphone', cus_address = '$cstaddress' WHERE cus_ID = '$cstid'";
		 	$result=mysql_query($userqry) or die ("save items query fail.");

		header('location:customer.php');
	}
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
		<div class="wrap" id="editcustomer">
			<h1 class="title01">Customer</h1>
			<div class="main">
				<h2 class="title03">Customer Edit</h2>
				<form class="UserForm" method="post">
				<?php 
				include("connection.php");
				$customerid =  $_SESSION['cusid'];
				$cusdetail=mysql_query("select * from customer where cus_ID='$customerid'");
				$arr=mysql_fetch_array($cusdetail);

				$cusid = $arr['cus_ID'];
				$cusname = $arr['cus_name'];
				$cusmail = $arr['cus_mail'];
				$cuspw = $arr['cus_pw'];
				$cusgender = $arr['cus_gen'];
				$cusph = $arr['cus_ph'];
				$cusaddress= $arr['cus_address'];

				
				 ?>								
					<div class="userRow">						
						<label>UserID</label>
						<input type="hidden" name="cstid" value="<?php echo $cusid; ?>">
						<?php echo '<p class="userData">'.$cusid.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>User Name</label>
						<input type="text" name="cstname" value="<?php echo $cusname; ?>">
					</div>					
					<div class="userRow">
						<label>E-mail</label>
						<input type="mail" name="cstmail" value="<?php echo $cusmail; ?>">
					</div>
					<div class="userRow">
						<label>Password</label>
						<input type="password" name="cstpw" value="<?php echo $cuspw; ?>">
					</div>
					<div class="userRow">
						<label>Gender</label>
						<ul class="rdoBlog">
							<li><input type="radio" name="gender" value="Male" <?php if($cusgender=="Male") {echo "checked"; }?>>Male</li>
							<li><input type="radio" name="gender" value="Female" <?php if($cusgender=="Female") {echo "checked"; }?>>Female</li>
							<li><input type="radio" name="gender" value="Other" <?php if($cusgender=="Other") {echo "checked"; }?>>Other</li>
						</ul>
					</div>
					<div class="userRow">
						<label>Phone No</label>
						<input type="text" name="cstphno" value="<?php echo $cusph; ?>">
					</div>
					<div class="userRow">
						<label>Address</label>
						<textarea name="cstaddress"> <?php echo $cusaddress; ?></textarea>
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="saveCustomer" value="Save" class="btn02">
						<a href="cusdetail.php?id=<?php echo $cusid;?>" class="btn02">Back</a>
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