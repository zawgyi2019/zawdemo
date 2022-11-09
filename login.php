<?php 
include("header.php"); 
if(isset($_POST['cuslogin']))
{ 
	if($_POST['custname']=="") { 
		echo '<script>alert("Fill your Name.")</script>';
	}
	elseif($_POST['custpass']=="") { 
		echo '<script>alert("Fill your Password.")</script>';
	}
	else{
	// error_reporting(1);
	$c=mysql_query("select * from customer where cus_name='{$_POST['custname']}' ");
	$crow=mysql_fetch_object($c);
	$custName=$crow->cus_name;
	$cusPw=$crow->cus_pw; 
	if($custName==$_POST['custname'] && $cusPw==$_POST['custpass']){
		$_SESSION['cstname']=$_POST['custname'];
		header('location:index.php'); }
	else { 

		$er=" your your account is unvalid."; 
		echo '<script>alert("Your account is unvalid.")</script>';
		}
	}
}
?>
<div id="container" class="login">
	<div id="wrapper">
		<div class="loginWrap">
			 <img src="img/login01.png" alt="login01">
			 <form method="post" class="loginForm">
			 	<h1 class="title01">Login</h1>
			 	<div class="row">
			 		<label>Username</label>
			 		<input type="text" name="custname">
			 	</div>
			 	<div class="row">
			 		<label>Password</label>
			 		<input type="Password" name="custpass">
			 	</div>
			 	<div class="rowBtn">
			 		<input type="submit" name="cuslogin" value="login" class="btn01">
			 	</div>
			 	<div class="rowText">
			 		<a href="contact.php#mail">Remember Password</a>
			 		<a href="registration.php">User Register Form</a>
			 	</div>
			 </form>
		</div>
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
include("footer.php"); 
?>