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
	$catname=$_POST['catname'];
	$parents=$_POST['Parents'];
	$catimg= $_FILES['catimg']['name'];

	
	if($_POST['addcat'])
		{$qry="INSERT INTO category(catname,catimg,catparent)VALUES('$catname','$catimg','$parents')";
	$result=mysql_query($qry) or die ("save items query fail.");
	if($result)			
		{mkdir("food/$i");
	move_uploaded_file($_FILES['catimg']['tmp_name'],"food/$i".$_FILES['catimg']['name']);

	$err="<font size='+2'>item inserted successfully</font>";
	
	}
	else
	{
		echo "item is not inserted";
	}
	header('location:setting.php');
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
		<div class="wrap" id="newcategory">
			<h1 class="title01">Category</h1>
			<div class="main">
				<h2 class="title03">New Category</h2>
				<form class="foodForm" method="post" enctype="multipart/form-data">
					<div class="foodFormRow">
						<label>Category Name</label>
						<input type="text" name="catname">
					</div>
					
					<div class="foodFormImg">
						<label>Category Image</label>
						<div class="imgBlog">
							<div class="ShowImg"> </div>
							<div class="imgBtnBlog">
								<div class="imgBtn">Add Image</div><br>
								<input type="file" name="catimg" id="imgUpload" value="Add Image">
							</div>
						</div>
					</div>
					<div class="foodFormRow">
						<label>Parents</label>
						<input type="text" name="Parents">
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="addcat" value="Add Category" class="btn02">
						<a href="setting.php" class="btn02">Back</a>
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