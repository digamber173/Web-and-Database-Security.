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
<h1>JOKES PAGE</h1>
<br>

<a href="register_new_user6.php">REGISTER</a>      



<?php                                          //runs on the server, web never sees the php code

include "DB_connect.php";

//include "searchall_jokes3.php";                //dispaly all jokes

?>

<form class="form-horizontal" action="search_keyword4.php">  <!--when user click submit button action prformed in this page keywrd4.php-->
<fieldset>

<!-- Form Name -->
<legend>Search for a Joke</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search Input</label>  
  <div class="col-md-4">
  <input id="keyword" name="keyword" type="text" placeholder="eg: chicken" class="form-control input-md">
  <span class="help-block">Enter a word to search for in the jokes table.</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="Submit"></label>
  <div class="col-md-5">
    <button id="Submit" name="Submit" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>

<hr>

<form class="form-horizontal" action="add_joke5.php"><!--when user click submit button action prformed in this page keywrd4.php-->
<fieldset>

<!-- Form Name -->
<legend>Add a Joke</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newjoke">Enter the text of your new joke</label>  
  <div class="col-md-4">
  <input id="newjoke" name="newjoke" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">Enter the first half of your joke</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanswer">The answer to your joke</label>  
  <div class="col-md-4">
  <input id="newanswer" name="newanswer" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">Enter the second half of your joke</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="Submit"></label>
  <div class="col-md-5">
    <button id="Submit" name="Submit" class="btn btn-success">Add a new joke</button>
  </div>
</div>



<?php

//include "search_keyword4.php"; //eg:chicken

$mysqli->close();

?>








</body>
</html>