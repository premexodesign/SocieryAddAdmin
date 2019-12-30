

<?php

if(isSet($_POST['username']))
{
$username = $_POST['username'];

$dbHost = 'localhost'; // usually localhost
$dbUsername = 'root';
$dbPassword = '';
$dbDatabase = 'qikchef';
$db = mysqli_connect('localhost', 'root', '', 'qikchef');


$query = "select email from users where email='".$username."' ";

if ($result=mysqli_query($db,$query))
  {
  
  if ($row=mysqli_fetch_row($result))
    {
	echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
}
}
}


?>