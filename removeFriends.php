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

// Variabloes and values
$sender_id = $_POST['sender_id'];
$remove_id = array($_POST['remove_id']);

// Getting the friends list of sender
$query1 = "SELECT friends FROM `account` WHERE `user_id` = '$sender_id'";
$result1 = mysqli_query($query1);
// If successfully got the values
if($result1)
{
	$row = mysqli_fetch_array($result1);
	$friends = $row['friends'];
	if(in_array($remove_id, $friends)){
		array_diff($friends, $remove_id);
	}
}
?>