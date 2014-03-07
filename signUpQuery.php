<?php

$con = mysqli_connect("localhost","root","","pinboards");
echo "connected";

if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $username = $_POST['signUpUsername'];
  echo "\n";
  echo "userame is : "; echo $username;
  $password = $_POST['signUpPassword'];
  $encrypted_password = md5($password);
  echo "\n";
  echo "password is : "; echo $password;
  $emailid = $_POST['signUpEmailid'];
  echo "\n";
  echo "emailId is : "; echo $emailid;
  
  $query = "INSERT INTO user (uname, password, emailid)
			VALUES
			('$username','$encrypted_password','$emailid')";
			
  //$result = mysqli_query($con, $query);
  if (!mysqli_query($con,$query))
  {
  die('Error: ' . mysqli_error($con));
  }
  echo "Insert Successfull";
	session_set_cookie_params(0);
	session_start();  
  	$_SESSION['username']=$username;
	//$_SESSION['password']=$password; 
	header("location: createProfile.php");
?>