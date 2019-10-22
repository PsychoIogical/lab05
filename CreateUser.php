<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}
$username = $_POST["user"];
$password = $_POST["pass"];
echo "<br>" . $username . $password . "<br>";

$query = "SELECT * FROM Users WHERE user_id='$username'";

$result = $mysqli->query($query);
echo "count: " . $result->num_rows . "<br>";

if($result->num_rows > 0) {
  echo "Sorry, username is already taken!";
} else {
  $newEntry = "INSERT INTO Users (user_id, user_pass)
             VALUES ('$username', '$password')";
  $mysqli->query($newEntry);

  echo "Username " . $username . " has been accepted!<br>";
}

echo "<a href=\"CreateUser.html\"> Go Back</a>";

$mysqli->close();
 ?>
