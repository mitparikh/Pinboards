<?php
session_start();
$logged_in_username = $_SESSION['username'];
$owner_of_board = $_POST['username_of_owner_of_board'];
$boardname = $_POST['boardname'];
//$streamname = $_POST['streamSelect'];

if(isset($_POST['streamSelect']))
{
	$streamname = $_POST['streamSelect'];
}
elseif(isset($_POST['createStreamName']))
{
	$streamname = $_POST['createStreamName'];
}

	$con = mysqli_connect("localhost","root","root","pinboards");
		if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	$query_for_boardid = "select boardid from boards where boardname = '$boardname' and uname = '$owner_of_board'";
	$result_for_boardid = mysqli_query($con,$query_for_boardid);
	if($result_for_boardid){
		$row = mysqli_fetch_array($result_for_boardid);
		$boardid = $row['boardid'];
	}
	
	$query = "INSERT INTO stream (streamname, uname, boardid)
			VALUES
			('$streamname', '$logged_in_username','$boardid')"; 
	$result = mysqli_query($con, $query);
	 header("location:mystreams.php");
	//HEADER TO MYSTREAMS
?>	