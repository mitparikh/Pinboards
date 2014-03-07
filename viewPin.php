<html><br><br><br><br><br><br><br><br><br><br><br></html>
<?php

session_start();
$logged_in_user = $_SESSION['username'];
if(isset($_GET['boardname'])){
$boardname = $_GET['boardname'];
}
if(isset($_GET['uname_of_owner_of_board'])){
$owner_of_board_of_pin = $_GET['uname_of_owner_of_board'];
}
if(isset($_GET['pinid'])){
$pinid = $_GET['pinid'];
}
if(isset($_GET['url'])){
	$url = $_GET['url'];
}

	$con_viewPin = mysqli_connect("localhost","root","","pinboards");
	//echo "connected";

	if (mysqli_connect_errno($con_viewPin))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//echo "till here its fine";
	
	$query_to_get_picturetag = "select pictures.tags from pictures join pin where pin.pid = pictures.pid and pin.pinid = '$pinid';";
	$result_to_get_picturetag = mysqli_query($con_viewPin,$query_to_get_picturetag);
	
	if($result_to_get_picturetag){
		echo "</br>";
		$row_picturetag = mysqli_fetch_array($result_to_get_picturetag);
		$tag = $row_picturetag['tags'];
		echo $tag; 
	}
	else {
		die('Error: ' . mysqli_error($con_viewPin));
	}
	
	if(isset($_GET['pid']))
	{
		$pid = $_GET['pid'];
	}
	else {
		$query_to_get_pictureid = "select pid from pin where pin.pinid = '$pinid';";
		$result_to_get_pictureid = mysqli_query($con_viewPin,$query_to_get_pictureid);
		
		if($result_to_get_pictureid){
			echo "</br>";
			$row_pictureid = mysqli_fetch_array($result_to_get_pictureid);
			$pid = $row_pictureid['pid'];
			echo $pid; 
		}
		else {
			die('Error: ' . mysqli_error($con_viewPin));
		}
	}
	echo "</br>";
	echo "<img src=showImage.php?pictureId=".$pid." width=50% height=50%/>";
	
	$query_for_likes = "select numoflikes from pictures where pid = '$pid'";
	$result_of_likes = mysqli_query($con_viewPin,$query_for_likes);
	if($result_of_likes){
		echo "</br>";
		//echo "INSIDE IFF of LIKES";
		$row_likes = mysqli_fetch_array($result_of_likes);
		echo "</br>";
		echo $row_likes['numoflikes']." LIKES";
		echo "</br>";
	}
	
	//TO show Comments :
	$query_to_show_comments = "select comment,uname from comments where pinid = '$pinid'";
	$result_of_show_comment = mysqli_query($con_viewPin, $query_to_show_comments);
	
	if($result_of_show_comment){
		while($row_show_comment = mysqli_fetch_array($result_of_show_comment)){
			echo "</br>";	
			echo $row_show_comment['uname'];
			echo " : ";
			echo $row_show_comment['comment'];
			echo "</br>";
		}
	}
	
	//$return_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	$query_to_get_uname_of_owner_of_pin = "select uname from pin where pin.pinid = '$pinid'";
	$result_to_get_uname_of_owner_of_pin = mysqli_query($con_viewPin, $query_to_get_uname_of_owner_of_pin);
	if($result_to_get_uname_of_owner_of_pin){
		
		//echo "_________INSIDE IF TO FIND UNAME OF PIN________";
		$row_to_get_uname_of_owner_of_pin = mysqli_fetch_array($result_to_get_uname_of_owner_of_pin);
		$uname_of_owner_of_pin = $row_to_get_uname_of_owner_of_pin['uname'];
		trim($uname_of_owner_of_pin);
	}
	
	
	?>
	
	<html>
			<br />
			<input type="button" value="LIKE"  onclick="document.write('<?php like($pid); ?>');" />
		
	
			<form name="commentForm" action="comment.php" method= "post" >
			<br />
			<input type="text" name="comment">
			
			<input type="hidden" name="pinid" value="<?php echo "$pinid"; ?>">
			<input type="hidden" name="owner_of_pin" value="<?php echo "$uname_of_owner_of_pin"; ?>" />
			<input type="submit" name="commentButton" value="Comment"/>

			</form>
			
			
			
			<form name="repinForm" action="repinPicture.php" method= "post" >
			<br />
			<input type="hidden" name="pid" value="<?php echo "$pid"; ?>">
			<input type="hidden" name="pinid" value="<?php echo "$pinid"; ?>">
			<input type="hidden" name="owner_of_pin" value="<?php echo "$uname_of_owner_of_pin"; ?>" />
			<input type="submit" name="repinButton" value="repin"/>

			</form>
			
	</html>

