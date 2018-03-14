<?php
if(!session_id()) session_start();
$_SESSION['price']=$_GET['price'];
if($_SESSION['price']<=2500)
	$_SESSION['HotelType']=2;
else if($_SESSION['price']>2500 && $_SESSION['price']<=5000)
	$_SESSION['HotelType']=1;
else if($_SESSION['price']>5000 && $_SESSION['price']<=7500)
	$_SESSION['HotelType']=4;
else if($_SESSION['price']>7500 && $_SESSION['price']<=10000)
	$_SESSION['HotelType']=3;
?>