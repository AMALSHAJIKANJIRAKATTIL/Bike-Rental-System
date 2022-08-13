<?php 

session_start();
unset($_SESSION['AdminLoginid']);

header("Location: adminlogin.php");

?>