<?php
/*
$seconds = -10 +time();
setcookie(loggedin,date("F js -g:i a"),$seconds);

*/
if(!session_id()) session_start();
if(!isset($_SESSION['log'])) 
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
