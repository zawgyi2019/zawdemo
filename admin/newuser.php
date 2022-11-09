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
	error_reporting(1);
	include("connection.php");
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
	$userid=$_POST['userid'];

	
	if($_POST['inputuser']){
		function checkemail($str) {
			     return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
			}
		if(!checkemail($email)){
		  $nameErr = "Your email is invalid";
		  echo "<script type='text/javascript'>alert('$nameErr');</script>";
		}
		else {
			$qry="INSERT INTO user(emp_ID,emp_name,emp_mail,emp_pw,emp_dob,emp_gender,emp_marital_status,emp_nrc,emp_pos,emp_ph,emp_address)VALUES('$userid','$username','$email','$password','$dob','$gender','$marital','$nrc','$position','$phone','$address')";
			$result=mysql_query($qry) or die ("save items query fail.");

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
		<div class="wrap" id="newuser">
			<h1 class="title01">User</h1>
			<div class="main">
				<h2 class="title03">News User</h2>
				<form class="UserForm" method="post">
					<?php 
						$_SESSION['userid']=$userid;
						$_SESSION['username']=$username;
						$_SESSION['usermail']=$email;
						$_SESSION['userpw']=$password;
						$_SESSION['userdob']=$dob;
						$_SESSION['gender']=$gender;
						$_SESSION['marital']=$marital;
						$_SESSION['usernrc']=$nrc;
						$_SESSION['position']=$position;
						$_SESSION['phno']=$phone;
						$_SESSION['address']=$address;

						$dusergend=$_SESSION['gender'];
						$marit=$_SESSION['marital'];
					?>					
					<div class="userRow">						
						<label>UserID*</label>
						<input type="text" name="userid" value="<?php echo $_SESSION['userid']; ?>" required="">
					</div>
					<div class="userRow">
						<label>User Name*</label>
						<input type="text" value="<?php echo $_SESSION['username']; ?>" name="username" required="">
					</div>					
					<div class="userRow">
						<label>E-mail*</label>
						<input type="mail" name="usermail"  value="<?php echo $_SESSION['usermail']; ?>"required="">
					</div>
					<div class="userRow">
						<label>Password*</label>
						<input type="password" name="userpw" value="<?php echo $_SESSION['userpw']; ?>" required="">
					</div>
					<div class="userRow">
						<label>Date of Bath</label>
						<input type="date"  value="<?php echo $_SESSION['userdob']; ?>"name="userdob" >
					</div>
					<div class="userRow">
						<label>Gender</label>
						<ul class="rdoBlog">
							<li><input type="radio" name="gender" value="Male" <?php if($dusergend!="Female"||$dusergend!="Other") {echo "checked"; }?>>Male</li>
							<li><input type="radio" name="gender" value="Female" <?php if($dusergend=="Female") {echo "checked"; }?>>Female</li>
							<li><input type="radio" name="gender" value="Other" <?php if($dusergend=="Other") {echo "checked"; }?>>Other</li>
						</ul>
					</div>
					<div class="userRow">
						<label>Marital Status</label>
						<ul class="rdoBlog">
							<li><input type="radio" name="marital" value="Single" <?php if($marit!="Married"||$marit!="Divorced"||$marit!="Separated"||$marit!="Widowed") {echo "checked"; }?>>Single</li>
							<li><input type="radio" name="marital" value="Married" <?php if($marit=="Married") {echo "checked"; }?>>Married</li>
							<li><input type="radio" name="marital" value="Divorced" <?php if($marit=="Divorced") {echo "checked"; }?>>Divorced</li>
							<li><input type="radio" name="marital" value="Separated" <?php if($marit=="Separated") {echo "checked"; }?>>Separated</li>
							<li><input type="radio" name="marital" value="Widowed" <?php if($marit=="Widowed") {echo "checked"; }?>>Widowed</li>
						</ul>
					</div>
					<div class="userRow">
						<label>NRC No</label>
						<input type="text" name="usernrc" value="<?php echo $_SESSION['usernrc']; ?>">
					</div>
					<div class="userRow">
						<label>Position*</label>
						<input type="text" name="position" value="<?php echo $_SESSION['position']; ?>" required="">
					</div>
					<div class="userRow">
						<label>Phone No</label>
						<input type="text" name="phno" value="<?php echo $_SESSION['phno']; ?>">
					</div>
					<div class="userRow">
						<label>Address</label>
						<textarea name="address"><?php echo $_SESSION['address']; ?></textarea>
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="inputuser" value="Add USer" class="btn02">
						<a href="user.php" class="btn02">Back</a>
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