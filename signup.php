<?php
$salt = "jj%asd@f&83!";
$connect = mysqli_connect("mysql3.000webhost.com","a8267023_akurfnd","connect2me","a8267023_akurfnd");

// connecting MySQL Database to php
$connect=mysqli_connect("mysql15.000webhost.com","a4613629_ashwin","myaz290d","a4613629_post");
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

?>