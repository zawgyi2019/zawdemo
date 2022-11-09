<?php 
include("header.php");

if($_SESSION['cstname']=="")
{
	header('location:login.php');
}
else{ 
	// foreach($_SESSION['countList'] as $show){
 //   		echo $show.",";
 //    	}
	date_default_timezone_set('Asia/Rangoon');
	$date2 = date('d/m/Y', time());
?>
<div id="container" class="issue">	
	<div id="wrapper">		
		<div class="issueWrap">
			<div class="issueTop">
				<dl>
					<dt>Customer Name</dt>
					<dd><?php echo $_SESSION['cstname']; ?></dd>
				</dl>
				<dl>
					<dt>Date</dt>
					<dd><?php echo$date2; ?></dd>
				</dl>
			</div>
			<div class="issueShow">
				<table>
					<thead>
						<tr>
							<th>No.</th>
							<th>Food</th>
							<th>Time</th>
							<th>Amount</th>
							<th>Price</th>
							<th>Total</th>
							<th>Pay Method</th>
							<th>Condition</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
							foreach($_SESSION['countList'] as $show){
					   		$ord=mysql_query("select * from order1 where order_time='$show'");
							
							while($arr=mysql_fetch_array($ord)){
								$foodname = $arr['food_ids'];
								$food=mysql_query("select * from product where food_ID='$foodname'");
								$arr2=mysql_fetch_array($food);	
								$prodname = $arr2['food_name'];							
								?>
								<tr>
								<td><?php echo $i+=1; ?></td>
								<td><?php echo $prodname;?></td>
								<td><?php echo $arr['order_time']; ?></td>
								<td><?php echo $arr['tot_amt'];?></td>
								<td><?php echo $arr['price']; ?></td>
								<td><?php echo $arr['tot_cost'];?></td>
								<td><?php echo $arr['pay_mth']; ?></td>
								<td><?php echo $arr['cond'];?></td>
								</tr>
						<?php
							}

					    	}
						 ?>
						
							
						
					</tbody>
				</table>
			</div>
			<a href="food.php" class="btn01">More Food</a>
		</div>	
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
}
include("footer.php"); 
?>