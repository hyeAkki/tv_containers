<html>
<head>

	<title>UnLiMiTeD_TaLkS</title>
    <link rel="icon" href="images/images.png"/>
    <style>
    body
    {
    background:url("images/background1.jpg")no-repeat;
    background-position:fixed ;  
    background-size:cover; 
    }
  
    input[type="submit"]
    {

        color:#00a99d ;
        background: white;
        font-size: 30;
        width:15%;
        height:15%;
         font-weight:bold;
    }
    </style>
</head>

<body>
<?php

if(isset($_POST["click"]))
{
    header("location:index.php");
}
?>
<form method="post" name="click_here" action="index.php">

<b style="font-size:122; font-family: geneva; color:	#00a99d;" ><center>UnLiMiTeD_TaLkS</center></b><br /><br />
<b style="font-size: 35;color:white;"><center>Want to be a part of UnLiMiTeD_TaLkS...????<br />
Click on the link below <br/>Join free....!!!</center></b>
<center><img src="images/c1.png" width="120" height="120"/></center>
<center><input type="submit" name="click" value="Enter Here"/></center>


</form>
</body>
</html>