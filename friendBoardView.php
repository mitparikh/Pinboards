<html><br><br><br><br><br><br><br><br><br><br><br></html>
<?php
session_start();
$loogged_in_username = $_SESSION['username'];
$boardname = $_GET['boardname'];
$username_of_owner_of_board = $_GET['uname_of_owner_of_board'];
//echo $boardname;


$con = mysqli_connect("localhost", "root", "", "pinboards");
//echo "connected";

if (mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "till here its fine";

$query = "select pictures.pid,pictures.tags,pin.pinid 
			from boards join pin join pictures 
				where boards.boardid = pin.boardid and pin.pid = pictures.pid and boards.uname = '$username_of_owner_of_board' and boards.boardname = '$boardname' ";
$result = mysqli_query($con, $query);

//echo "after query exectution";
//echo "</br>";
//echo "</br>";

echo "Following are the images in $boardname : ";
echo "</br>";
echo "</br>";
echo "click on any of the image to like or comment on it";
?>
<html>
	<form name="addToStreamForm" action="addToStream.php" method="post">
		<input type="submit" value="Add this board to your stream">
		<input type="hidden" name="boardname" value="<?php echo "$boardname"; ?>">
		<input type="hidden" name="username_of_owner_of_board" value="<?php echo "$username_of_owner_of_board"; ?>">
	</form>
	<br />
	<br />
	
</html>
<?php
if ($result) {
	//echo "inside If";
	while ($row = mysqli_fetch_array($result)) {
		echo "</br>";	
		echo $row['tags'];
		echo "</br>";
		//echo "<img src=showImage.php?pictureId=".$row['pid']." width=50% height=50%/>";
		showPin($row['pid'], $row['pinid']);
		echo "</br>";
	}
}

function showPin($pid,$pinid){
	//echo "trial";
	echo "</br>";
	
	$con_showPin_function = mysqli_connect("localhost","root","","pinboards");
	//echo "connected";

	if (mysqli_connect_errno($con_showPin_function))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
//	echo "till here its fine";
	
	//IMPORTANT : Dont need the following here may need it elsewhere.
	
	
	//$query_function_to_get_username = "select uname from pin where pinid = '$pinid'";
	//$result_function_to_get_username = mysqli_query($con_showPin_function, $query_function_to_get_username);
	
	//echo "after query exectution";
	//if($result_function_to_get_username){
	//	$row_for_uname = mysqli_fetch_array($result_function_to_get_username);
	//	//echo "</br>";
	//	//echo "$row";
	//	//echo "</br>";
	//	$uname_of_owner_of_pin = $row_for_uname['uname'];
	//}
	
	//FOR BOARDNAME
	$query_function_to_get_boardname = "select boardname,uname from boards where boardid = (select boardid from pin where pinid = '$pinid');";
	$result_function_to_get_boardname = mysqli_query($con_showPin_function, $query_function_to_get_boardname);
	
	echo "after query exectution";
	if($result_function_to_get_boardname){
		//echo "INSIDE IFF OF BOARDNAME";
		$row_for_boardname = mysqli_fetch_array($result_function_to_get_boardname);
		$boardname = $row_for_boardname['boardname'];
		$uname_of_owner_of_board = $row_for_boardname['uname'];
		echo "</br>";
		echo "This pin belongs to board : ";
		echo "<a href='myBoardView.php?boardname=".$boardname."&uname_of_owner_of_board=".$uname_of_owner_of_board."'>".$boardname."</a>";
		//echo $row['boardname'];
		echo "</br>";
	}
	
	//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	//to show the image in the pin:
	//echo "<img src=showImage.php?pictureId=".$pid." width=50% height=50%/>";
	echo "<a href='viewPin.php?boardname=".$boardname."&uname_of_owner_of_board=".$uname_of_owner_of_board."&pinid=".$pinid."'><img src=showImage.php?pictureId=".$pid." width=25% height=25%/></a>";
	
	//likes :
	$query_for_likes = "select numoflikes from pictures where pid = '$pid'";
	$result_of_likes = mysqli_query($con_showPin_function,$query_for_likes);
	if($result_of_likes){
		echo "</br>";
		//echo "INSIDE IFF of LIKES";
		$row_likes = mysqli_fetch_array($result_of_likes);
		echo "</br>";
		echo $row_likes['numoflikes']." LIKES";
		echo "</br>";
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
							<li class="top" align="center"><span style="font-family: 'Tahoma'; color: #FFFFFF; font-size: x-large;"><?php echo "$loogged_in_username"; ?></span></li>
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

