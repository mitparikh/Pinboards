<?php
session_start();
if(!isset($_SESSION['username']))
	{
		//echo "session not set";
		header("location:failedLogin.php");
	}


	$con = mysqli_connect("localhost","root","","pinboards");
	echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	  
  	$username = $_SESSION['username'];
	$boardname = $_POST['boardName'];
	$boardfriendcomment = $_POST['comment_or_not'];
    echo "\n";
    echo $boardfriendcomment;
	
	if($boardfriendcomment == "Everyone")
	{
		$boardfriendcomment = '0';
		echo "in new ";
	}
	else {
		$boardfriendcomment = '1';
	}
	echo "\n";
	echo $boardfriendcomment;
 	$query = "INSERT INTO boards (uname, boardname, boardfriendcomment )
			VALUES
			('$username','$boardname','$boardfriendcomment')";
  	$result = mysqli_query($con, $query);
  
	if (!$result)
  	{
  		die('Error: ' . mysqli_error($con));
  	}
	echo "\n";
	echo "Insert Successfull";
  	header("location: loginHome.php");
	
 ?>
