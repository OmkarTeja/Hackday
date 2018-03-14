<?php
$BookingMonth=date('m');
$BookingDay=date('d');

$Checkin=strtotime($_POST['Checkin']);
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

$Checkout=strtotime($_POST['Checkout']);
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

$data=array(
"UserID" => $_POST['UserId'],
"Age" => $_POST['Age'],
"NumberOfPeople" => $_POST['NumberOfPeople'],
"BookingDay" => $BookingDay,
"BookingMonth" => $BookingMonth,
"CheckInDay" => $CheckInDay,
"CheckInMonth" => $CheckInMonth,
"NumberOfDaysFromBooking" => $NumberOfDaysFromBooking,
"NumberOfDaysOfStay" => $NumberOfDaysOfStay,
"LocationOfHotel" => $_POST['HotelLocation'],
"TravellerLocation" => $_POST['TravellerLocation'],
"HotelType" => $_POST['HotelType'],
"TravelType" => $_POST['TravelType']
);
$data_string = json_encode($data);

$URI = "RandomUrl.php";

$ch = curl_init($URI);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
$result = json_decode($result);
echo $result;
?>
<!DOCTYPE html>
<html>
<title>Sabre | LOGIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
html,body{
    height: 100%
}
.foot-links a, .foot-links p{
  display: block;
   color: rgb(63, 63, 63);
  transition: all 0.2s ease-in-out;
  -webkit-transition: all 0.2s ease-in-out;
  text-decoration: none;
  font-family: OpenSansRegular, Arial, sans-serif;
  font-size: 13px;
  color: rgb(63, 63, 63);
  padding-bottom: 5px;
  text-shadow: rgb(255, 255, 255) 1px 1px 0px;
  
}
.foot-links img{
  padding-top: 5px;
}
#footer{
  background: rgb(241, 241, 241);
  border-top: 1px solid rgb(222, 222, 222);
  margin-top: -2px;
  padding-top: 15px;
  padding-bottom: 10px;
 }
.foot-header{
  font-family: OpenSansBold, Arial, sans-serif;
  font-size: 18px;
  color: rgb(63, 63, 63);
  padding-bottom: 20px;
  text-shadow: rgb(255, 255, 255) 1px 1px 0px;
}
#footer .container{
  max-width: 1100px;
}
#bottom-footer{
  margin-bottom: 20px;
  border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    padding-top: 15px;
    padding-bottom: 15px;
}
#bottom-footer a{
    text-decoration: none;
  color: #626262;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
  font-size: 12px;
  padding: 0px 15px;
  border-right: 1px solid #ccc;
  font-family: 'OpenSansRegular', Arial, sans-serif;
  font-size: 13px;
  color: #626262;
  padding: 0 12px;
  text-shadow: 1px 1px 0 rgba(255,255,255,1);
}
#final-footer{
  font-size: 11px;
    color: #666;
}
#final-footer i{
  font-size: auto;
}
.modal {
  overflow-y: auto;
}
/* custom class to add space for scrollbar */
.modal-scrollbar {
    margin-right: 15px;
}
.scrollbar-measure {
    height: 100px;
    overflow: scroll;
    position: absolute;
    top: -9999px;
}
</style>
<script>
window.jQuery(function() {
  // detect browser scroll bar width
  var scrollDiv = $('<div class="scrollbar-measure"></div>')
        .appendTo(document.body)[0],
      scrollBarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;

  $(document)
    .on('hidden.bs.modal', '.modal', function(evt) {
      // use margin-right 0 for IE8
      $(document.body).css('margin-right', '');
    })
    .on('show.bs.modal', '.modal', function() {
      // When modal is shown, scrollbar on body disappears.  In order not
      // to experience a "shifting" effect, replace the scrollbar width
      // with a right-margin on the body.
      if ($(window).height() < $(document).height()) {
        $(document.body).css('margin-right', scrollBarWidth + 'px');
      }
    });
});
</script>
<body>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <div class="w3-center">
  <h2 class="w3-xxxlarge w3-animate-right">Sabre Travel Technologies</h2>
  <h4 class="w3-xlarge w3-animate-left">Hackday - 2018</h4>
  </div>
</header>
<br/><br/>

<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<h2 class="w3-xxxlarge w3-animate-right">Predicted Price : 
	<?php
$BookingMonth=date('m');
$BookingDay=date('d');

$Checkin=strtotime($_POST['Checkin']);
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

$Checkout=strtotime($_POST['Checkout']);
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

$data=array(
"UserID" => $_POST['UserId'],
"Age" => $_POST['Age'],
"NumberOfPeople" => $_POST['NumberOfPeople'],
"BookingDay" => $BookingDay,
"BookingMonth" => $BookingMonth,
"CheckInDay" => $CheckInDay,
"CheckInMonth" => $CheckInMonth,
"NumberOfDaysFromBooking" => $NumberOfDaysFromBooking,
"NumberOfDaysOfStay" => $NumberOfDaysOfStay,
"LocationOfHotel" => $_POST['HotelLocation'],
"TravellerLocation" => $_POST['TravellerLocation'],
"HotelType" => $_POST['HotelType'],
"TravelType" => $_POST['TravelType']
);
$data_string = json_encode($data);

$URI = "http://localhost/Hackday/RatePrediction/RandomUrl.php";

$ch = curl_init($URI);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
echo $result;
?>
	</h2>
</div><br/>

<br/><br/><br/><br/><br/>
<div id="footer">
<div class="container">
      <center><img src="../footer-bg.png"></center>
  </div>
</div>
</body>
</html>