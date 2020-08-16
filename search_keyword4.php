<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>

  <style>
  	*{
  		font-family: arial, helvetica, sans-serrif;
  	}
  </style>
</head>

<?php

include "DB_connect.php";

$keyword = $_GET['keyword'];                     //$_GET collect data sent in the URL.

echo $keyword;

$keyword = "%" . $keyword . "%";

//Mysql get data from table.
echo"<h1>Show all jokes with the word <em>$keyword</em> :</h1><br>";

$stmt = $mysqli->prepare("SELECT J_ID, J_question, J_answer, u_ID , username FROM jokes_table JOIN users ON ID = jokes_table.u_ID WHERE J_question LIKE ?");

$stmt->bind_param("s", $keyword);

$stmt->execute();
$stmt->store_result();//save and store the result done by mysql.

$stmt->bind_result($J_ID, $J_question, $J_answer, $u_ID , $username);//tell that three things to vome out of dB

//$sql = "SELECT J_ID, J_question, J_answer, u_ID , username FROM jokes_table JOIN users ON ID = jokes_table.u_ID WHERE J_question LIKE '%$keyword%'";


if ($stmt->num_rows > 0) {
 // output data of each row

  echo "<div id='accordion'>";
  while($stmt->fetch()) {
    $safe_joke_question = htmlspecialchars($J_question);
    $safe_joke_answer = htmlspecialchars($J_answer);
   
    echo "<h3>" . $safe_joke_question . "</h3>";

    echo "<div><p>" . $safe_joke_answer . " --submitted by user " . $username . "</p></div>";
  }

echo"</div>";
} else {
  echo "0 results";
}


?>




</div>