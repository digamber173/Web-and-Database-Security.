
  
<?php

session_start();

error_reporting(E_ALL);                  //show error if their are run time issues.
ini_set('display_errors', 1);

include "DB_connect.php";

$username = addslashes($_POST['username']);     //capture the usrnm and passwrd
$password = addslashes($_POST['password']);

echo "You attempted to login with " . $username . " and " . $password . "<br>";                  

$stmt = $mysqli->prepare("SELECT ID, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();//save and store the result done by mysql.

$stmt->bind_result($ID, $username, $hashed_password);

if ($stmt->num_rows == 1){
  echo"i found one person with that username<br>";
  $stmt->fetch();
  if (password_verify($password , $hashed_password)) {
    echo"The password matches<br>";
    echo"Login Successfull";
    echo"<br><a href='index.php'>Go to Main Page</a>";
     $_SESSION['username'] = $username;
  $_SESSION['u_ID'] = $ID;
  exit;
}
else{
   $_SESSION = [];     //no result found not set the SESSION varaibles.
  session_destroy();

 }
}
else{

  $_SESSION = [];     //no result found not set the SESSION varaibles.
  session_destroy();
}
echo"Login failed<br>";

echo"SESSION Variable = <br>";
echo"<pre>";                 // pre formatting tag. 
print_r($_SESSION);          //print_r print the session variables.
echo "</pre>";


echo "<br><a href='login_form8.php'>Retry Logging in.</a>";

?>
