<?php
session_start();
include("connection.php");

    $oid = $_GET['id'];
    $delete = mysql_query("DELETE from order1 WHERE order_no='$oid'");
    if($delete){
        echo "Record deleted successfully";
    }else{
        echo "Sorry, record could not be deleted";
    }
    
    header('location:order.php');

?>