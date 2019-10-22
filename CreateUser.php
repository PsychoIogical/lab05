<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}
$username = $_POST["user"];
$password = $_POST["pass"];

$query = "SELECT * FROM Users WHERE user_id='$username'";

$result = $mysqli->query($query);

if($result->num_rows > 0) {
  echo "Sorry, username is already taken!<br><br>";
  echo "<a href=\"CreateUser.html\">Go Back</a>";
} else {
  $newEntry = "INSERT INTO Users (user_id, user_pass)
             VALUES ('$username', '$password')";
  $mysqli->query($newEntry);

  echo "Username " . $username . " has been accepted!<br><br>";
  echo "<a href=\"CreatePost.html\">Go create a new post!</a>";
}


$mysqli->close();
 ?>
