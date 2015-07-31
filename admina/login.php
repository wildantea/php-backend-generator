<?php 
session_start();
if (!isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<!-- saved from url=(0028)http://sukavid.com/adm/login -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
   	<title>Php Backend Generator</title>
  <link media="all" type="text/css" rel="stylesheet" href="assets/login/css/m-styles.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/login/css/login.css">
  <script src="assets/login/js/jquery.js"></script>

  <script type="text/javascript" src="assets/login/js/jquery.backstretch.min.js"></script> 
  <script src="assets/login/js/jqueryform.js"></script>
  <script src="assets/login/js/validate.js"></script>
  <script src="assets/login/js/login.js"></script>
  </head>
  <body>
    <div class="atas"><center>Php Backend Generator</center></div>
			<div class="login">
				<!-- <form id="form" method="post"> -->
    <form method="POST" action="inc/login.php" accept-charset="UTF-8" id="form" novalidate="novalidate"><img id="gam" src="assets/login/img/pat.png">
    	
    	<div id="kanan">
    	<h3>Please Login</h3>
	<div class="load"><img src="assets/login/img/load.gif"><span class="txt">Please Wait</span></div>
	<div class="bad">Username or Password is not correct.  <p><span class="m-btn red" id="back">Back</span></p></div>
<div class="tes"></div>

<div class="m-input-prepend">                
    <span class="m-btn blue">Username</span>      
    <input class="m-wrap" placeholder="Username" autofocus="autofocused" name="username" type="text" value="">
</div>

<div class="m-input-prepend">                
    <span class="m-btn blue">Password&nbsp;</span>      
    <input class="m-wrap" placeholder="Your Password" id="txtPassword" name="password" type="password" value="">    <span class="add-on" style="background-color:#fff"><img class="seePass" src="assets/login/img/eye.png" width="23" height="20"></span>
</div>  

<div class="m-input-prepend">    
    <input class="m-btn blue" style="width:90px" type="submit" value="Login">            
</div> 

</div>
</form>
</div>  
 <div class="atas" style="border-top:none"></div>
</body></html>
<?php 
} else {
  header("location:index.php/");
}
?>