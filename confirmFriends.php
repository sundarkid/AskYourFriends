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
$reciever_id = $_POST['reciever_id'];
$request_id = $_POST['request_id'];

// checking for validity of request
$query1 = "SELECT * FROM `adding_friedns` WHERE `reciever_id` = '$reciever_id' AND `request_id` = '$request_id'";
$result1 = mysqli_query($connect,$query1);

// If request is found
if($result1)
{
	$rows=mysqli_fetch_array($result1);
	$sender_id = $rows['sender_id'];

	// getting the data of sender
	$query2 = "SELECT `friends` FROM `account` WHERE `id_no` = '$sender_id'";
	$result2 = mysqli_query($connect,$query2);
	// if found successfully
	if($result2)
	{
		$rows = mysqli_fetch_array($result2);
		$friends = json_decode($rows['friends']);
		$friends[] = array($reciever_id);
		$friends_json = json_encode($friends);
		$query3 = "UPDATE `account` SET `friends` = '$friends_json' WHERE `user_id` = '$sender_id'";
		$result3 = mysqli_query($connect,$query3);
	}
	// getting the data of reciever
	$query4 = "SELECT `friends` FROM `account` WHERE `id_no` = '$reciever_id'";
	$result4 = mysqli_query($connect,$query4);
	// if found successfully
	if($result4)
	{
		$rows = mysqli_fetch_array($result4);
		$friends = json_decode($rows['friends']);
		$friends[] = array($sender_id);
		$friends_json = json_encode($friends);
		$query5 = "UPDATE `account` SET `friends` = $friends WHERE `user_id` = '$reciever_id'";
		$result5 = mysqli_query($connect,$query5);
	}
	
	if ($result2 && $result3 && $result4 && $result5)
	{
		$sql6="DELETE FROM `adding_friedns` WHERE `reciever_id` = '$reciever_id' AND `sender_id` = '$sender_id' AND `request_id` = '$request_id'";
		$result6 = mysqli_query($connect,$sql3);
	}

	// Checking for complete success
	if ($result2 && $result3 && $result4 && $result5 && $result6)
	{
		$a = array('result' => "success" );
		echo json_encode($a);
	}
	else
	{
		$a = array('result' => "failure" );
		echo json_encode($a);
	}
}
else
{
	$a = array('result' => "failure" );
	echo json_encode($a);
}

?>