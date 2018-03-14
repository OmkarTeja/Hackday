<?php
if(!session_id()) session_start();

if(!isset($_POST['searchButton'])){
	$_SESSION['error']='LogoutError';
	header("Location: index.php");
	exit;
}

$_SESSION['TravellerLocation']=$_POST['TravellerLocation'];
$_SESSION['HotelLocation']=$_POST['HotelLocation'];
$_SESSION['Checkin']=$_POST['Checkin'];
$_SESSION['Checkout']=$_POST['Checkout'];
$_SESSION['NumberOfPeople']=$_POST['NumberOfPeople'];
$_SESSION['TravelType']=$_POST['TravelType'];
$_SESSION['Age']=$_POST['Age'];

header("Location: HotelList.php");

?>