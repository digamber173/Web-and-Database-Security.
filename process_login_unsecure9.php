
  
<?php

session_start();

error_reporting(E_ALL);                  //show error if their are run time issues.
ini_set('display_errors', 1);

include "DB_connect.php";

$username = $_POST['username'];     //capture the usrnm and passwrd
$password = $_POST['password'];

echo "You attempted to login with " . $username . " and " . $password . "<br>";                  

$stmt = $mysqli->prepare("SELECT ID, username, password FROM users WHERE username = ? and password = ?");
$stmt->bind_param("ss", $username, $password);

$stmt->execute();
$stmt->store_result();//save and store the result done by mysql.

$stmt->bind_result($ID, $username, $password);//tell that three things to vome out of dB

//$sql = " SELECT ID, username, password FROM users WHERE username = '$username' AND password = '$password' ";   

echo "SQL = " . $sql . "<br>";//dispaly the sql stmnt on login result screen ,do not leave this code in production app.   


if ($stmt->num_rows > 0) {
  
  $row = $stmt->fetch();
  $ID = $row['ID'];
  echo "Login Successfull<br>";
  $_SESSION['username'] = $username;
  $_SESSION['ID'] = $ID;

  echo "</div>";
 } 
else {
  echo "0 results. Nobody with that username and password";
  $_SESSION = [];     //no result found not set the SESSION varaibles.
  session_destroy();
  echo"<br><a href='index.php'>Return to Main Page</a>";
}


echo"<pre>";                 // pre formatting tag. 
print_r($_SESSION);          //print_r print the session variables.
echo "</pre>";

?>
