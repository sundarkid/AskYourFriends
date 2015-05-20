<?php

$salt = "jj%asd@f&83!";
$connect = mysqli_connect("mysql3.000webhost.com","a8267023_akurfnd","connect2me","a8267023_akurfnd");

// connecting MySQL Database to php
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();

// Date and time
date_default_timezone_set('Asia/Kolkata');//date stamp

// Variables and values
$dat= date("F j, Y, g:i a");//date & time
$name = $_POST['name'];
$mail_id = $_POST['mail_id'];
$phone = $_POST['phone'];
$place = $_POST['place'];
$institution = $_POST['institution'];
$password = $_POST['password'];
$password = md5($password.$salt);
$ccode = md5(uniqid(rand()));

// SQL query for entering into Table
$query = "INSERT INTO `temp_user` (`name`,`institution`,`place`,`phone`,`mail_id`,`time`,`ccode`,`password`) VALUES ('$name','$institution','$place','$phone','$mail_id','$dat','$ccode','$password')";

$result = mysqli_query($connect,$query);

// Sending mail and server response
if($result)
{
	$subject="Ask Your Friends, Comfirmation mail ";
	$header="from: Sundareswaran <sundareswarancg@gmail.com>";
	$message="Your Comfirmation link \r\n";
	$message.="Click on this link to activate your account \r\n";
	$message.="http://www.askyourfriends.site40.net/confirm.php?passkey=$ccode";// The Activation link
	$sent_mail = mail($mail_id,$subject,$message,$header); // Sending Email
	
	$a = array('result' => "success");
	echo json_encode($a);
}
else
{
	$a = array('result' => "failure");
		echo json_encode($a);
}
?>