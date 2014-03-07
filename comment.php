<?php
session_start();
$username = $_SESSION['username'];
//trim($username);
echo "the user logged in is : </br>$username";

$comment = $_POST['comment'];
$pinid = $_POST['pinid'];
//echo "____pin id_____$pinid";

$owner_of_pin = $_POST['owner_of_pin'];
trim($owner_of_pin);
echo "this pin belongs to : </br>$owner_of_pin</br>"; 
//echo $comment;

$con = mysqli_connect("localhost","root","root","pinboards");
	//echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

$query_to_check_if_board_open_to_all = "SELECT boardfriendcomment
								FROM boards
									WHERE boardid = (SELECT boardid
														FROM pin
															WHERE pin.pinid =  '$pinid' )";
$result_of_comment_check = mysqli_query($con,$query_to_check_if_board_open_to_all);

//if query successfull
if($result_of_comment_check)
{
	$row = mysqli_fetch_array($result_of_comment_check);
	$check = strcmp($username, $owner_of_pin);
	//echo "______";echo "$check"; echo"_______";
	//if board open for all to comment
	if($row['boardfriendcomment'] == "0" || strcmp($username, $owner_of_pin)=="0"){
		comment_function($pinid,$username,$comment);
	}
	else {
		$query_to_check_friendship = " SELECT f1.sendfriend,f2.sendfriend FROM friendship f1 JOIN friendship f2
										WHERE f1.sendfriend =  '$username' and f1.acceptFriend = '$owner_of_pin' and 
        									f2.sendfriend = '$owner_of_pin' and f2.acceptfriend = '$username'";
		$result_to_check_friendship = mysqli_query($con,$query_to_check_friendship);
		if($result_to_check_friendship)
		{
			if(mysqli_num_rows($result_to_check_friendship)== '1')
			{
				comment_function($pinid,$username,$comment);
			}
			else {
				echo "you have to be friends with this person to be able to comment";
			}
		}
	}
}




function comment_function($pinid,$username,$comment){
	
$con_function = mysqli_connect("localhost","root","","pinboards");
	//echo "connected";
	echo "inside comment function </br>";
	if (mysqli_connect_errno($con_function))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "INSERT INTO comments
	                    (pinid,uname,comment)
	                    VALUES
	                    ('$pinid','$username','$comment');";
	
	$result = mysqli_query($con_function, $query);
	
	if($result)
	{
		
		//$row = mysqli_fetch_array($result);
		//echo $row['imagedata'];
		echo "comment inserted";
		echo "</br>";
		//echo "____________________$return_url__________________";
		//likes module :
		//echo "<a href='like.php?boardname=".$boardname."'> 
		//unset($_SESSION['pinid']);
		echo "<hr>";
		header("Location: viewPin.php?pinid=".$pinid);
	}
	else
	{
  	die('Error: ' . mysqli_error($con_function));
	}

	//header("location : $return_url");
	//header("location:".$return_url.");
	
}


?>
