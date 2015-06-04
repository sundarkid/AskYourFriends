<?php
$connect=mysqli_connect("mysql3.000webhost.com","a8267023_akurfnd","connect2me","a8267023_akurfnd");
	if (mysqli_connect_errno()) 
	{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


// Date and time
date_default_timezone_set('Asia/Kolkata');
$dat= date("F j, Y, g:i a"); 

// Variables and values 
$user_id = $_POST['user_id'];
$data = stripcslashes($_POST['quiz_data']);
$friends_to_send = stripcslashes($_POST['friends']);
$arr = json_decode($data,true);

// Logging the activity to get the grouping id
$query_loging = "INSERT INTO `new_questions_log` ( `user_id` , `friends_to_send` , `time`) VALUES ('$user_id' , '$friends_to_send' , '$dat' )";
$result1 = mysqli_query($connect,$query_loging);
if($result1)
{
	$query_getting_groupid = "SELECT `group_id` FROM `new_questions_log` WHERE `time`='$dat'";
	$result2 = mysqli_query($connect,$query_getting_groupid);
	if($result2)
	{
		$row = mysqli_fetch_array($result2);
		$grouping_id = $row['group_id'];
		$query_notify_new_info = "INSERT INTO `new_question_info` (`user_id` , `grouping_id` , `friends_to_send`) VALUES ( '$user_id', '$grouping_id' , '$friends_to_send')";
		$result3 = mysqli_query($connect,$query_notify_new_info);
		foreach($arr as $val=>$k)
		{

			$query="INSERT  INTO `new_questions`(`user_id`,`grouping_id`,`question`,`optionA`,`optionB`,`optionC`,`optionD`,`answer`) VALUES ('$user_id', '$grouping_id' ,'".$k['question']."','".$k['optionA']."','".$k['optionB']."','".$k['optionC']."','".$k['optionD']."','".$k['answer']."')";
			$result4=mysqli_query($connect,$query);
		}
	}

	
	// Checking for complete success
	if ($result2 || $result3 || $result4)
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
	
mysqli_close($connect);
	
?>
