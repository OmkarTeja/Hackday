<?php
if(!session_id()) session_start();
if(!isset($_SESSION['logHotels'])) 
{
    $_SESSION['error']='LogoutError';
	header("Location: index.php");
	exit;
}
session_start();
unset($_SESSION['log']);
session_destroy();
header("location:index.php");
?>
