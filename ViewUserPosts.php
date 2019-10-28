<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}

$username = $_POST["userSelect"];

$query = "SELECT post_id, my_post FROM Posts WHERE user_id='$username'";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Post ID: " . $row["post_id"] . "<br>";
    echo "Post: \"" . $row["my_post"] . "\"<br><br>";
  }
} else {
  echo "0 posts<br>";
}

$mysqli->close();
?>
