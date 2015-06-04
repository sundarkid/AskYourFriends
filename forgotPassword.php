<?php

	$connect = mysqli_connect("mysql3.000webhost.com","a8267023_akurfnd","connect2me","a8267023_akurfnd");

	// connecting MySQL Database to php
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	// Date and time
	date_default_timezone_set('Asia/Kolkata');//date stamp

	// Variables and values
	$dat= date("F j, Y, g:i a");//date & time7
	$mail_id = $_POST['mail_id'];

	// Checking for duplicate entry of user
	$check = "SELECT `user_id` FROM `accounts` WHERE `mail_id` = '$mail'";
	$resultCheck = mysqli_query($connect,$check);
	if($resultCheck)
	{

		$ccode = md5(uniqid(rand()));
		$row = mysqli_fetch_array($resultCheck);
		$id_no = $row['user_id'];
		if($id_no != null){
			// SQL query for entering into Table
		$query = "INSERT INTO `password_recovery` (`id_no`,`uid`) VALUES ('$id_no','$ccode')";

		$result = mysqli_query($connect,$query);

		// Sending mail and server response
		if($result)
		{
			$subject="Ask Your Friends, Comfirmation mail ";
			$header="from: Kidd <sundareswarancg@gmail.com>";
			$message="Reset password \r\n";
			$message.="Click on the link to change your password. \r\n";
			$message.="http://askyourfriend.in/passwordConfirm.php?passkey=$ccode&sno=$id_no";// The Activation link
			$message.="<b>If you did not request for a change of password please ignore this message.</b> \r\n";
			$sent_mail = mail($mail_id,$subject,$message,$header); // Sending Email
			
			$a = array('result' => "success");
			echo json_encode($a);
		}
		else
		{
			$a = array('result' => "failure");
				echo json_encode($a);
		}
		}
		
	}
	else if (!$resultCheck) {
		$a = array('result' => "failure",'message' => "not found");
			echo json_encode($a);
	}else{
		$a = array('result' => "failure");
			echo json_encode($a);
	}
	

	mysqli_close($connect);
?>