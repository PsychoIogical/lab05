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

$result = mysqli_query($mysqli, $query);
$count = mysql_num_rows($result);
if($count > 0) {
  echo "Sorry, username is already taken!";
} else {
  $newEntry = "INSERT INTO Users (user_id, user_pass)
             VALUES ('$username', '$password);";
  $newDB = mysqli_query($mysqli, $newEntry);
}

echo "Username " . $username . " has been accepted!<br>";

$mysqli->close();
 ?>
