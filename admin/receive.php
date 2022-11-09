<?php
session_start();
include("connection.php");

    $recid = $_GET['id'];

	$orderdetail=mysql_query("select * from order1 where order_no='$recid'");
	$arr=mysql_fetch_array($orderdetail);

	$ono = $arr['order_no'];
	$price = $arr['price'];
	$amount = $arr['tot_amt'];
	$total= $arr['tot_cost'];
	$paymth = $arr['pay_mth'];
	$otime = $arr['order_time'];
	$ph = $arr['cus_ph'];
	$address= $arr['cus_address'];
	// $cond= $arr['cond'];
	$cond = "received";

	$custid=$arr['cus_ids'];
	$customer=mysql_query("select * from customer where cus_id='$custid'");
	$cust=mysql_fetch_array($customer);
	$cname = $cust['cus_name'];

	$foodid=$arr['food_ids'];
	$food=mysql_query("select * from product where food_ID='$foodid'");
	$fo=mysql_fetch_array($food);
	$fname = $fo['food_name'];

	date_default_timezone_set('Asia/Rangoon');
	$date2 = date('d/m/Y-h:i A', time());

	 // echo $date2.",".$cname.",".$fname.",".$price.",".$amount.",".$total.",".$paymth.",".$ono.",".$otime.",".$ph.",".$address.",".$cond;
    $ordqry="UPDATE order1 SET cond = '$cond' WHERE order_no = '$ono'";
	$result=mysql_query($ordqry) or die ("save order query fail.");

	$invqry="INSERT INTO invoice(invo_time,cus_name,food_name,price,amount,total_cost,payment_method,order_no,order_time,cus_ph,cus_address)VALUES('$date2','$cname','$fname','$price','$amount','$total','$paymth','$ono','$otime','$ph','$address')";
	$result2=mysql_query($invqry) or die ("save invoice query fail.");
  
    header('location:invoice.php');

?>