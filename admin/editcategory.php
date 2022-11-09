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
	
	if($_POST['editcat'])
		{
			$cateid=$_POST['catid'];
			$catename=$_POST['catname'];
			$parents=$_POST['parents'];
			$myfile= $_FILES['catimg']['name'];

			if($myfile!=""){
				$img= $myfile;
			}else{
				$img= $_POST['cimg'];
			}
			$qry="UPDATE category SET catname = '$catename', catimg = '$img', catparent = '$parents' WHERE catID = '$cateid'";
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
		<div class="wrap" id="editCategory">
			<h1 class="title01">Category</h1>
			<div class="main">
				<?php 
				include("connection.php");
				$cid = $_GET['id'];
				$cedit=mysql_query("select * from category where catID='$cid'");
				$arr=mysql_fetch_array($cedit);

				$editcatID = $arr['catID'];
				$editcatname = $arr['catname'];
				$editcatimg =$arr['catimg'];
				$editparents= $arr['parent'];

				
				 ?>
				<h2 class="title03">View Category</h2>
				<form class="foodForm" method="post" enctype="multipart/form-data">
					<div class="foodFormRow">
						<label>Category ID: <?php echo $editcatID; ?></label>
						<input type="hidden" name="catid" value="<?php echo $editcatID; ?>">
					</div>
					<div class="foodFormRow">
						<label>Category Name</label>
						<input type="text" name="catname" value="<?php echo $editcatname; ?>">
					</div>					
					<div class="foodFormImg">
						<label>Category Image</label>
						<div class="imgBlog">
							<input type="hidden" name="cimg" value="<?php echo $editcatimg; ?>">
							<div class="ShowImg">
								<img src="food/<?php echo $editcatimg; ?>" class="thumb-image">
							</div>
							<div class="imgBtnBlog">
								<div class="imgBtn">Add Image</div><br>
								<input type="file" name="catimg" id="imgUpload" value="Add Image">
							</div>
						</div>
					</div>
					<div class="foodFormRow">
						<label>Parents</label>
						<input type="text" name="parents" value="<?php echo $editparents; ?>">
					</div>
					<div class="foodFormBtn">
						<input type="submit" name="editcat" value="Edit Category" class="btn02">
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