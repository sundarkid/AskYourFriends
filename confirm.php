<?php

$connect = mysqli_connect("mysql3.000webhost.com","a8267023_akurfnd","connect2me","a8267023_akurfnd");
// connecting MySQL Database to php
if (mysqli_connect_errno()) 
{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
}	

// Date and time
date_default_timezone_set('Asia/Kolkata');
$dat= date("F j, Y, g:i a"); 

// Passkey that got from link 
$passkey=$_GET['passkey']; 

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM `temp_user` WHERE `ccode` ='$passkey'";
$result1=mysqli_query($connect,$sql1);	

// If successfully queried 
if($result1)
{
	$rows=mysqli_fetch_array($result1);
	$name=$rows['name'];
	$email=$rows['mail_id'];
	$place = $rows['place'];
	$institution = $rows['institution'];
	$password=$rows['password']; 	
	$phone=$rows['phone']; 	
	$friends = array();
	
	$query="INSERT  INTO `account`(`name`,`mail_id`,`password`,`place`,`institution`, `phone`, `friends`) VALUES
	('$name','$email','$password','$place','$institution', '$phone', '$friends')";
	$result2=mysqli_query($connect,$query);
}

// if not found passkey, display message "Wrong Confirmation code" 
else 
{
	echo "Wrong Confirmation code. <br> Please try again" ;
}

// if successfully moved data from table "temp_user" to table "account" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($result2)
{
	$sql3="DELETE FROM temp_user WHERE confirm_code = '$passkey'";
	$result3=mysqli_query($connect,$sql3);
	echo "Your account has been activated";
}else
{
	echo "Something went wrong. <br> Please try again later."; 
}
?>
	