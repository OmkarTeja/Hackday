<!DOCTYPE html>
<?php
if(!session_id()) session_start();
if(!isset($_SESSION['log'])) 
{
    $_SESSION['error']='LoginError';
	header("Location: index.php");
}
?>
<html>
<title>Sabre | Search</title>
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
  <form action="logout.php" method="post">
	<button class="w3-btn w3-green w3-hover-red">Logout</button>
  </form>
</header>
<br/><br/>


<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 1</p>
	<p id="price1"></p>
	<p id="roomType1"></p>
	<button id="1" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 2</p>
	<p id="price2"></p>
	<p id="roomType2"></p>
	<button id="2" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 3</p>
	<p id="price3"></p>
	<p id="roomType3"></p>
	<button id="3" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 4</p>
	<p id="price4"></p>
	<p id="roomType4"></p>
	<button id="4" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 5</p>
	<p id="price5"></p>
	<p id="roomType5"></p>
	<button id="5" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 6</p>
	<p id="price6"></p>
	<p id="roomType6"></p>
	<button id="6" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 7</p>
	<p id="price7"></p>
	<p id="roomType7"></p>
	<button id="7" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 8</p>
	<p id="price8"></p>
	<p id="roomType8"></p>
	<button id="8" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 9</p>
	<p id="price9"></p>
	<p id="roomType9"></p>
	<button id="9" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<div class="w3-red w3-card-4 w3-center" style="width:40%;margin-left:30%;height:25%;padding:2%">
	<p>Hotel ID - 10</p>
	<p id="price10"></p>
	<p id="roomType10"></p>
	<button id="10" value="" class="w3-btn w3-yellow w3-hover-green w3-round-xxlarge bookButton">Book</button>
</div><br/>
<br/><br/><br/><br/><br/>

<div id="footer">
	<div class="container">
		<center><img src="footer-bg.png"></center>
	</div>
</div>
<script>
function generatePrices(){
	var min=0,max=0;
	for(i=1;i<=10;i++){
		min=max;
		max=min+1000;
		price=Math.floor(Math.random()  * (max - min) + min);
		document.getElementById(i+"").value=price;
		document.getElementById("price"+i).innerHTML="Price : "+price;
		if(price<=2500){
			document.getElementById("roomType"+i).innerHTML="Room Type : Lodge";
		}
		else if(price>2500 && price<=5000){
			document.getElementById("roomType"+i).innerHTML="Room Type : HomeStay";
		}
		else if(price>5000 && price<=7500){
			document.getElementById("roomType"+i).innerHTML="Room Type : Suite";
		}
		else if(price>7500 && price<=10000){
			document.getElementById("roomType"+i).innerHTML="Room Type : Resort";
		}
	}
}
$(document).ready(function(){
	generatePrices();
	$('button.bookButton').click(function(){
		price=(this).value;
		$.get('SetPriceSession.php?price='+price,function(data){
			$.get('WriteToCSV.php',function(data){
				window.location.href = "SearchHotels.php";
			});
		});
	});
});
</script>
</body>
</html>