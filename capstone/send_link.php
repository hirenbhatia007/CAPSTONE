<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Capstone\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\Capstone\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Capstone\PHPMailer-master\src\SMTP.php';

if(isset($_POST['submit_email']) && $_POST['email'])
{
	$email = $_POST['email'];
require('mysqli_connect.php');

$q ="select email,password from users where email= '$email'";
 //var_dump($q);
$r = @mysqli_query($mysqli, $q); 


  if(mysqli_num_rows($r)==1)
  {
    while($row=mysqli_fetch_array($r))
    {
      $email=$row['email'];
      $pass=$row['password'];
    }
    
    $link="<a href='http://localhost:8080/Capstone/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "catchyourart@gmail.com";
    // GMAIL password
    $mail->Password = "Catch@821";
    $mail->SMTPSecure = "tsl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "587";
    $mail->From='catchyourart@gmail.com';
    $mail->FromName='CatchYourArt';
    $mail->AddAddress($email, 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    =  $link . 'Click On This Link to reset password '.$pass.'';
    if($mail->Send())
    {
      echo "GOOD NEWS! Check your email there is something for you";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>