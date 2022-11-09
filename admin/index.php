<?php
session_start();
error_reporting(1);
include("connection.php");

if(isset($_POST['login'])){ 
	if($_POST['name']==""){ 
		echo '<script>alert("Fill your Name.")</script>';
	}
	elseif($_POST['pwd']==""){
		echo '<script>alert("Fill your Password.")</script>';
	}
	else {
		$d=mysql_query("select * from user where emp_name='{$_POST['name']}' ");
		$row=mysql_fetch_object($d);
		$empName=$row->emp_name;
		$empPw=$row->emp_pw; 
		if($empName==$_POST['name'] && $empPw==$_POST['pwd']){
			$_SESSION['ssname']=$_POST['name'];
			header('location:dashboard.php'); }
		else { 
			$er="your account is unvalid."; 
			echo '<script>alert("Your account is unvalid.")</script>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
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
	<div id="container">
		<div class="loginWrap">
			<img src="img/main_logo01.png">
			<form method="post" action="index.php">
				<label>Username</label>
				<input type="text" name="name" class="textbox" value="<?php echo $_SESSION['ssname']; ?>">
				<label>Password</label>
				<input type="password" name="pwd" class="textbox">
				<input type="submit" name="login" value="Login" class="btn01">
				<a href="../contact.php#mail">Forgot Password?</a>
			</form>
		</div>
	</div><!-- container -->
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/other.js"></script>
</body>
</html>