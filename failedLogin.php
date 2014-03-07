<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Login Page</title>
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
		#logo {position: absolute; left: 50px; top: 0px; width: 360px; height: 120px; z-index: 2;}
			#loginbox {position: absolute; left: 360px; top: 160px; width: 470px; height: 350px; z-index: 2;}
			#loginbox {opacity:0.3; filter:alpha(opacity=40);}
			#lblunametxt {position: absolute; left: 410px; top: 240px; width: 100px; height: 25px; z-index: 5;}
            #unametxt {position: absolute; left: 500px; top: 240px; width: 256px; height: 24px; z-index: 4;}
            #lblpasstxt {position: absolute; left: 410px; top: 280px; width: 100px; height: 25px; z-index: 7;}
            #passtxt {position: absolute; left: 500px; top: 280px; width: 256px; height: 24px; z-index: 6;}
            #loginbutton {position: absolute; left: 500px; top: 320px; width: 260px; height: 40px; z-index: 8;}
            #or {position: absolute; left: 410px; top: 360px; width: 360px; height: 20px; z-index: 9;}
            #signupbutton {position: absolute; left: 500px; top: 420px; width: 260px; height: 40px; z-index: 10;}
            /*#container {position:relative; margin: 0 auto; width: 1366px; height: 510px; text-align:left;}
            #inner-container {position: relative; width: 1366px; height: 510px;}*/
            body {text-align: center;}
        </style>
    </head>
<body id="ifldasb4">
                <img id="transbar" src="images/blackbox.jpg" alt=""/>
                <img id="loginbox" src="images/loginbox.jpg" alt=""/>
				<img id="logo" src="images/logotext.jpg" alt=""/>
                <form id="loginform" name="loginform" method="post" enctype="multipart/form-data" action="checkLogin.php">
                    <label id="lblunametxt" for="unametxt">Username:</label>
                    <input type="text" id="unametxt" name="loginUsername" maxlength="45" />
                    <label id="lblpasstxt" for="passtxt">Password :</label>
                    <input type="password" id="passtxt" name="loginPassword" maxlength="45" />
                    <input type="submit" id="loginbutton" name="loginbutton" value="Login" />
                </form>
                <form id="signUpform" name="signUpform" method="post" enctype="multipart/form-data" action="signUp.php">
                	<input type="submit" id="signupbutton" name="signupbutton" value="Sign Up"/>
                </form>
                
                <div id="or">
                    <p>----------------------------OR----------------------------</p>
        </div>
    </body>
</html>
<?php

?>



<html>
	<h1>Login Page</h1>
	<br />
	<h1> Login Failed, Please Try Again</h1>
	<br>
	<form name"loginForm" method ="post" action = "checkLogin.php">
		Username : <input type="text" name = "loginUsername" id="loginUsername" size="50"><br />
		Password : <input type="password" name = "loginPassword" id="loginPassword" size="50" ><br />
		
		<input type="submit" name ="loginSubmit" value="Login" />

	</form>
	
	<form name"loginForm" method ="post" action="signUp.php" >
		<br />
		Not a user, click here to sign up.
		<br />
		<input type="submit" name ="signupSubmit" value="SIGNUP" />
	</form>

</html>