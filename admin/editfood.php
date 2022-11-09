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
	
	if($_POST['editfood'])
		{
			$foodid=$_POST['foodid'];
			$foodname=$_POST['foodname'];
			$category=$_POST['category'];
			$price=$_POST['foodprice'];
			$myfile= $_FILES['img']['name'];

			if($myfile!=""){
				$img= $myfile;
			}else{
				$img= $_POST['fimg'];
			}
			$qry="UPDATE product SET food_name = '$foodname', category = '$category', food_img = '$img', price = '$price' WHERE food_ID = '$foodid'";
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
		<div class="wrap" id="editfood">
			<h1 class="title01">Food</h1>
			<div class="main">
				<?php 
				include("connection.php");
				$fid = $_GET['id'];
				$fedit=mysql_query("select * from product where food_ID='$fid'");
				$arr=mysql_fetch_array($fedit);

				$editfoodID = $arr['food_ID'];
				$editfoodname = $arr['food_name'];
				$editcategory = $arr['category'];
				$editimg = $arr['food_img'];
				$editprice= $arr['price'];

				
				 ?>
				<h2 class="title03">Food items</h2>
				<form class="foodForm" method="post" enctype="multipart/form-data">
					<div class="foodFormRow">
						<label>Food ID: <?php echo $editfoodID; ?></label>
						<input type="hidden" name="foodid" value="<?php echo $editfoodID; ?>">
					</div>
					<div class="foodFormRow">
						<label>Food Name</label>
						<input type="text" name="foodname" value="<?php echo $editfoodname; ?>">
					</div>
					<div class="foodFormRow">
						<label>Category</label>
						<input type="text" name="category" value="<?php echo $editcategory; ?>">
					</div>
					<div class="foodFormImg">
						<label>Food Image</label>
						<div class="imgBlog">
							<input type="hidden" name="fimg" value="<?php echo $editimg; ?>">
							<div class="ShowImg">
								<img src="food/<?php echo $editimg; ?>" class="thumb-image">
							</div>
							<div class="imgBtnBlog">
								<div class="imgBtn">Add Image</div><br>
								<input type="file" name="img" id="imgUpload" value="Add Image">
							</div>
						</div>
					</div>
					<div class="foodFormRow">
						<label>Price</label>
						<input type="text" name="foodprice" value="<?php echo $editprice; ?>">
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="editfood" value="Edit Food" class="btn02">
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