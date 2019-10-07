<?php
	session_start();
	if(isset($_SESSION['tempfbuser']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$user=$_SESSION['tempfbuser'];
		$que1=mysql_query("select * from users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$userid=$rec[0];
		$gender=$rec[4];
		if($gender=="Male")
		{
			$que2=mysql_query("select * from user_profile_pic where user_id=$userid");
			$count1=mysql_num_rows($que2);
			if($count1==0)
			{
?>
<?php

	if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
		$path = "../../users/Male/".$user."/Profile/";
		$path2 = "../../users/Male/".$user."/Post/";
		$path3 = "../../users/Male/".$user."/Cover/";
		mkdir($path, 0, true);
		mkdir($path2, 0, true);
		mkdir($path3, 0, true);
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
    	move_uploaded_file($img_tmp_name,"../../users/Male/".$user."/Profile/".$prod_img_path);
		
		mysql_query("insert into user_profile_pic(user_id,image) values('$userid','$img_name')");
		header("location:../step2/Secret_Question1.php");
	} 
?>
<html>
<head>
	<title> Step1 </title>
	<link href="step1_css/step1.css" rel="stylesheet" type="text/css">
    <link href="../../font/font.css" rel="stylesheet" type="text/css">
     <link rel="icon" href="../../images/images.png"/>
     	<script src="step1_js/Image_check.js" language="javascript">
	</script>
</head>
<body>
<div style="position:absolute;left:0;top:0; height:13%; width:100%; z-index:-1;"> <center><img src="../../images/logo1.png"/></center>  </div>
<div style="position:absolute;left:35%;top:25%; height:10%; width:7%; z-index:-1; background:#00c18e; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:45%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:55%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>

<div style="position:absolute; left:36%; top:25%;color:white;"> <h2> Step 1 </h2> </div>
<div style="position:absolute; left:46%; top:25%;color:white;"> <h2> Step 2 </h2> </div>
<div style="position:absolute; left:56%; top:25%;color:white;"> <h2> Step 3 </h2> </div>
<div style="position:absolute; left:35%; top:50%;">
<img src="step1_images/Male.jpg" style=" height:60; width:60;"/> 
</div>
div style="position:absolute; left:35%; top:40%;font-size:28;font-weight:bold;color:white;text-decoration:underline;"> Upload Your Profile Picture  </div>

<div style="position:absolute; left:39%; top:50%;"> 
	<table>
		<tr>
			<td></td> <td>&nbsp;  </td> <td style="text-transform:capitalize;color:white;font-size: 20px;"> <h4><?php echo $rec[1]; ?></h4></td>
		</tr>
	</table> 
</div>

<form method="post" enctype="multipart/form-data" name="uimg" onSubmit="return Img_check();">
	<div style="position:absolute; left:40%; top:65%;">	
		<input type="file" name="file" id="img"/>  
	</div>
	<div style="position:absolute; left:57.5%; top:64.8%; " id="upload">	
		<input type="submit" value="Upload" name="file" id="upload_button"/>	
	</div>
</form>
	<?php
		include("step1_erorr/step1_erorr.php");
	?>
      <div style=" position:absolute; left:16%; top:80%;">
<meter style="height:40; width:1000;" value="10" min="0" max="100"></meter>
</div>
</body>
</html>
<?php
			}
			else
			{
				header("location:../step2/Secret_Question1.php");
			}
		
		}
		else
		{
			header("location:../step1/Step1_Female.php");
		}
	}
	else
	{
		header("location:../../index.php");
	}
?>