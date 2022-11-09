<?php 
include("header.php");
?>
<div id="container" class="food">	
	<div id="wrapper">
		<div class="foodCatBlog">
							
				<ul class="foodCate">
					<?php
					$cate=mysql_query("select * from category");
							
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
						<a href="category.php?id=<?php echo $arr['catID'];?>">
							<img src="admin/food/<?php if($showimg!=""){echo $arr['catimg'];}else{echo 'no_img.png';}  ?>">
							<p><?php echo $arr['catname']; ?></p>
						</a>
					</li>
					<?php 
							$i++;
						}
					} 
					?>
				</ul>
			</div>
		<div class="foodWrap" method="post">
			<?php		
			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
				$page_no = $_GET['page_no'];
			} else {
				$page_no = 1;
			}
			$total_records_per_page = 8;

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
				while($food=mysql_fetch_array($product))
				{			
					$foodimg = $food['food_img'];
					$foodID = $food['food_ID'];								

					?>
					<li>
						<div class="foodImgBlog" data-aos="zoom-in" data-aos-duration="500">
							<img src="<?php echo 'admin/food/'.$foodimg; ?>" alt="<?php echo $foodimg; ?>">
						</div>
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
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
include("top_footer.php");
?>