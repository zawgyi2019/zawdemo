<?php
session_start();
include("connection.php");

    $catid = $_GET['id'];
    $delete = mysql_query("DELETE from category WHERE catID='$catid'");
    if($delete){
        echo "Record deleted successfully";
    }else{
        echo "Sorry, record could not be deleted";
    }
    
    header('location:setting.php');

?>