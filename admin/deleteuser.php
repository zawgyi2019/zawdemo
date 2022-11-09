<?php
session_start();
include("connection.php");

    $userid = $_GET['id'];
    $delete = mysql_query("DELETE from user WHERE emp_ID='$userid'");
    if($delete){
        echo "Record deleted successfully";
    }else{
        echo "Sorry, record could not be deleted";
    }
    
    header('location:user.php');

?>