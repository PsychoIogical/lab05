<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dyoder97", "partytime", "dyoder97");

//Check Connection
if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}
echo "<a href=\"AdminHome.html\">Admin Home</a><br><br>";

$query = "SELECT user_id FROM Users";
$result = $mysqli->query($query);
echo "<table>
      <tr>
      <th>Username</th>
      </tr>";
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["user_id"] . "</td></tr>";
  }
} else {
  echo "<tr><td>0 results</td></tr>";
}
echo "</table>";

$mysqli->close();
?>
