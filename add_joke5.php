<?php

session_start();

if(! $_SESSION['username']) {                               //sombody attempt to add joke restrict after login only user can add joke
	echo "Only  logged in users may access this page. Click <a href='login_form8.php' here </a> to login<br>";
	exit;
}



include "DB_connect.php";

$new_joke_question = $_GET["newjoke"];                     //$_GET collect data sent in the URL.
$new_joke_answer = $_GET["newanswer"];    

$new_joke_question = addslashes($new_joke_question);       //jokes with eg:doesn't can get error so addS.
$new_joke_answer = addslashes($new_joke_answer);     
$u_ID = $_SESSION['u_ID'];


//Search DB for word chicken.
//Mysql get data from table.
echo"<h2>Trying to add a new joke: $new_joke_question and $new_joke_answer </h2>";

$stmt = $mysqli->prepare("INSERT INTO jokes_table (J_ID, J_question, J_answer, u_ID) VALUES (NULL, ?,?,?)");

$stmt->bind_param("sss", $new_joke_question, $new_joke_answer, $u_ID);

$stmt->execute();

$stmt->close();





include "searchall_jokes3.php";

?>

<a href="index.php">Return to Main Page.</a>