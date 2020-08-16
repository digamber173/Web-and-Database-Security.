
<?php                                                                	//Enter new user in the db. 
include "DB_connect.php";

$new_username = $_POST['username'];
$new_password = $_POST['password'];
$new_password2 = $_POST['password2'];

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

echo "<h2>Trying to add a new username " . $new_username . " pw = " . $new_password . " and " . $new_password2 . " </h2>";

//check password match or not.
if ($new_password != $new_password2) {
	echo "The password do not match. Please try again";
	exit;
}

preg_match('/[0-9]+/', $new_password, $matches);            //check if the passwrd feild contain some numbers.
if (sizeof ($matches ) == 0){
	echo "The password must have atleats one number.<br>";
	exit;
}

preg_match('/[!@#$%^&*()]+/', $new_password, $matches);     //passwrd must contain a spl charracter
if (sizeof ($matches ) == 0){
	echo "The password must have atleats one special character.<br>";
	exit;
}

if (strlen($new_password) <= 8) {
	echo "The password must be at least 8 character long.<br>";
	exit;
}


//check to see if the user already has registered.
$sql = "SELECT * FROM users where username = '$new_username'";

$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if ($result->num_rows > 0) {
	//opps someone already with that username.
	echo "The username " . $new_username . " is already in the database. Can't register twice";
    exit;
}



//Select statement to insert this new user in the DB.
//$sql = "INSERT INTO users (ID, username, password) VALUES (NULL, '$new_username', '$hashed_password')";

$stmt = $mysqli->prepare("INSERT INTO users (ID, username, password) VALUES (NULL, ?, ?)");

$stmt->bind_param("ss", $new_username, $hashed_password);
$result = $stmt->execute();

//exe the sql statmnt. $res conatin proprties related to the success or failure of sql st. run mysqli query and then putin the string to run  


if ($result) {
	echo"Registration Success";
}
else {
	echo "Something went wrong, not registered";
}



echo "<br><a href= 'login_form8.php'>Login as a user.</a>";

?>