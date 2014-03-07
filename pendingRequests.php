<?php


session_start();
$logged_in_username = $_SESSION['username'];


$con = mysqli_connect("localhost","root","root","pinboards");
	//echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//echo "till here its fine";
	$query = "select * from friendship where accpetfriend ";
	$result = mysqli_query($con, $query);

//echo "after query exectution";
if($result)
{
	header("location:loginHome.php");
}



?>
