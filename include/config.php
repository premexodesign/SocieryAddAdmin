<?php
$db=mysqli_connect("localhost","root","","society_data");
//$db = mysqli_connect('www.qikchef.com', 'helpingdata', 'Chandan@18', 'qikchef');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>