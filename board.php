<?php
session_start();

	$con = mysqli_connect("localhost","root","","pinboards");
	echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	  
  	$username = $_SESSION['username'];
    
 	$query = "SELECT * from boards where uname = '$username'";
  	$result = mysqli_query($con, $query);
  
	if (!$result)
  	{
  		die('Error: ' . mysqli_error($con));
  	}
  	//echo "Insert Successfull";
  	//header("location: loginHome.php");
	
 ?>
<html>
	<body>
		<form name = "createBoardButton" action="boardCreate.php" method="POST">
			<input type="submit" value="Create Board"  />
		</form>
	</body>
</html>