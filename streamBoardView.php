<html><br><br><br><br><br><br><br><br><br><br><br>
	<body>
		<b> Below are the boards that you are following in you stream : </b> 
	</body>
</html>
<?php
session_start();
$logged_in_username = $_SESSION['username'];
$streamname = $_GET['streamname'];
echo "<b>$streamname</b>";
echo "</br>";
echo "</br>";
echo "<b>click on any of the pictures to see more pins of that board</b>";

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
							<li class="top" align="center"><span style="font-family: 'Tahoma'; color: #FFFFFF; font-size: x-large;"><?php echo "$logged_in_username"; ?></span></li>
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


<?php
	$con = mysqli_connect("localhost","root","root","pinboards");
	//echo "connected";

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//echo "till here its fine";


	$query_to_get_boardid = "select boardid from stream where uname = '$logged_in_username' and streamname='$streamname'";
	$result_of_get_boardid = mysqli_query($con,$query_to_get_boardid);
	
	if($result_of_get_boardid){
		while($row_of_get_boardid = mysqli_fetch_array($result_of_get_boardid)){
			$boardid = $row_of_get_boardid['boardid'];
			$query = "select boardname, uname from boards where boardid = '$boardid'";
			$result = mysqli_query($con, $query);
						
			//echo "after query exectution";
			
			if($result)
			{
				//echo "inside If";
				while($row = mysqli_fetch_array($result))
				{
					echo "</br>";
					echo $row['boardname'];
					//$_SESSION['boardname'] = $row['boardname'];
					$boardname = $row['boardname'];
					$username_of_owner = $row['uname'];
					echo "</br>";
					$query_to_get_pid = "SELECT pid 
									FROM pin
										WHERE boardid =  '$boardid'
											GROUP BY boardid ";
					$result_to_get_pid = mysqli_query($con,$query_to_get_pid);
					if($result_to_get_pid){
						$row_to_get_pid = mysqli_fetch_array($result_to_get_pid);
						$pid = $row_to_get_pid['pid'];
					}
					
					echo "<a href='friendBoardView.php?boardname=".$boardname."&uname_of_owner_of_board=".$username_of_owner."'><img src=showImage.php?pictureId=".$pid." width=25% height=25%/></a>";
					echo "</hr>";
				}
			}	
		}
	}



?>
