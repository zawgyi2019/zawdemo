<?php 
include("header.php"); 
$cateID = 0;
$catename = '';
$_SESSION['cateID'] = $_GET['id'];
$cateID = $_SESSION['cateID'];
?>
<div id="container" class="food">	
	<div id="wrapper">
		<div class="catBlog">
							
				<ul class="catItem">
					<?php
					$cate=mysql_query("select * from category where catID='$cateID'");
							
					if ($cate == 0) {
						echo '<p class="alert">Category are not avaliable</p>';
					}
					else{
						$i=0;
						while($arr=mysql_fetch_array($cate))
						{
							$showimg=$arr['catimg'];
						?>							
					<li>
						<a href="food.php?id=<?php echo $arr['catID'];?>">
							<img src="admin/food/<?php if($showimg!=""){echo $arr['catimg'];}else{echo 'no_img.png';}  ?>">
							<p><?php echo $arr['catname']; ?></p>
						</a>
					</li>
					<?php 
							$catename = $arr['catname'];
							$i++;
						}
					} 
					?>
				</ul>
				<div class="catBlogBrn">
					<a href="food.php" class="btn01">all Category</a>
				</div>
			</div>

		<form class="foodWrap">
			<?php			
			$chk=mysql_query("select * from product where category='$catename'");
			$product=mysql_query("select * from product where category='$catename' ORDER BY food_ID DESC");
			$check = mysql_fetch_array($chk);
			if ($product == 0) {
				echo '<p class="alert">product are not avaliable</p>';
			}
			elseif (empty($check['category'])) {
					echo '<p class="alert">Category have not Foods.</p>';
				}			
			else{

				echo'<ul class="foodBlog">';

				$i=0;
				while($food=mysql_fetch_array($product))
				{		
					$foodimg = $food['food_img'];
					$foodID = $food['food_ID'];	
					?>
					<li>
						<div class="foodImgBlog"><img src="<?php echo 'admin/food/'.$foodimg; ?>" alt="<?php echo $foodimg; ?>"></div>
						<p><?php echo $food['food_name']; ?></p>
						<p><?php echo  $food['price']; ?></p>
						<?php
						error_reporting(1);
						if($_SESSION['cstname']==''){
							echo '<a href="login.php" class="btn01">Order</a>';
						}
						else{
							echo '<a href="order.php?id='.$food['food_ID'].'" class="btn01">Order</a>';
						}
						?>	
					</li>
					<?php
					$i++;					
				}
				echo "</ul>";

			} ?>				
		</form>	
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
include("top_footer.php");
?>