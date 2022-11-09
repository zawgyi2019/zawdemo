<?php
session_start();
unset($_SESSION['cstname']);
session_destroy();
header('location:index.php');
?>