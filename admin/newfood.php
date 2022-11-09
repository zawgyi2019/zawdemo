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
	$foodname=$_POST['foodname'];
	$category=$_POST['category'];
	$price=$_POST['foodprice'];
	$img= $_FILES['img']['name'];

	
	if($_POST['inputfood'])
		{$qry="INSERT INTO product(food_name,category,food_img,price)VALUES('$foodname','$category','$img','$price')";
	$result=mysql_query($qry) or die ("save items query fail.");
	if($result)			
		{mkdir("food/$i");
	move_uploaded_file($_FILES['img']['tmp_name'],"food/$i".$_FILES['img']['name']);

	$err="<font size='+2'>item inserted successfully</font>";
	
	}
	else
	{
		echo "item is not inserted";
	}
	header('location:food.php');
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
		<div class="wrap" id="newfood">
			<h1 class="title01">Food</h1>
			<div class="main">
				<h2 class="title03">Add Food</h2>
				<form class="foodForm" method="post" enctype="multipart/form-data">
					<div class="foodFormRow">
						<label>Food Name</label>
						<input type="text" name="foodname">
					</div>
					<div class="foodFormRow">
						<label>Category</label>
						<select name="category">
							<option selected disabled> Select Category</option>
							<?php 
							include("connection.php");
							$cate=mysql_query("select * from category");
							while($row = mysql_fetch_array($cate)):;
								?>
								<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
							<?php endwhile;?>
						</select>
					</div>
					<div class="foodFormImg">
						<label>Food Image</label>
						<div class="imgBlog">
							<div class="ShowImg"> </div>
							<div class="imgBtnBlog">
								<div class="imgBtn">Add Image</div><br>
								<input type="file" name="img" id="imgUpload" value="Add Image">
							</div>
						</div>
					</div>
					<div class="foodFormRow">
						<label>Price</label>
						<input type="text" name="foodprice">
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="inputfood" value="Add Food" class="btn02">
						<a href="food.php" class="btn02">Back</a>
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