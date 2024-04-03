<?php
require_once('connection-android.php');
$username = $_GET['username'];
$query =mysqli_query($CON,"SELECT * FROM pemberitahuan WHERE username='$username' ORDER BY timestamp DESC");
while($row = mysqli_fetch_assoc($query)){
    $result[] = $row;
  }
  echo json_encode(array('result'=>$result));
?>