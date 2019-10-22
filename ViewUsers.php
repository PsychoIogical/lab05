<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}

$query = "SELECT user_id FROM Users";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["user_id"] . "<br>";
  }
} else {
  echo "0 results";
}

$mysqli->close();
?>
