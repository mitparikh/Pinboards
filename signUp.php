<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Signup Page</title>
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
		#logo {position: absolute; left: 50px; top: 0px; width: 360px; height: 120px; z-index: 3;}
		
			#loginbox {position: absolute; left: 360px; top: 160px; width:470px; height:350px; z-index:1;}
			#loginbox {opacity:0.3; filter:alpha(opacity=40);}
            #lblunametxt {position: absolute; left: 410px; top: 240px; width: 100px; height: 25px; z-index: 5;}
            #unametxt {position: absolute; left: 500px; top: 240px; width: 256px; height: 24px; z-index: 4;}
            #lblpasstxt {position: absolute; left: 410px; top: 280px; width: 100px; height: 25px; z-index: 7;}
            #passtxt {position: absolute; left: 500px; top: 280px; width: 256px; height: 24px; z-index: 6;}
            #lblemailtxt {position: absolute; left: 430px; top: 320px; width: 34px; height: 16px; z-index: 10;}
            #emailtxt {position: absolute; left: 500px; top: 320px; width: 256px; height: 24px; z-index: 9;}
			#signupbutton {position: absolute; left: 500px; top: 370px; width: 260px; height: 40px; z-index: 8;}
            body {text-align: center;}
        </style>
    </head>
    <body id="ifldasb18">
                <img id="loginbox" src="images/loginbox.jpg" alt=""/>
				<img id="logo" src="images/logotext.jpg" alt=""/>
				<img id="transbar" src="images/blackbox.jpg" alt=""/>
                <form id="signupform" name="signupform" method="post" enctype="multipart/form-data" action="signUpQuery.php">
                    <label id="lblunametxt" for="unametxt">Username:</label>
                    <input type="text" id="unametxt" name="signUpUsername" maxlength="45" />
                    <label id="lblpasstxt" for="passtxt">Password :</label>
                    <input type="password" id="passtxt" name="signUpPassword" maxlength="45" />
                    <label id="lblemailtxt" for="emailtxt">email:</label>
                    <input type="email" id="emailtxt" name="signUpEmailid" maxlength="45" />
                    <input type="submit" id="signupbutton" name="signupbutton" value="Submit" />
                </form>
    </body>
</html>



<!--
<html>
	<form action="signUpQuery.php" method="post" name="signUpForm">
		<br />
		Please Enter the following details:
		<br />
		Username : <input type = "text" name="signUpUsername" /> <br />
		Password : <input type="password" name = "signUpPassword" /> <br />
		Email : <input type="email" name="signUpEmailid" /> <br />
		<input type="submit" name ="signUp" value="SIGNUP" />
	</form>
</html> -->