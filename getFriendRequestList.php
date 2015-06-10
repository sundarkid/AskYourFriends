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

// Adding information to the table 
$query_getting_groupid = "SELECT * FROM `adding_friedns` WHERE `reciever_id` = '$sender_id'";
$result1=mysqli_query($connect,$sql1);	

// If successfully queried 
if($result1)
{
	while($row=mysqli_fetch_array($result)) 
	{
		$data[] = array('request_id' => $row['request_id'], 'sender_id' => $row['sender_id']);
	}
	
	$contentArr = str_split(json_encode($data), 65536);
	foreach ($contentArr as $part) 
	{
		echo $part;
	}
}

// If something goes wrong 
else 
{
	$a = array('result' => "failure" );
	echo json_encode($a);
}

?>