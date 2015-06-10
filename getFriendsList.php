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
$unique_id = $_POST['unique_id'];

// Adding information to the table 
$getting_friends_list = "SELECT `friends` FROM `account` WHERE `user_id` = '$sender_id'";
$result1=mysqli_query($connect,$getting_friends_list);	

// If successfully queried 
if($result1)
{
	$row = mysqli_fetch_array($result1);
	$id_no = $row['friends'];
	$id_no = json_decode($id_no);
	// Checking for friends names
	if(empty($id_no)){
		$a = array('result' => "empty" );
		echo json_encode($a);
	}
	else{
		// If friends are available getting their name
		foreach($id_no as $friend){
			$sql1 = "SELECT `name` FROM `account` WHERE `user_id` = '$friend'";
			$result2 = mysqli_query($connect,$sql1);
			if($result2){
				$r = mysqli_fetch_array($result2);
				$friend_detail[] = array('id_no' => $friend , 'name' => $r['name']);
			}
		}
		$contentArr = str_split(json_encode($friend_detail), 65536);
		foreach ($contentArr as $part) 
		{
			echo $part;
		}
	}
	
}
// If something goes wrong 
else 
{
	$a = array('result' => "failure" );
	echo json_encode($a);
}

?>