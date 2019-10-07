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
		$que2=mysql_query("select * from user_secret_quotes where user_id=$userid");
		$rec2=mysql_fetch_array($que2);
		$q2=$rec2[3];
		$a2=$rec2[4];
		if($q2=="" && $a2=="")
		{
			$que3=mysql_query("select * from user_secret_quotes where user_id=$userid");
			$count3=mysql_num_rows($que3);
			if($count3>0)
			{
		
?>
<?php
	if(isset($_POST['Finish']))
	{
		$que2=$_POST['que'];
		$ans2=$_POST['ans'];
		
		mysql_query("update user_secret_quotes set Question2='$que2',Answer2='$ans2' where user_id=$userid");
		
		$que_user_data=mysql_query("select * from users where Email='$user';");
		$user_data=mysql_fetch_array($que_user_data);
		$userid=$user_data[0];
		$user_join_time=$user_data[6];
		mysql_query("insert into user_post(user_id,post_txt,post_time,priority) values($userid,'Join Faceback','$user_join_time','Public');");
		mysql_query("insert into user_status values($userid,'Online')");
		mysql_query("insert into user_info(user_id) values($userid)");
		
		session_start();
		$_SESSION['fbuser']=$user;
		header("location:../../files/home/Home.php");
	}
?>
<html>
<head>
	<title> Step3 </title>

<link rel="icon" href="../../images/images.png"/>

	<link href="step3_css/step3.css" rel="stylesheet" type="text/css">
    <link href="../../font/font.css" rel="stylesheet" type="text/css">
  	<script src="step3_js/que_check.js" language="javascript">
	</script>
</head>
<body>
<div style="position:absolute;left:0;top:0; height:13%; width:100%; z-index:-1;"> <center><img src="../../images/logo1.png"/></center>  </div>
<div style="position:absolute;left:35%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:45%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:55%;top:25%; height:10%; width:7%; z-index:-1; background:#00c18e; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>

<div style="position:absolute; left:36%; top:25%;color:white;"> <h2> Step 1 </h2> </div>
<div style="position:absolute; left:46%; top:25%;color:white;"> <h2> Step 2 </h2> </div>
<div style="position:absolute; left:56%; top:25%;color:white;"> <h2> Step 3 </h2> </div>
<form method="post" name="sq" onSubmit="return check()">

<div style="position:absolute; left:33.5%; top:43%;color:white;font-size:18;"> <h3> Secret Question 2: </h3> </div>

<div style="position:absolute; left:45%; top:45%;">
<select name="que" style="height:38;font-size:18px;padding:3;">
		<option value="select one">select one</option>
		<option value="what was your favorite food as a child?">what was your favorite food as a child?</option>
		<option value="what was the last name of your first boss?">what was the last name of your first boss?</option>
		<option value="what is the name of your favorite sports team?">what is the name of your favorite sports team?</option>
		<option value="what was you first pets name?">what was you first pet's name?</option>
		<option value="what is the name of your favorite book?">what is the name of your favorite book?</option>
		<option value="who is your all-time favorite movie character?">who is your all-time favorite movie character?</option>
		<option value="what was the make of your fist car?">what was the make of your fist car?</option>
		<option value="what was the make of your first motorcycle?">what was the make of your first motorcycle?</option>
		<option value="who is you favorite author?">who is you favorite author?</option>
</select>
</div>

<div style="position:absolute; left:35.8%; top:52.7%;color:white;font-size:18;"> <h3> Your Answer:  </h3> </div>
<div style="position:absolute; left:45%; top:55%;">  <input type="text" name="ans" / style="height:35; width:350; font-size:18px;" maxlength="50">   </div>

<div style="position:absolute; left:45%; top:67%;"> <input type="submit" name="Finish" value="Finish" id="Next_button" > </div>

</form>

<?php
		include("step3_erorr/step3_erorr.php");
?>
  <div style=" position:absolute; left:16%; top:80%;">
<meter style="height:40; width:1000;" value="76" min="0" max="100"></meter>
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
			header("location:../../files/home/Home.php");
		}
	}
	else
	{
		header("location:../../../index.php");
	}
?>