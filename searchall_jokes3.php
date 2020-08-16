<?php
//if their are any values in the table, dispaly them.
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";                                    //line comes form webserver.


//Mysql get data from table.
$sql = "SELECT J_ID, J_question, J_answer, u_ID FROM jokes_table";      
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h3>" . $row['J_question'] . "</h3>";

    echo "<div><p>" . $row['J_answer'] . " submitted by user #" . $row["u_ID"] . "</p></div>";
  }
} else {
  echo "0 results";
}
?>