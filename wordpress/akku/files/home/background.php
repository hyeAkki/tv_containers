<html>
<head>
	<script src="background_file/background_js/event.js"></script>
	<script src="background_file/background_js/searching.js"></script>
	<script src="background_file/background_js/searched_reco_event.js">
	</script>
	<script src="background_file/background_js/submited_searched_reco_event.js"></script>
    <link href="../fb_font/font.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../../images/unnamed.png"/>
    <style>
    body
    {
        background:url("../../images/xyz1.jpg");
    }
    a:hover{
        cursor:pointer;
        text-decoration:none;
    }
    </style>
</head>
<body>

<!--Head background-->
<div style="position:fixed;left:0;top:0; height:10%; width:100%; z-index:1;background:url('../../images/111.jpg')">  </div>
<!--Head text-->
<div style="position:fixed;top:0.5%; z-index:2;"> <a href="Home.php" style="text-decoration:none;" onMouseOver="on_head_text()" onMouseOut="out_head_text()"> <img src="../../images/logo1.png" height="50%" width="50%" /></a> </div>
<!--Head logo -->
<div style="position:fixed; z-index:1; display:none;" id="head_text_backgraound">   </div>

<script>
	function bcheck()
	{
		s=document.ut_search.search1.value;
		
		if(s=="")
		{
			return false;
		}
		return true;
	}
</script>
<form name="ut_search" action="Search_Display_submit.php" method="get" onSubmit="return bcheck()">
	<div style="position:fixed; left:30%; top:3%; z-index:1;"> <input type="text" name="search1" style="height:25; width:500;"  onKeyUp="searching();" id="search_text1" placeholder="Search for people" > </div>
	
	<div id="searching_ID"></div> 

	<div style="position:fixed; left:65.2%;top:3.2%; z-index:1;">
	<input type="submit" value=" " style="background-image:url(background_file/background_icons/search.png);">
	</div>
</form>


<?php
		$user=$_SESSION['fbuser'];
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$query1=mysql_query("select * from users where Email='$user'");
		$rec1=mysql_fetch_array($query1);
		$userid=$rec1[0];
		$query2=mysql_query("select * from user_profile_pic where user_id=$userid");
		$rec2=mysql_fetch_array($query2);
		
		$name=$rec1[1];
		$gender=$rec1[4];
		$img=$rec2[2];
?>
	
<div style="position:fixed; left:71.8%; top:0.6%; z-index:1;">
	<table cellspacing="0">
	<tr id="hedarname2">
	
		<td style="padding-left:7;" id="head_img" onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="../profile/Profile.php">  <img src="../../users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:27; width:25;position:fixed;top: 2.8%;"> </a> </td>
		
		<td id="head_name_bg" onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="../profile/Profile.php" id="head_name_font" style="text-decoration:none;color:#00c18e; position:fixed;top:3.4%;right:15.6%;font-size:14; font-weight:900;font-family:lucida Bright; text-transform:capitalize;"> &nbsp;  <?php echo $name; ?> &nbsp;</a> </td>
<td><a href="Group_Message.php"title="Group Chat"style="position:fixed; right:9%; top:2.6%; z-index:1;" ><img src="../../images/set3.png" /></a></td>
		<td id="head_home_bg" onMouseOver="head_home_over()" onMouseOut="head_home_out()"> <a title="Home" href="Home.php" id="head_home_font" style="position:fixed;top:2.7%;right:5%; "> <img src="../../images/set2.png"/>  </a> </td>
     
	</tr>
	</table>
</div>

<!-- options-->
<script src="background_file/background_js/options.js"></script>

        <div style="position:fixed; right:1.7%; top:2.6%; z-index:1;"> <img src="../../images/set1.png" title="Settings" onClick="open_option()"> </div>
        
<div style="display:none" id="option">

