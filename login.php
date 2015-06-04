<?php
	$connect=mysqli_connect("mysql3.000webhost.com","a8267023_akurfnd","connect2me","a8267023_akurfnd");
	if (mysqli_connect_errno()) 
	{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}		
	
	$salt = "jj%asd@f&83!";
    $mail = $_POST['mail'];
	$pass = md5($_POST['pass'].$salt);
	// Retrieve data from table where row that match this passkey 
	$sql1="SELECT * FROM `accounts` WHERE `mail_id` = '$mail' AND `password` ='$pass'";
	$result1=mysqli_query($connect,$sql1);	
	if($result1)
	{

		$rows=mysqli_fetch_array($result1);
		$user=$rows['mail_id'];
		if($user == $mail)
		{
			$name=$rows['name'];
			$email=$rows['mail_id'];
			$id_no = $rows['user_id'];
			//echo "<br>".$name."<br>".$email."<br>".$user."<br>";
			date_default_timezone_set('Asia/Kolkata');
			$dat= date("F j, Y, g:i a"); 
			$ucode=md5(uniqid(rand()));
			$query="INSERT  INTO `logged_in`(`pdate`,`id_no`,`name`, `uid`) VALUES
			('$dat','$id_no','$name', '$ucode')";
			$result2=mysqli_query($connect,$query);
		
			$query="INSERT  INTO `online`(`pdate`,`id_no`,`name`, `uid`) VALUES
			('$dat','$id_no','$name', '$ucode')";
			$result2=mysqli_query($connect,$query);
			
			if($result2)
			{
				$a = array('result' => "success",'uniq_id' => $ucode, 'user_id' => $id_no );
				$a = json_encode($a);
				echo $a;
			}
		}
		// if not found passkey, display message "Wrong Confirmation code" 
		else 
		{
			
			$a = array('result' => "failure", 'uniq_id' => "" );
			$a = json_encode($a);
			echo $a ;
		}
	}
	else{
		$a = array('result' => "failure", 'uniq_id' => "" );
		$a = json_encode($a);
		echo $a ;
	}
	
	mysqli_close($connect);
?>
	 