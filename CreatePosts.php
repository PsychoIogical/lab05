<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}

$username = $_POST["user"];
$mypost = $_POST["textpost"];

$userQuery = "SELECT * FROM Users WHERE user_id='$username'";
$userResults = $mysqli->query($userQuery);

if($userResults->num_rows == 0) {
  echo "Sorry, that account does not exist!<br>";
  echo "<a href=\"CreateUser.html\">Create a new Account</a><br>";
  echo "I'm actually bad at typing in my username, go <a href=\"CreatePosts.html\">back</a> to posting.";
} else {
  $newPost = "INSERT INTO Posts (my_post, user_id)
              VALUES ('$mypost', '$username')";
  $mysqli->query($newPost);
  echo "Post Created, <a href=\"CreatePosts.html\">go back</a> to see it!<br>";
}

$mysqli->close();
 ?>