<div style="position:fixed; right:1.7%; top:2.6%; z-index:1;"> <img src="../../images/set1.png" height="35" width="35" onClick="close_option()"> </div>

        <div style="position:fixed; left:85%; top:6%; z-index:3; background:#00c18e; height:32%; width:14.8%; box-shadow:0px 2px 10px 1px rgb(0,0,0);"> </div>
        
         <div style="position:fixed; left:86%; top:8.5%; z-index:3;">
        <a href="../profile/Profile.php"> <img src="../../images/set9.png" height="20" width="20" onMouseOver="head_timeline_over()" onMouseOut="head_timeline_out()"></a>
        </div>
        <div style="position:fixed; left:88%; top:5%; z-index:3;">
                 <a href="../profile/Profile.php" style="text-decoration:none;color:white;" id="head_timeline" onMouseOver="head_timeline_over()" onMouseOut="head_timeline_out()" ><h4>Timeline</h4></a> 
        </div>
        <div style="position:fixed; left:86%; top:13.5%; z-index:3;">
             <a href="../profile/about.php"> <img src="../../images/set7.png" height="20" width="20" onMouseOver="head_about_over()" onMouseOut="head_about_out()"/> </a>
        </div> 
        <div style="position:fixed; left:88%; top:10%; z-index:3;">
                <a href="../profile/about.php" style="text-decoration:none; color:white;" id="head_about" onMouseOver="head_about_over()" onMouseOut="head_about_out()"><h4>About</h4></a> 
        </div>
        
        <div style="position:fixed; left:85.8%; top:18%; z-index:3;"> <a href="../profile/photos.php"> <img src="../../images/set5.png" height="20" width="20" onMouseOver="head_photos_over()" onMouseOut="head_photos_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:15%; z-index:3;"><a href="../profile/photos.php" style="text-decoration:none; color:white;" id="head_photos" onMouseOver="head_photos_over()" onMouseOut="head_photos_out()"><h4>Photos</h4></a></div>

	<div style="position:fixed; left:85.8%; top:23%; z-index:3;"> <a href="Settings.php"> <img src="../../images/set4.png" height="25" width="23" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:20%; z-index:3;"><a href="Settings.php" style="text-decoration:none;color:white;" id="head_settings" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"><h4> Account Settings </h4></a></div>

<div style="position:fixed; left:86.1%; top:27.5%; z-index:3;"> <a href="feedback.php"> <img src="../../images/set6.png" height="20" width="20" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"> </a> </div>
<div style="position:fixed; left:88.3%; top:24.5%; z-index:3;"><a href="feedback.php" style="text-decoration:none; color:white;" id="head_feedback" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"><h4> Feedback </h4></a></div>

<div style="position:fixed; left:86%; top:32.5%; z-index:3;"> <a href="../logout/logout.php"> <img src="../../images/set10.png" height="20" width="20"  onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"> </a> </div>
<div style="position:fixed; left:88.3%; top:29.1%; z-index:3;"><a href="../logout/logout.php" style="text-decoration:none; color:white;" id="head_logout" onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"><h4> Logout </h4></a></div>
</div>
           
        
        
        
        
<!--left part-->
<div style="position:fixed; left:1.2%; top:16.5%; z-index:1;">
	<table border="0">
	<tr>
		<td> <a href="../profile/Profile.php"> <img src="../../users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:70; width:70;"> </a> </td>
		<td> &nbsp; <a href="../profile/Profile.php" onMouseOver="left_name_over()" onMouseOut="left_name_out()" style="color:black; font-size:14; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;" id="left_name">   <?php echo $name; ?> </a> </td>
	</tr>
	</table>
</div>

<div style="position:fixed; left:6.5%; top:42%;"> <a href="../profile/Profile.php"> <img src="../../images/set9.png"  onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()"> </a> </div>
<div style="position:fixed; left:9%; top:38%;"><a href="../profile/Profile.php" style="text-decoration:none; font-size:20;color:black;" id="timeline" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()" ><h4>Timeline</h4></a></div>



<div style="position:fixed; left:6.5%; top:47%;"><a href="../profile/about.php"> <img src="../../images/set7.png" onMouseOver="left_about_over()" onMouseOut="left_about_out()"> </a> </div>
<div style="position:fixed; left:9%; top:44%;"><a href="../profile/about.php" style="text-decoration:none; font-size:20;color:black;" id="about" onMouseOver="left_about_over()" onMouseOut="left_about_out()"><h4>About</h4></a></div>



<div style="position:fixed; left:6.5%; top:52%;"> <a href="../profile/photos.php"> <img src="../../images/set5.png" onMouseOver="left_photos_over()" onMouseOut="left_photos_out()"> </a> </div>
<div style="position:fixed; left:9%; top:49%;"><a href="../profile/photos.php" style="text-decoration:none;font-size:20; color:black;" id="photos" onMouseOver="left_photos_over()" onMouseOut="left_photos_out()"><h4>Photos</h4></a></div>

<div style="position:fixed; left:6.6%; top:58%;"> <a href="Group_Message.php"> <img src="../../images/set8.png" height="25" width="23" onMouseOver="left_group_message_over()" onMouseOut="left_group_message_out()"> </a> </div>
<div style="position:fixed; left:9%; top:54%;"><a href="Group_Message.php" style="text-decoration:none;font-size:20; color:black;" id="group_message" onMouseOver="left_group_message_over()" onMouseOut="left_group_message_out()"><h4>Group Chat</h4></a></div>

