<?php 
include("header.php");

$j=0;
$listArray = array();
if(isset($_POST['order'])){

	$cusid=$_POST['customerid'];
	$foodid=$_POST['foodid'];
	$price=$_POST['price'];
	$totalamt=$_POST['amount'];
	$totalcost=$_POST['total'];
	$paymth=$_POST['paymethod'];
	$otime=$_POST['curtime'];
	$phone=$_POST['custph'];
	$csaddress=$_POST['custaddress'];
	$cscondition = $_POST['condition'];

	$query="INSERT INTO order1(cus_ids,food_ids,price,tot_amt,tot_cost,pay_mth,order_time,cus_ph,cus_address,cond)VALUES($cusid,$foodid,$price,$totalamt,$totalcost,'$paymth','$otime','$phone','$csaddress','$cscondition')";
	$result=mysql_query($query) or die ("save items query fail.");

	$j++;
	$_SESSION['ocount'] += $j;
	
	$listArray[] = $otime;

	header('location:issue.php');

}
 foreach($listArray as $lists){
   		$_SESSION['countList'][] = $lists; 
    	}

$ordid = $_GET['id'];

date_default_timezone_set('Asia/Rangoon');
$date = date('d/m/Y-h:i A', time());

$ord=mysql_query("select * from product where food_ID='$ordid'");
$arr=mysql_fetch_array($ord);
$prodid = $arr['food_ID'];
$prodname = $arr['food_name'];
$prodimg = $arr['food_img'];
$fprice = $arr['price'];


if($_SESSION['cstname']=="")
{
	header('location:login.php');
}
else{ 
	$custname=$_SESSION['cstname'];
	$customer=mysql_query("select * from customer where cus_name='$custname'");
	$cust=mysql_fetch_array($customer);
	$custid = $cust['cus_ID'];
	$custname = $cust['cus_name'];
	$custph= $cust['cus_ph'];
	$custaddress = $cust['cus_address'];

?>
<div id="container" class="order">	
	<div id="wrapper">		
		<div class="orderWrap">
			<div class="orderShow">
				<img src="admin/food/<?php echo $prodimg; ?>" alt="<?php echo $prodname; ?>">
				<p><?php echo $prodname; ?></p>
			</div>
			<form action="order.php" method="post" id="orderForm">
				<input type="hidden" name="customerid" value="<?php echo $custid;?>">
				<input type="hidden" name="foodid" value="<?php echo $prodid;?>">
				
				<div class="role">
					<label id="ann">Customer</label>
					<p><?php echo "<span>".$custname."</span>"; ?></p>
				</div>
				<div class="role">
					<label id="ann">Food</label>
					<p><?php echo $prodname; ?></p>
				</div>
				<div class="role">
					<label id="ann">Price</label>
					<p><?php echo $fprice; ?></p>
				</div>
				<div class="role">
					<label id="ann">Amount</label>
					<input type="number" name="amount" value="1" id="amt" min="1" step="1">
					<input type="hidden" name="price" value="<?php echo $fprice; ?>" id="price">
				</div>
				<div class="role">
					<label>Total</label>
					<input type="text" name="total"  value="<?php echo $fprice; ?>" id="total" readonly> 
				</div>
				<div class="role">
					<label>Payment Method</label>
					<select name="paymethod">
						<option value="Cash">Cash</option>
						<option value="VISA">VISA</option>
						<option value="Master">Master</option>
						<option value="WavePay">WavePay</option>
						<option value="KPay">KPay</option>
						<option value="AyaPay">AyaPay</option>
						<option value="WavePay">CBPay</option>
						<option value="KPay">AGDPay</option>
						<option value="AyaPay">OnePay</option>
					</select>
				</div>
				<div class="role">
					<label>Time</label>
					<p><?php echo $date; ?></p>
				</div>
				<div class="role">
					<label>Phone No</label>
					<p><?php echo $custph; ?></p>
				</div>
				<div class="role">
					<label>Address</label>
					<p><?php echo $custaddress; ?></p>
				</div>
				<input type="hidden" name="curtime" value="<?php echo $date;?>">
				<input type="hidden" name="custph" value="<?php echo $custph;?>">
				<input type="hidden" name="custaddress" value="<?php echo $custaddress;?>">
				<input type="hidden" name="condition" value="pending">
				<div class="roleBtn">
					<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn02">Back</a>
					<input type="submit" name="order" class="btn02" value="Order">
				</div>
			</form>
		</div>	
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
}
include("footer.php"); 
?>