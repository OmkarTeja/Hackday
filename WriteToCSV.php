<?php
if(!session_id()) session_start();
$BookingMonth=date('m');
$BookingDay=date('d');

$Checkin=strtotime($_SESSION['Checkin']);
$CheckInMonth=date('m',$Checkin);
$CheckInDay=date('d',$Checkin);

$arr=[31,28,31,30,31,30,31,31,30,31,30,31];
if($BookingMonth==$CheckInMonth)
	$NumberOfDaysFromBooking=$CheckInDay-$BookingDay;
else{
	$NumberOfDaysFromBooking=$arr[$BookingMonth-1]-$BookingDay;
	$BookingMonth+=1;
	while($BookingMonth!=$CheckInMonth){
		$NumberOfDaysFromBooking+=$arr[$BookingMonth-1];
		$BookingMonth+=1;
	}
	$NumberOfDaysFromBooking+=$CheckInDay;
}

$Checkout=strtotime($_SESSION['Checkout']);
$CheckOutMonth=date('m',$Checkout);
$CheckOutDay=date('d',$Checkout);
if($CheckInMonth==$CheckOutMonth)
	$NumberOfDaysOfStay=$CheckOutDay-$CheckInDay;
else{
	$NumberOfDaysOfStay=$arr[$CheckInMonth-1]-$CheckInDay;
	$CheckInMonth+=1;
	while($CheckInMonth!=$CheckOutMonth){
		$NumberOfDaysOfStay+=$arr[$CheckInMonth-1];
		$CheckInMonth+=1;
	}
	$NumberOfDaysOfStay+=$CheckOutDay;
}


$str=$_SESSION['userId'].",".$_SESSION['Age'].",".$_SESSION['NumberOfPeople'].",".$BookingDay.",".$BookingMonth.",".$CheckInDay.",".$CheckInMonth.",".$NumberOfDaysFromBooking.",".$NumberOfDaysOfStay.",".$_SESSION['HotelLocation'].",".$_SESSION['TravellerLocation'].",".$_SESSION['HotelType'].",".$_SESSION['TravelType'].",".$_SESSION['price']."\n";
$file=fopen("ProcessedData.csv","a");
if($file){
	fwrite($file,$str);
	fclose($file);
}

?>