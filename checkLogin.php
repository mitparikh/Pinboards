<?php
$con = mysqli_connect("localhost:8888","root","","pinboards");
echo "connected";

if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $username = $_POST['loginUsername'];
  echo "\n";
  echo "userame is : "; echo $username;
  $password = $_POST['loginPassword'];
  echo "\n";
  echo "password is : "; echo $password;
  
  $query = "select * from user where uname = '$username' and password = '$password'";
  $result = mysqli_query($con, $query);
  
  echo "\n";
  if(mysqli_num_rows($result)==1)
  {
  	echo "Login Successfull";
	session_set_cookie_params(0);
	session_start();
	$_SESSION ['username'] = $username;
	//$_SESSION ['password'] = $password; 
	header("location:loginHome.php");
  }
  else 
  {
      echo "login Failed";
	  header("location:failedLogin.php");
  }
  
?>