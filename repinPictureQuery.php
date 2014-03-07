<?php
session_start();
$logged_in_username = $_SESSION['username'];
$original_pinid = $_POST['pinid'];
$boardname_to_pin_on = $_POST['boardRepinSelect'];
$pid = $_POST['pid'];
echo "logged in username : '$logged_in_username'";echo"</br>";
echo "original pinid = '$original_pinid'";echo"</br>";
echo "boardname to pin on = '$boardname_to_pin_on'";echo"</br>";
echo "pid : '$pid'";echo"</br>";echo"</br>";

$con = mysqli_connect("localhost","root","","pinboards");
		if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	
	$query_to_get_boardid = "select boardid from boards where boardname= '$boardname_to_pin_on' and uname= '$logged_in_username'";
	$result_of_boardid = mysqli_query($con,$query_to_get_boardid);
	if($result_of_boardid){
		$row = mysqli_fetch_array($result_of_boardid);
		$boardid = $row['boardid'];
	}
	else{
		echo "failed to get boardid";
	}
	
	echo "pid : '$pid'</br>";
	echo "uname : '$logged_in_username'</br>";
	echo "boardid : '$boardid'</br>";
	echo "repinid : '$original_pinid'</br>";
	
	
	$query = "insert into pin (pid,uname,boardid,repinid)
				values('$pid','$logged_in_username', '$boardid','$original_pinid')"; 
	$result = mysqli_query($con, $query);
	if($result)
	{
		header("location:myBoards.php");
	}
	else {
		echo "failed in repinning";
		die('Error: ' . mysqli_error($con));
	}
	
	
	
?>