<?php
session_start();
include("connection.php");

    $customerid = $_GET['id'];
    $delete = mysql_query("DELETE from customer WHERE cus_ID='$customerid'");
    if($delete){
        echo "Record deleted successfully";
    }else{
        echo "Sorry, record could not be deleted";
    }
    
    header('location:customer.php');

?>