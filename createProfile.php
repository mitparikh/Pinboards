
<?php
session_start();
if(!isset($_SESSION['username']))
	{
		//echo "session not set";
		header("location:failedLogin.php");
	}
	
	echo "<html>";
	echo "<h1> Welcome : "; echo $_SESSION['username']; echo "</h1>";
	echo "</html>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Create Profile Page</title>
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
			 #createprofiletxt {position: absolute; left: 524px; top: 140px; width: 150px; height: 30px; z-index: 20;}
			#loginbox {position: absolute; left: 360px; top: 180px; width: 470px; height: 480px; z-index: 1;}
            #loginbox {opacity:0.3; filter:alpha(opacity=40);}
            #lblfnametxt {position: absolute; left: 410px; top: 240px; width: 40px; height: 26px; z-index: 9;}
            #fnametxt {position: absolute; left: 500px; top: 240px; width: 124px; height: 26px; z-index: 8;}
            #lnametxt {position: absolute; left: 640px; top: 240px; width: 124px; height: 26px; z-index: 10;}
			#lbldobtxt {position: absolute; left: 403px; top: 279px; width: 100px; height: 26px; z-index: 5;}
            #dobtxt {position: absolute; left: 500px; top: 280px; width: 265px; height: 26px; z-index: 4;}
			#lblcitytxt {position: absolute; left: 410px; top: 320px; width: 31px; height: 26px; z-index: 11;}
            #citytxt {position: absolute; left: 500px; top: 320px; width: 265px; height: 26px; z-index: 7;}
			#lblintereststxt {position: absolute; left: 410px; top: 410px; width: 62px; height: 26px; z-index: 17;}
            #intereststxt {position: absolute; left: 500px; top: 410px; width: 265px; height: 60px; z-index: 16;}
            #lblsummarytxt {position: absolute; left: 410px; top: 490px; width: 60px; height: 25px; z-index: 19;}
            #summarytxt {position: absolute; left: 500px; top: 490px; width: 265px; height: 60px; z-index: 18;}
            #signupbutton {position: absolute; left: 500px; top: 580px; width: 265px; height: 40px; z-index: 6;}
 
            body {text-align: center;}
        </style>
    </head>
    <body id="ifldasb19">
                <img id="transbar" src="images/blackbox.jpg" alt=""/>
				<img id="logo" src="images/afterloginlogo.jpg" alt=""/>
                <div id="createprofiletxt">
                    <span style="color: #000000; font-size: x-large;">Create Profile</span>
                </div>
                <img id="loginbox" src="images/loginbox.jpg" alt="" width="390" height="270" />
                <form id="signupform" name="signupform" method="post" enctype="multipart/form-data" action="createProfileQueryRun.php" onsubmit="return(validate());">
                    <label id="lblfnametxt" for="fnametxt">Name:</label>
                    <input type="text" id="fnametxt" name="fname" maxlength="45" />
                    <input type="text" id="lnametxt" name="lname" maxlength="45" />
                    <label id="lbldobtxt" for="dobtxt">Date of birth :</label>
                    <input type="date" id="dobtxt" name="dob" maxlength="45" />
                    <label id="lblcitytxt" for="citytxt">City:</label>
                    <input type="text" id="citytxt" name="hometown" maxlength="45" />
                    <label id="lblintereststxt" for="intereststxt">Interests:</label>
                    <textarea id="intereststxt" name="interests" cols="1" rows="1"></textarea>
                    <label id="lblsummarytxt" for="summarytxt">Summary:</label>
                    <textarea id="summarytxt" name="summary" cols="1" rows="1"></textarea>
                    <input type="submit" id="signupbutton" name="signupbutton" value="Submit" />
                </form>
    </body>
</html>



<!--
<html>-->
	<script type="text/javascript">
	
	// Form validation code will come here.
	function validate()
	{
	 
	   if( document.createProfileForm.fname.value == "" )
	   {
	     alert( "Please provide your name!" );
	     document.createProfileForm.fname.focus() ;
	     return false;
	   }
	   if( document.createProfileForm.lname.value == "" )
	   {
	     alert( "Please provide your Email!" );
	     document.createProfileForm.lname.focus() ;
	     return false;
	   }

	   return( true );
	}
	
</script>
<!--
	<form name="createProfileForm" action="createProfileQueryRun.php" method="post" onsubmit="return(validate());">
		
		First Name : <input type="text" id = "fname" name="fname"><br />
		Last Name : <input type = "text" id = "lname" name="lname"><br />
		Date of Birth : (yyyy-mm-dd) <input type ="date" name = "dob"/><br />
		Hometown : <input type="text" name="hometown" /> <br />
		Summary : <textarea row = "4" columns = "50"name="summary" /> </textarea><br />
		Interests : <input type="text" name="interests"/> <br />
		
		<input type="submit" name="createProfileSubmit" />
	</form>
</html>-->
