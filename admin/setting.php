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
			<div class="wrap" id="setting">
				<h1 class="title01">Setting</h1>
				<div class="main">
					<h2 class="title03">Category</h2>
					<div class="UserBtnBlog">
						<a href="newCategory.php" class="btn01">Add Category</a>
					</div>
				</div>
				<div class="catTable">
					<?php 
						include("connection.php");
						$cate=mysql_query("select * from category");
						
						if ($cate == 0) {
							echo '<p class="alert">Category are not avaliable</p>';
						}
						else{
							
							echo'<table class="table">';
							?>
							<thead>
								<tr>
									<th>ID</th>
									<th>Category Name</th>
									<th>Category Image</th>
									<th>Parents</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									while($arr=mysql_fetch_array($cate))
									{	
								?>
								<tr>
									<td><?php echo $arr['catID']; ?></td>
									<td><?php echo $arr['catname']; ?></td>
									<?php $showimg=$arr['catimg']; ?>
									<td><img src="food/<?php if($showimg!=""){echo $arr['catimg'];}else{echo 'no_img.png';}  ?>"></td>
									<td><?php echo $arr['catparent']; ?></td>
									<td><a href="editcategory.php?id=<?php echo $arr['catID'];?>">Edit</a></td>
									<td><a href="deletecate.php?id=<?php echo $arr['catID'];?>">Delete</a></td>
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