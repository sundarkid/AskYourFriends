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

// Variables and values
$sender_id = $_POST['sender_id'];
$reciever_id = $_POST['reciever_id'];
$request_id = md5(uniqid(rand()));

// Adding information to the table 
$sql1="INSERT INTO `adding_friedns` (`sender_id`, `reciever_id`, `request_id`, `time`) VALUES ('$sender_id','$reciever_id', 'request_id', '$dat')";
$result1=mysqli_query($connect,$sql1);	

// If successfully queried 
if($result1)
{
	$a = array('result' => "success" );
	echo json_encode($a);
}

// If something goes wrong 
else 
{
	$a = array('result' => "failure" );
	echo json_encode($a);
}

?>