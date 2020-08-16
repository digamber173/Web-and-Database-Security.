<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>WEB PAGE</title>
</head>
<body>
<h1>Login for Jokes</h1>


<?php                                          //runs on the server, web never sees the php code

include "DB_connect.php";

//include "searchall_jokes3.php";                //dispaly all jokes

?>

<form class="form-horizontal" action="process_login_secure9.php" method="post">  <!--when user click submit button action prformed in this page keywrd4.php-->
<fieldset>

<!-- Form Name -->
<legend>Please Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="Your Name" class="form-control input-md">
  <span class="help-block">Enter your username.</span>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
  <span class="help-block">Enter your password.</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>



<?php



$mysqli->close();

?>








</body>
</html>