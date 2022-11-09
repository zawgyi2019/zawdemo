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
	if(isset($_POST['saveuser'])){
		$email=$_POST['usermail'];
		function checkemail($str) {
			     return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
			}
		if(!checkemail($email)){
		  $nameErr = "Your email is invalid";
		  echo "<script type='text/javascript'>alert('$nameErr');</script>";
		}
		else {
		$userid=$_POST['userid'];
		$username=$_POST['username'];
		$email=$_POST['usermail'];
		$password=$_POST['userpw'];
		$dob=$_POST['userdob'];
		$gender=$_POST['gender'];
		$marital=$_POST['marital'];
		$nrc=$_POST['usernrc'];
		$position=$_POST['position'];
		$phone=$_POST['phno'];
		$address=$_POST['address'];

		$userqry="UPDATE user SET emp_name = '$username', emp_mail = '$email', emp_pw = '$password', emp_dob = '$dob', emp_gender = '$gender', emp_marital_status = '$marital', emp_nrc = '$nrc', emp_pos = '$position', emp_ph = '$phone', emp_address = '$address' WHERE emp_ID = '$userid'";
		 	$result=mysql_query($userqry) or die ("save items query fail.");

		header('location:user.php');
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
		<div class="wrap" id="edituser">
			<h1 class="title01">User</h1>
			<div class="main">
				<h2 class="title03">Edit Employee</h2>
				<form class="UserForm" method="post">
				<?php 
				include("connection.php");
				$uid =  $_SESSION['empid'];
				$userdetail=mysql_query("select * from user where emp_ID='$uid'");
				$arr=mysql_fetch_array($userdetail);

				$duserid = $arr['emp_ID'];
				$dusername = $arr['emp_name'];
				$dusermail = $arr['emp_mail'];
				$duserpw = $arr['emp_pw'];
				$duserdob= $arr['emp_dob'];
				$dusergender = $arr['emp_gender'];
				$dusermarital = $arr['emp_marital_status'];
				$dusernrc = $arr['emp_nrc'];
				$duserpos= $arr['emp_pos'];
				$duserph = $arr['emp_ph'];
				$duseraddress= $arr['emp_address'];

				
				 ?>								
					<div class="userRow">						
						<label>UserID</label>
						<input type="hidden" name="userid" value="<?php echo $duserid; ?>">
						<?php echo '<p class="userData">'.$duserid.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>User Name</label>
						<input type="text" name="username" value="<?php echo $dusername; ?>">
					</div>					
					<div class="userRow">
						<label>E-mail</label>
						<input type="mail" name="usermail" value="<?php echo $dusermail; ?>">
					</div>
					<div class="userRow">
						<label>Password</label>
						<input type="password" name="userpw" value="<?php echo $duserpw; ?>">
					</div>
					<div class="userRow">
						<label>Date of Bath</label>
						<input type="date" name="userdob" value="<?php echo $duserdob; ?>">
					</div>
					<div class="userRow">
						<label>Gender</label>
						<ul class="rdoBlog">
							<li><input type="radio" name="gender" value="Male" <?php if($dusergender=="Male") {echo "checked"; }?>>Male</li>
							<li><input type="radio" name="gender" value="Female" <?php if($dusergender=="Female") {echo "checked"; }?>>Female</li>
							<li><input type="radio" name="gender" value="Other" <?php if($dusergender=="Other") {echo "checked"; }?>>Other</li>
						</ul>
					</div>
					<div class="userRow">
						<label>Marital Status</label>
						<ul class="rdoBlog">
							<li><input type="radio" name="marital" value="Single" <?php if($dusermarital=="Single") {echo "checked"; }?>>Single</li>
							<li><input type="radio" name="marital" value="Married" <?php if($dusermarital=="Married") {echo "checked"; }?>>Married</li>
							<li><input type="radio" name="marital" value="Divorced" <?php if($dusermarital=="Divorced") {echo "checked"; }?>>Divorced</li>
							<li><input type="radio" name="marital" value="Separated" <?php if($dusermarital=="Separated") {echo "checked"; }?>>Separated</li>
							<li><input type="radio" name="marital" value="Widowed" <?php if($dusermarital=="Widowed") {echo "checked"; }?>>Widowed</li>
						</ul>
					</div>
					<div class="userRow">
						<label>NRC No</label>
						<input type="text" name="usernrc" value="<?php echo $dusernrc; ?>">
					</div>
					<div class="userRow">
						<label>Position</label>
						<input type="text" name="position" value="<?php echo $duserpos; ?>">
					</div>
					<div class="userRow">
						<label>Phone No</label>
						<input type="text" name="phno" value="<?php echo $duserph; ?>">
					</div>
					<div class="userRow">
						<label>Address</label>
						<textarea name="address"> <?php echo $duseraddress; ?></textarea>
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="saveuser" value="Save" class="btn02">
						<a href="userdetail.php?id=<?php echo $uid;?>" class="btn02">Back</a>
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