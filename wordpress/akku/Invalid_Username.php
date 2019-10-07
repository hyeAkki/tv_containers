<?php
	include("Login.php");
?>
<html>
<head>
<title> Invalid Username </title>
<link rel="icon" href="images/user_delete.png" />
	<style>

		
	 body
    {
        background:url("images/web.jpg");
    }


        		#login_button
		{
			font-size:18px;
			height:35;
			width:80;
			padding:2;
			background-color:#00c18e; color:#FFFFFF;
			border-top:#29447E;
			border-right-color:#29447E;
			border-bottom-color:#1A356E;
			border-left-color:#29447E;
			font-size:15px;
			font-weight:bold;
			box-shadow:5px 0px 10px 1px rgb(0,0,0);
		}
        
	</style>
     <link href="font/font.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="position:absolute;left:0;top:0; height:13%; width:100%; z-index:-1;"> <center><img src="images/logo1.png"/></center>  </div>
<div style="position:absolute;left:13.5%; top:3.3%; font-size:45; font-weight:900; color:#FFFFFF; font-weight:bold;"> </div>

<div style="position:absolute;left:26%; top:25%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:25%; height:60%; width:0.10%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:84.9%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:72.75%; top:25%; height:60%; width:0.10%; background-color:#CCCCCC; "> </div>
<div style="position:absolute; left:27.4%; top:28.2%;font-size:25px;font-weight: bold;color:white">  Invalid Username   </div>


<div style="position:absolute;left:27.4%; top:32.8%; height:1; width:44.05%; background-color:#CCCCCC; "> </div>

<div style="position:absolute;left:27.4%;top:36.2%; height:14%; width:44.05%; z-index:-1; background:#FFEBE8; ">   </div>

	<div style="position:absolute; left:28%; top:37.2%;"> <font size="4"> Incorrect Email </font>  </div>
	<div style="position:absolute; left:28%; top:42.2%; font-size:12;">  The email you entered does not belong to any account.  Please enter a valid email.  </div>
	
<form  method="post">
		<div style="position:absolute; left:35.5%; top:57.2%; font-size:17; color:white;"> Email: </div>
	<div style="position:absolute; left:43.5%; top:57%; font-size:11px; "> <input type="text" name="username" style="width:174;"/> </div>
	<div style="position:absolute; left:35.5%; top:62.2%; font-size:17; color:white;"> Password: </div>
	<div style="position:absolute;left:43.5%; top:62%; font-size:11px; "> <input type="password" name="password" style="width:174;"> </div>
	<div style="position:absolute; left:43.3%; top:66.7%; font-size:12;color:white; ">  <input type="checkbox" checked="checked">   Keep me logged in </div>
	<div style="position:absolute;left:43.5%;top:71.7%; ">  <input type="submit" name="Login" value="Log In" id="login_button" />  </div>
	<div style="position:absolute;left:49.5%;top:72.7%; color:white"> or </div>
	<div style="position:absolute;left:51%;top:72.4%; "> <a href="index.php" style="font-size:20px;color:#00c18e;;text-decoration:none;"> Click Here to Sign up </a> </div>
	<div style="position:absolute;left:43.5%; top:77.2%; font-size:12px;"> <a href='Forgot_Password.php' style="text-decoration:none; color:white;" > Forgot your password? </a> </div>
</body>
</html>