<div style="position:fixed; left:6.6%; top:63%;"> <a href="Settings.php"> <img src="../../images/set4.png" height="25" width="23" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"> </a> </div>
<div style="position:fixed; left:9%; top:59%;"><a href="Settings.php" style="text-decoration:none;font-size:20; color:black;" id="settings" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"><h4>Settings</h4></a></div>


<!--left hr-->
<hr style="position:fixed;left:18%;top:4.8%;height:100%;width:0; border-color:#CCCCCC; box-shadow:-5px 0px 5px 0px rgb(0,0,0);">
<!--right hr-->
<hr style="position:fixed;left:82%;top:4.8%;height:100%;width:0; border-color:#CCCCCC; box-shadow:5px 0px 5px 0px rgb(0,0,0);">


<!--Online-->
<script>
		function up_online()
		{
		 	document.getElementById("online_bg").style.display='block';
			document.getElementById("down_onlne").style.display='block';
			document.getElementById("down_onlne_img").style.display='block';
			document.getElementById("up_online").style.display='none';
			document.getElementById("up_online_img").style.display='none';
		}
		function down_online()
		{
		 	document.getElementById("online_bg").style.display='none';
			document.getElementById("down_onlne").style.display='none';
			document.getElementById("down_onlne_img").style.display='none';
			document.getElementById("up_online").style.display='block';
			document.getElementById("up_online_img").style.display='block';
		}
</script>
<div style="display:none;" id="online_bg">
<div style="position:fixed; left:84%; top:6%; background-color:#000000; opacity:0.5; height:89.2%; width:16%;z-index:2;"></div>

<?php
	 $query_online=mysql_query("select * from user_status where status='Online'");
	 $online_count=mysql_num_rows($query_online);
	 $online_count=$online_count-1;
	 
	 if($online_count==0)
	 {
?>
		<div style="position:fixed; left:89%; top:8%; color:#FFF;"> Not found </div>
<?php
     }
?>
	<div style="position:fixed; left:84.5%; top:6%;">
	<table>
<?php			
	 
	 
	 while($online_data=mysql_fetch_array($query_online))
	 {
	  	$online_user_id=$online_data[0];
		$query_online_user_data=mysql_query("select * from users where user_id=$online_user_id");
		$query_online_user_pic=mysql_query("select * from user_profile_pic where user_id=$online_user_id");
		$fetch_online_user_info=mysql_fetch_array($query_online_user_data);
		$fetch_online_user_pic=mysql_fetch_array($query_online_user_pic);
		$online_user_name=$fetch_online_user_info[1];
		$online_user_Email=$fetch_online_user_info[2];
		$online_user_gender=$fetch_online_user_info[4];
		$online_user_pic=$fetch_online_user_pic[2];


		

  	
	 if($user!=$online_user_Email)
     {
?>
			 <tr>
			   	   <td> <a href="../view_profile/view_profile.php?id=<?php echo $online_user_id; ?>"> <img src="../../users/<?php echo $online_user_gender; ?>/<?php echo $online_user_Email; ?>/Profile/<?php echo $online_user_pic; ?>" height="30" width="30"> </a> </td>
				   <td style="color:#ffffff;"> <a href="../view_profile/view_profile.php?id=<?php echo $online_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#ffffff;"> <?php echo $online_user_name; ?> </a> &nbsp; </td>	
				   <td><img src="background_file/background_icons/online_symbol.png"  /></td>   
			 </tr>
 <?php	            
	  }
	}
?>
</table>
</div>
</div>



<div style="position:fixed; left:84%; top:95.2%;" id="up_online"> <input type="button" style=" height:30; width:216; border:groove;" value="Online(<?php echo $online_count; ?>)" onClick="up_online()"/>  </div>
<div style="position:fixed; left:84%; top:95.2%; display:none;" id="down_onlne"> <input type="button" style=" height:30; width:216; border: groove;" value="Online(<?php echo $online_count; ?>)" onClick="down_online()" />  </div>
<div style="position:fixed; left:88%; top:95.7%;" id="up_online_img"> <img src="background_file/background_icons/online.png" onClick="up_online()" /></div>
<div style="position:fixed; left:88%; top:95.7%; display:none;"id="down_onlne_img"> <img src="background_file/background_icons/online.png" onClick="down_online()" /></div>

</body>
</html>
