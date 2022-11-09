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
			<div class="wrap" id="user">
				<h1 class="title01">User</h1>
				<div class="main">
					<h2 class="title03">Employee</h2>
					<div class="UserBtnBlog">
						<a href="newuser.php" class="btn01">New Employee</a>
					</div>
				</div>
				<div class="userBlog">
					<?php 
						include("connection.php");
						$user=mysql_query("select * from user");
						
						if ($user == 0) {
							echo '<p class="alert">Employee are not avaliable</p>';
						}
						else{
							
							echo'<table class="table">';
							?>
							<thead>
								<tr>
									<th>Emp ID</th>
									<th>Name</th>
									<th>E-mail</th>
									<th>Position</th>
									<th>Phone Number</th>
									<th>Detail</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									while($arr=mysql_fetch_array($user))
									{	
								?>
								<tr>
									<td><?php echo $arr['emp_ID']; ?></td>
									<td><?php echo $arr['emp_name']; ?></td>
									<td><?php echo $arr['emp_mail']; ?></td>
									<td><?php echo $arr['emp_pos']; ?></td>
									<td><?php echo $arr['emp_ph']; ?></td>
									<td><a href="userdetail.php?id=<?php echo $arr['emp_ID'];?>">Detail</a></td>
									<td><a href="deleteuser.php?id=<?php echo $arr['emp_ID'];?>">Delete</a></td>
								</tr>
							<?php
								$i++;
							 }
							echo "</tbody>";
						echo "</table>";
						}
						?>
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