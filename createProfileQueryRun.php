<?php
session_start();

	$con = mysqli_connect("localhost","root","root","pinboards");
	echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  
  	$username = $_SESSION['username'];
	echo $username;
  	$fname = $_POST['fname'];
	echo $fname;
	$lname = $_POST['lname'];
	echo $lname;
	$dob = $_POST['dob'];
	echo $dob;
	$hometown = $_POST['hometown'];
	$summary = $_POST['summary'];
	$interests = $_POST['interests'];
  
    
 	$query = "INSERT INTO userinfo (uname,fname,lname,dob,hometown,summary,interests)
				VALUES
				('$username','$fname','$lname','$dob','$hometown','$summary','$interests')";
   // $query = "UPDATE userinfo SET fname ='$fname' , lname='$lname', dob = '$dob', hometown = '$hometown', summary = '$summary',interests = '$interests' where uname = '$username'";
  	$result = mysqli_query($con, $query);
  
  	echo "\n";
	if (!$result)
  	{
  	die('Error: ' . mysqli_error($con));
  	}
  	echo "Insert Successfull";
  	header("location: loginHome.php");
 ?>