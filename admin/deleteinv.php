<?php
session_start();
include("connection.php");

    $ordid = $_GET['id'];
    $cond = "pending";
    
    $ordqry="UPDATE order1 SET cond = '$cond' WHERE order_no = '$ordid'";
	$result=mysql_query($ordqry) or die ("save order query fail.");

    $delete = mysql_query("DELETE from invoice WHERE order_no='$ordid'");
    if($delete){
        echo "Record deleted successfully";
    }else{
        echo "Sorry, record could not be deleted";
    }
    
    header('location:invoice.php');

?>