<?php
function like($pid_arg){
	//echo "parent.window.location.reload()";
		//echo " hello in likee FUNCTION !!! ";
	//Header('Location: '.$_SERVER['PHP_SELF']);
	//likes :
	//session_start();
	$username = $_SESSION['username'];
	$con_like_function = mysqli_connect("localhost","root","","pinboards");
	//echo "connected";
	echo "like portion executed!";
	if (mysqli_connect_errno($con_like_function))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//echo "till here its fine";
	
	$query_for_liking = "INSERT INTO likes (pid,uname)
				VALUES
				('$pid_arg','$username')";
	$result_of_liking = mysqli_query($con_like_function,$query_for_liking);
	if($result_of_liking){
	echo '<script>parent.window.location.reload(true);</script>';	
	}
	else{
		//echo "You have already liked this page";
		echo '<script>parent.window.location.reload(true);</script>';
		//echo '<script>alert("You have already liked this pin")</script>';
	}
	
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Login Home Page</title>
        <link rel="stylesheet" type="text/css" media="all" href="wrstyles/style.css" />
        <style type="text/css">
		body
		{
		background-image: url('images/background.jpg');
		background-attachment: fixed;
		background-repeat: no-repeat;
		}
 
		#transbar {position: absolute; left: 0px; top: 0px; width: 1366px; height: 120px; z-index: 2;}
		#transbar {opacity:0.3; filter:alpha(opacity=40);}
		#transbar:hover{opacity:0.6; filter:alpha(opacity=100);}
		#logo {position: absolute; left: 50px; top: 0px; width: 120px; height: 120px; z-index: 2;}
            #boardbutton {position: absolute; left: 251px; top: 12px; width: 120px; height: 38px; z-index: 6;}
			#streambutton {position: absolute; left: 421px; top: 12px; width: 120px; height: 38px; z-index: 5;}
            #pinitbutton {position: absolute; left: 591px; top: 12px; width: 120px; height: 38px; z-index: 7;}
			#unamedropdown {position: absolute; left: 745px; top: 4px; width: 150px; height: 38px; z-index: 9;}
            #unamedropdown ul {list-style-type: none;}
			#unamedropdown .top {background-color: #000000;}
			#unamedropdown ul li.item {display: none;}
			#unamedropdown ul:hover .item {display: block;border: 1px solid black;background-color: #CCCCCC;animation-speed=slow;}
			#searchbutton {position: absolute; left: 931px; top: 12px; width: 46px; height: 38px; z-index: 8;}
			#searchtext {position: absolute; left: 981px; top: 18px; width: 200px; height: 22px; z-index: 4;}
            
			body {text-align: center;}
        </style>
    </head>
    <body id="ifldasb20">
                <img id="transbar" src="images/blackbox.jpg" alt=""/>
				<img id="logo" src="images/afterloginlogo.jpg" alt=""/>
                <form id="loginhomenavbar" name="loginhomenavbar" method="post" enctype="multipart/form-data" action="loginHome.php">
					<input type="image" id="logo" src="images/afterloginlogo.jpg" alt="" name="pinimgbutton" tabindex="0" />
					
				</form>
				
				<form id="loginhomenavbar" name="loginhomenavbar" method="post" enctype="multipart/form-data" action="myBoards.php">
					<input type="image" img id="boardbutton" src="images/boardbutton.jpg" alt="" width="118" height="38" />
					
				</form>
				
				<form id="loginhomenavbar" name="loginhomenavbar" method="post" enctype="multipart/form-data" action="mystreams.php">
					<input type="image" img id="streambutton" src="images/streambutton.jpg" alt="" width="128" height="38" />
					
				</form>
				
				<form id="loginhomenavbar" name="loginhomenavbar" method="post" enctype="multipart/form-data" action="pinPicture.php">
					<input type="image" img id="pinitbutton" src="images/pinitbutton.jpg" alt="" width="120" height="38" />
					
				</form>
					
					<div id="unamedropdown">
						<ul>
							<li class="top" align="center"><span style="font-family: 'Tahoma'; color: #FFFFFF; font-size: x-large;"><?php echo "$logged_in_user"; ?></span></li>
							<li class="item" align="center"><span style="font-family: 'Tahoma'; color:'black'; font-size: medium;">
								<form name="viewProfileDropDown" action="viewProfile.php" method="post">
									<input type="submit"  value="View Profile"/>
								</form></li>
							<li class="item" align="center"><span style="font-family: 'Tahoma'; color:'black'; font-size: medium;">
								<form name="editProfileDropDown" action="editProfile.php" method="post">
									<input type="submit"  value="Edit Profile"/>
								</form></li>
							<li class="item" align="center"><span style="font-family: 'Tahoma'; color:'black'; font-size: medium;">
								<form name="myFriendsDropDown" action="displayFriends.php" method="post">
									<input type="submit"  value="My Friends"/>
								</form></li>
							<li class="item" align="center"><span style="font-family: 'Tahoma'; color:'black'; font-size: medium;">
								<form name="viewPinsDropDown" action="myPins.php" method="post">
									<input type="submit"  value="My Pins"/>
								</form></li>
							<li class="item" align="center"><span style="font-family: 'Tahoma'; color:'black'; font-size: medium;">
								<form name="signOutDropDown" action="signOut.php" method="post">
									<input type="submit"  value="Sign Out"/>
								</form></li>
						</ul>
					</div>
					
				<form id="loginhomenavbar" name="loginhomenavbar" method="post" enctype="multipart/form-data" action="searchPins.php">
					<input type="image" img id="searchbutton" src="images/searchbutton.jpg" alt="" width="61" height="50" />
                    <input type="text" id="searchtext" name="tagOfPicture" />
				</form>
				
    </body>
</html>
