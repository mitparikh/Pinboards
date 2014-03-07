<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

	session_start();
	$username = $_SESSION['username'];
	
	$con = mysqli_connect("localhost","root","","pinboards");
	//echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
    

$pictureId = $_GET['pictureId'];

$query = "SELECT imagedata FROM pictures where pid='$pictureId'";

$result = mysqli_query($con, $query);

if($result)
{

	$row = mysqli_fetch_array($result);
	echo $row['imagedata'];
	//likes module :
	//echo "<a href='like.php?boardname=".$boardname."'> 

	
	//comment

//    <html>
//		<form name="commentForm" action = "comment.php" method= "post" >/
//			<br />
//			<input type="text" name="comment">/
//			<input type="submit" name="commentButton"/>
//		</form>
//	</html>
	
}
else
{
	
echo mysql_error();
}

?>