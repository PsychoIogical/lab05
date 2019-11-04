<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}

$postQuery = "SELECT * FROM Posts";
$postResults = $mysqli->query($postQuery);

foreach($_POST['list'] as $selected) {
  echo "You selected: " . $selected . "<br>";
  $del = "DELETE FROM Posts WHERE post_id='$selected'";
  $delResults = $mysqli->query($del);
}
echo "Posts deleted.<br>";
echo "Head <a href=\"AdminHome.html\">back</a> to Admin Home.<br>";

$mysqli->close();
 ?>
