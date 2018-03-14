<!DOCTYPE html>
<?php
if(!session_id()) session_start();
if(isset($_SESSION['log'])) 
{
    header("Location: SearchHotels.php");
}
?>
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
<div class="w3-row-padding w3-center w3-margin-top">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style='text-align:center'>
                    <form class="w3-container w3-card-4" action="login.php" method="post">
                        <h4> </h4><br>
                        <!--<i class="fa fa-user w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                        <img src="sabre-logo.png" height="30%" width="60%">
						<?php
						if(isset($_SESSION['error'])){
						if($_SESSION['error']=='LoginError'){
							$_SESSION['error']="";
							echo '<p><div class="alert alert-danger fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									 LOGIN BEFORE YOU ENTER.
								</div></p>';
						}
						if($_SESSION['error']=='InvalidDetailsError'){
							$_SESSION['error']="";
							echo '<p><div class="alert alert-danger fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									 USERNAME OR PASSWORD IS INVAILD.
								</div></p>';
						}
						if($_SESSION['error']=='LogoutError'){
							$_SESSION['error']="";
							echo '<p><div class="alert alert-danger fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									 EXECUTION OF THE REQUESTED PAGE IS RESTRICTED.
								</div></p>';
						}
						}
						?>
                        <p>
                        <div class="w3-group">
                            <label class="w3-label w3-validate">User ID</label>
                            <input type="Text" name="userId" class="w3-input" required/>
                        </div>
                        </p>
                        <p>
                        <div class="w3-group">
                            <label class="w3-label w3-validate">Password</label>
                            <input type="password" name="password" class="w3-input" required/>
                        </div>
                        </p>
                        <p><button class="w3-btn w3-red w3-hover-green" type='submit' name='loginButton'>LOGIN</button></p>
                        <br>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
</div>

<br/><br/><br/><br/><br/>
<div id="footer">
<div class="container">
      <center><img src="footer-bg.png"></center>
  </div>
</div>
</body>
</html>