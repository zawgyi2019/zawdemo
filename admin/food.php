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
			<div class="wrap" id="food">
				<h1 class="title01">Food</h1>
				<div class="main">
					<h2 class="title03">Food items</h2>
					<div class="gallery">
						<?php
						include("connection.php"); 			
						if (isset($_GET['page_no']) && $_GET['page_no']!="") {
							$page_no = $_GET['page_no'];
						} else {
							$page_no = 1;
						}
						$total_records_per_page = 9;

						$offset = ($page_no-1) * $total_records_per_page;
						$previous_page = $page_no - 1;
						$next_page = $page_no + 1;
						$adjacents = "2";

						$result_count = mysql_query("SELECT COUNT(*) As total_records FROM product");
						$total_records = mysql_fetch_array($result_count);
						$total_records = $total_records['total_records'];
						$total_no_of_pages = ceil($total_records / $total_records_per_page);
						$second_last = $total_no_of_pages - 1;

						$product=mysql_query("select * from product ORDER BY food_ID DESC  LIMIT $offset, $total_records_per_page");
						
						if ($product == 0) {
							echo '<p class="alert">product are not avaliable</p>';
						}
						else{
							echo'<ul class="foodBlog">';

							$i=0;
							while($arr=mysql_fetch_array($product))
							{			
								$foodimg = $arr['food_img'];
								$foodID = $arr['food_ID'];					
								
								?>
								<li>
									<a href="fooddelete.php?id=<?php echo $arr['food_ID'];?>"  class='btnDel'> X</a>
									<img src="<?php echo 'food/'.$foodimg; ?>" alt="<?php echo $foodimg; ?>">								
									<p><?php echo $arr['food_name']; ?></p>
									<p><?php echo $arr['category']; ?></p>
									<p><?php echo  $arr['price']; ?></p>
									<a href="editfood.php?id=<?php echo $arr['food_ID'];?>" class="btn01">Edit</a>
								</li>
								<?php
								$i++;

							}
							echo "</ul>";

						} ?>						
					</div>

					<ul class="pagination">
						<?php if($page_no > 1){
							echo "<li><a href='?page_no=1'>&lsaquo;</a></li>";
						} ?>

						<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
							<a <?php if($page_no > 1){
								echo "href='?page_no=$previous_page'";
							} ?>>&lsaquo;&lsaquo;</a>
						</li>
						<?php
						if ($total_no_of_pages <= 10){   
							for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
								if ($counter == $page_no) {
									echo "<li class='active'><a>$counter</a></li>"; 
								}else{
									echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}
							}
						}
						?>
						<li <?php if($page_no >= $total_no_of_pages){
							echo "class='disabled'";
						} ?>>
						<a <?php if($page_no < $total_no_of_pages) {
							echo "href='?page_no=$next_page'";
						} ?>>&rsaquo;&rsaquo;</a>
					</li>

					<?php if($page_no < $total_no_of_pages){
						echo "<li><a href='?page_no=$total_no_of_pages'>&rsaquo;</a></li>";
					} ?>
				</ul>
				<a href="newfood.php" class="newFood">Add New Food</a>
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