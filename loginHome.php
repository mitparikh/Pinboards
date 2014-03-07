<html><br><br><br><br></html>
<?php
session_start();
if(!isset($_SESSION['username']))
	{
		//echo "session not set";
		
		header("location:failedLogin.php");
	}
	$username=$_SESSION['username'];
	//echo "<html>";
	echo "<h3> Welcome : "; echo $_SESSION['username']; echo "</h3>";
	//echo "</html>";
	
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
							<li class="top" align="center"><span style="font-family: 'Tahoma'; color: #FFFFFF; font-size: x-large;"><?php echo "$username"; ?></span></li>
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




<!--
<html>
	<h1>Welcome </h1>
	<style>


</style>
<body>
Login Successful
<br />
<br />
<!-- View Profile Button -->
<!--<form name"viewProfileButton" method ="post" action = "viewProfile.php">
		<input type="submit" name ="viewProfile" value="Veiw Profile" />
</form>

<br />
<br />
<!-- Edit Profile Button 
<form name"editProfileButton" method ="post" action = "editProfile.php">
		<input type="submit" name ="loginSubmit" value="Edit Profile" />
</form>
 
 <!--board button
 		<form name = "createBoardButton" action="boardCreate.php" method="POST">
			<input type="submit" value="Create Board"  />
		</form>
		
 <!--Pin Picture button
 		<form name = "pinPictureButton" action="pinPicture.php" method="POST">
			<input type="submit" value="Pin Picture"  />
		</form>
		
 <!--Trial button
 		<form name = "trialButton" action="tempTrial.php" method="POST">
			<input type="submit" value="tempTrial"  />
		</form>

 <!--My pins
 		<form name = "myPinsButton" action="myPins.php" method="POST">
			<input type="submit" value="My Pins"  />
		</form>

 <!--My Boards
 		<form name = "myBoardsButton" action="myBoards.php" method="POST">
			<input type="submit" value="My Boards"  />
		</form>
		
 <!--My Friends
 		<form name = "myFriendsButton" action="displayFriends.php" method="POST">
			<input type="submit" value="My Friends"  />
		</form>

<!--My streams
 		<form name = "myStreamsButton" action="mystreams.php" method="POST">
			<input type="submit" value="My Streams"  />
		</form>
		
<!--Find friends-->
 		<form name = "findFriendsButton" action="findFriends.php" method="POST">
 			<input type="text" name="txtinput" value="Enter name or username of friend" />
			<input type="submit" value="Find"  />
		</form>
<!--View Pending Requests
		 <form name = "viewPendingFriendsButton" action="pendingRequests.php" method="POST">
 			<input type="submit" name="PendingRequestButton" value="View Your Pending Requests" />
		</form>
		
<!--Search Pins
 		<form name = "searchPinForm" action="searchPins.php" method="POST">
 			<input type="text" name="tagOfPicture" value="Enter name or description of picture" />
			<input type="submit" value="Find"  />
		</form>
		
</body>
</html>-->