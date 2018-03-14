<?php
if(!session_id()) session_start();

if(!isset($_POST['loginButton'])){
	$_SESSION['error']='LoginError';
	header("Location: index.php");
	exit;
}

$myusername = $_POST['userId'];
$mypassword = $_POST['password'];

$myusername = stripslashes($myusername);
$myusername = stripslashes($myusername);

if(($myusername==123 || $myusername==354 || $myusername==712 || $myusername==362 || $myusername==361 || $myusername==267 || $myusername==543 || $myusername==982 || $myusername==552 || $myusername==883) && $mypassword == "Sabre123"){
	
	$_SESSION['userId']=$myusername;
	$_SESSION['log']="loggedin";
	header("Location: SearchHotels.php");
}
else {
    $_SESSION['error']='InvalidDetailsError';
	header("Location: index.php");

}
?>