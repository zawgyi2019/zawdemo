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
		
	if(isset($_POST['edituser'])){
        $userid=$_POST['userid'];
        if(!empty($userid)){
            $_SESSION['empid']=$userid;
            header("Location:useredit.php");
        }
        else{
        	echo 'user is not set';
        	header("Location:userdetail.php");
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
		<div class="wrap" id="userdetail">
			<h1 class="title01">User</h1>
			<div class="main">
				<h2 class="title03">Employee Detail</h2>
				<form class="UserForm" method="post">
				<?php 
				include("connection.php");
				$uid = $_GET['id'];
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
						<?php echo '<p class="userData">'.$dusername.'</p>'; ?>
					</div>					
					<div class="userRow">
						<label>E-mail</label>
						<?php echo '<p class="userData">'.$dusermail.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Password</label>
						<?php echo '<p class="userData">'.$duserpw.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Date of Bath</label>
						<?php echo '<p class="userData">'.$duserdob.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Gender</label>
						<?php echo '<p class="userData">'.$dusergender.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Marital Status</label>
						<?php echo '<p class="userData">'.$dusermarital.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>NRC No</label>
						<?php echo '<p class="userData">'.$dusernrc.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Position</label>
						<?php echo '<p class="userData">'.$duserpos.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Phone No</label>
						<?php echo '<p class="userData">'.$duserph.'</p>'; ?>
					</div>
					<div class="userRow">
						<label>Address</label>
						<?php echo '<p class="userData">'.$duseraddress.'</p>'; ?>
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="edituser" value="Edit User" class="btn02">
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