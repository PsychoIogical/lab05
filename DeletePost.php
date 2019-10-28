<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}

$postQuery = "SELECT * FROM Posts";
$postResults = $mysqli->query($postQuery);

foreach($_POST["list"] as $selected) {
  $del = "DELETE FROM Posts WHERE post_id='$selected'";
}
echo "Posts deleted.<br>";

$mysqli->close();
 ?>
