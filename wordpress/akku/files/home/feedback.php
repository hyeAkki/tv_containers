<?php
	session_start();
	if(isset($_SESSION['fbuser']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$user_email=$_SESSION['fbuser'];
		$que_user_info=mysql_query("select * from users where Email='$user_email'");
		$user_data=mysql_fetch_array($que_user_info);
		$userid=$user_data[0];
		
		if(isset($_POST['feedback']))
		{
			$fb_txt=$_POST['feedback_txt'];
			$star=$_POST['star'];
			$fb_time=$_POST['feedback_time'];
			mysql_query("insert into feedback(user_id,feedback_txt,star,Date) values($userid,'$fb_txt','$star','$fb_time')");
		}
		
		if(isset($_POST['delete_feedback']))
		{
			$fb_id=intval($_POST['feedback_id']);
			mysql_query("delete from feedback where feedback_id=$fb_id");
		}
		
		
		include("background.php");
?>
<html>
<head>
<title> Feedback </title>
<style>
#feedback_button
{
	font-size:14px;
	height:30;
	width:80;
	padding:2;
	background-color:#00c18e; color:white;

	font-weight:bold;
}
</style>
<script>
	function blank_feedback_check()
	{
		var feedback_txt=document.feedback_form.feedback_txt.value;
		if(feedback_txt=="")
		{
			return false;
		}
		return true;
	}
	function feedback_name_underLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "underline";
	}
	function feedback_name_NounderLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "none"
	}
	
	function time_get()
	{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			feedback_form.feedback_time.value=time;
	}
</script>
</head>
<body>
	
	<div style="position:absolute; left:30%; top:15%;"> <img src="../../images/step12.png"height="60" width="60"> </div>
	<div style="position:absolute; left:35%; top:13%;"> <h1 style="color:black;"> Feedback </h1> </div>
    <hr style="position:absolute;left:25%;top:25%;height:0.5%;width:50%; border-color:black; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
    
    <div style=" background:black; position:absolute; left:30%; top:35%; height:24%; width:41.4%; z-index:-1; box-shadow:0px 2px 10px 1px rgb(0,0,0);"> </div>
    
    <form method="post" name="feedback_form" onSubmit="return blank_feedback_check()">
	
	<div style="position:absolute; left:30.4%; top:35%;">
		<textarea style="height:100; width:550;" name="feedback_txt" maxlength="100" placeholder="What's on your mind?"></textarea>
	</div>	
    <div style="position:absolute; left:33%; top:50.8%;"> <img src="img/star.png"> </div>
    <div style="position:absolute; left:37%; top:53%;">
    	<select name="star" style=" font-size:16px; height:25; width:40;"> 
			<option value="5"> 5 </option> 
			<option value="4"> 4 </option> 
            <option value="3"> 3 </option> 
			<option value="2"> 2 </option>
            <option value="1"> 1 </option> 
		</select> 
    </div>
    <input type="hidden" name="feedback_time">
    <div style="position:absolute; left:62%; top:53%;"> <input type="submit" value="Feedback" name="feedback" id="feedback_button" onClick="time_get()"> </div>
    </form>
    
<?php
		$que_feedback=mysql_query("select * from feedback order by feedback_id desc");
?>
    <div style="position:absolute; left:20%; top:63%;">
    <table border="0">
<?php
	while($feedback_data=mysql_fetch_array($que_feedback))
	{
		$feedback_id=$feedback_data[0];
		$fb_user_id=$feedback_data[1];
		$fb_txt=$feedback_data[2];
		$fb_star=$feedback_data[3];
		$fb_time=$feedback_data[4];
		$que_fb_user_info=mysql_query("select * from users where user_id=$fb_user_id");
		$fb_user_data=mysql_fetch_array($que_fb_user_info);
		$user_name=$fb_user_data[1];
		$user_email=$fb_user_data[2];
		$user_gender=$fb_user_data[4];
		$que_fb_user_pic=mysql_query("select * from user_profile_pic where user_id=$fb_user_id");
		$fetch_user_pic=mysql_fetch_array($que_fb_user_pic);
		$user_pic=$fetch_user_pic[2];
?>
	<tr>
<?php    
    if($fb_user_id==$userid)
    {
?>
	<td colspan="3"align="right" style="border-top:outset; border-top-width:thick;"> 
			<form method="post">  
				<input type="hidden" name="feedback_id" value="<?php echo $feedback_id; ?>" >
				<input type="submit" name="delete_feedback" title="Delete"value=" " style="background-color:#FFFFFF; border:#FFFFFF; background:url(img/delete_comment.gif)no-repeat;width:1%;height:1%;"> 
			</form>
     </td>
     <td>  </td>
<?php
	}
	else
	{
?>
	<td colspan="3"align="right" style="border-top:outset; border-top-width:thick;">&nbsp;  </td>
     <td>  </td>
     
			
<?php
	}
?>
			
     </tr>
    
	<tr>
    	<td style="padding-left:25;" rowspan="2"> <a href="../profile/Profile.php"><img src="../../users/<?php echo $user_gender; ?>/<?php echo $user_email; ?>/Profile/<?php echo $user_pic; ?>" height="60" width="55">  </td>
        <td colspan="2" style="padding:7;"> <a href="../view_profile/view_profile.php?id=<?php echo $fb_user_id; ?>" style="text-transform:capitalize; text-decoration:none; background:black;color:white;" onMouseOver="feedback_name_underLine(<?php echo $feedback_id; ?>)" onMouseOut="feedback_name_NounderLine(<?php echo $feedback_id; ?>)" id="uname<?php echo $feedback_id; ?>"> <?php echo $user_name; ?> </a>   </td>
       
    </tr>
    <tr>
		<td colspan="2" style=" padding-left:7; "><?php echo $fb_txt; ?></td>
        <td> </td>
        <td> </td>
	</tr>
    <tr>
    	<td> </td>
        <td style=" padding-left:7;"> <span style="color:black; background:#00a99d">  Give's <?php echo $fb_star; ?> star </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:black;"> <?php echo $fb_time; ?> </span> </td>
        <td> </td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<?php
	}
	
?>
   </table></div>
   
   <div style="position:absolute; left:90%; top:100%;" > &nbsp; </div>	

</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>