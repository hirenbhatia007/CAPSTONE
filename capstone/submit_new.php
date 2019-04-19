<?php
require('mysqli_connect.php');

if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
	
  $email=$_POST['email'];
  $pass=$_POST['password'];
 $q ="update users set password=md5('$pass') where email='$email'";
$r = @mysqli_query($mysqli, $q); 

echo "Your password has been updated.";
?>
<meta http-equiv="refresh" content="0; url=main.php">
<?php
}
?>