<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>
<?php
if( $_SESSION['loginok'] == "ok")
echo "Welcome " . $_SESSION['name'];
else
echo "Communication Skills Lab - IIIT, Allahabad";
?>

       </title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/preload.js"></script>
	<script type="text/javascript" src="./js/niftycube.js"></script>
	<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
	<script type="text/javascript" src="./js/animatedcollapse.js"></script>
	<script type="text/javascript" src="./js/capslock.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			Nifty("div#box1,div#box2,div#box3,div#box4,div#box5,div#box6,div#box7,div#box8");
			Nifty("div#navbar,div#notices","transparent");
		}
		animatedcollapse.addDiv('box1_content', 'fade=1')
		animatedcollapse.addDiv('box2_content', 'fade=1')
		animatedcollapse.addDiv('box3_content', 'fade=1')
		animatedcollapse.addDiv('box4_content', 'fade=1')
		animatedcollapse.addDiv('box5_content', 'fade=1')
		animatedcollapse.addDiv('box6_content', 'fade=1')
                animatedcollapse.addDiv('box7_content', 'fade=1')
                animatedcollapse.addDiv('box8_content', 'fade=1')
		animatedcollapse.init()
	</script>
	
	<script type="text/javascript">
		var url = "./includes/login.php";
		var what = "LoginStatus(req.responseText)";

		function CheckLogin()
		{
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
				
			if(username == '' && password == '') {
				document.getElementById('Incorrect').innerHTML = "";
			} else {
				DoCallback_login("username="+username+"&password="+password);
			}
		}

		function LoginStatus(Status_l)
		{
			if(Status_l == 0) {
				document.getElementById('Incorrect').innerHTML = 'Username or Password seems wrong.<br>Did you <a href="forgot.php">forget your password</a>?';
			}
			else if(Status_l == 1) {
				window.location = "http://www.iiitcslcentral.co.cc/";
			}
			else {
				document.getElementById('Incorrect').innerHTML = "";
			}
		}
	</script>
	
	<script type="text/javascript" >
		var urlf = "./includes/feedback.php";
		var whatf = "FeedbackStatus(req.responseText)";

		function PostFeedback()
		{	
			var feedback = document.getElementById("feedback_text").value;
			var email = document.getElementById("email").value;
				
			if(feedback == '' || email == '') {
				document.getElementById('FeedbackMessage').innerHTML = "";
			} else {
				DoCallback_feedback("feedback="+feedback+"&email="+email);
			}
		}

		function FeedbackStatus(Status_f)
		{
			if(Status_f == 0) {
				document.getElementById('FeedbackMessage').innerHTML = "Oops! We couldn't get it.";
			}
			else if(Status_f == 1){
				document.getElementById('FeedbackMessage').innerHTML = "We got it. Thanks a lot!";
			}
			else {
				document.getElementById('FeedbackMessage').innerHTML = "";
			}	
		}
	</script>
    
    	<script type="text/javascript" >
		var urlp = "./includes/profilesearch.php";
		var whatp = "ProfileStatus(req.responseText)";

		function LookupStudent()
		{	
			var rollno = document.getElementById("rollno").value;
				
			if(rollno == '') {
				document.getElementById('SearchMessage').innerHTML = "";
			} else {
				DoCallback_profile("rollno="+rollno);
			}
		}

		function ProfileStatus(Status_p)
		{
			if(Status_p == 0) {
				document.getElementById('SearchMessage').innerHTML = "Oops. There is no one with that Roll No./Name on our records. Maybe you should try something else in the search term.";
			}
			else{
				var output = Status_p;
				var outputArray = new Array();
				
				if(output.charAt(0) == '*') {
					outputArray = output.split("*");
					var list = new String();
					var roll = new String();
					var name = new String();

					list = "More than one records have been found. Please select the one you want: <br>";
					for(var i=1; i<(outputArray.length-1); i++) {
					 	roll = outputArray[i];
						name = outputArray[i+1];
						i++;
						list += "<a href = 'profiles.php?rollno="+roll+"'> &bull; "+roll+" - "+name+"</a><br>";
					}
					document.getElementById('SearchMessage').innerHTML = list;
				}
				else {
					document.getElementById('SearchMessage').innerHTML = "";
					window.location = "profiles.php?rollno="+Status_p;
				}
			}
		}
	</script>

	<script type="text/javascript" src="./js/ajax.js"></script>
	
</head>

<body>

<?php include("./includes/header.php"); ?>

<div id="main">
	<div class="column">
		<div class="container" id="box1">
			<div class="title clickable visualIEFloatFix" id="box1_title" onmousedown="animatedcollapse.toggle('box1_content'); toggleDiv('box1_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Chit-Chat Updates</H2>
			</div>
			<div class="content" id="box1_content" >
			<?php include("./includes/recentposts.php"); ?>
			</div>     
		</div>
<?php
if( $_SESSION['loginok'] == "ok")
{
?>
                <div class="container" id="box2">
			<div class="title clickable visualIEFloatFix" id="box2_title" onmousedown="animatedcollapse.toggle('box2_content'); toggleDiv('box2_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2><?php echo $_SESSION['name']; ?>'s Profile</H2>
			</div>
			<div class="content" id="box2_content" >
                                <?php include("./includes/myprofile.php"); ?>
			</div>
  		</div>
         
<?php
}
else
{
?>
		<div class="container" id="box2">
			<div class="title clickable visualIEFloatFix" id="box2_title" onmousedown="animatedcollapse.toggle('box2_content'); toggleDiv('box2_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>About CSL</H2>
			</div>
			<div class="content" id="box2_content" >
				<b>Communication Skills Lab</b>
				<?php include("./about/about.php"); ?>
			</div>
  		</div>
<?php
}
?>
	</div>
        
	<div class="column">
		<div class="banner" id="notices">
			<H2>Notices</H2>
		</div>
		<div class="notices visualIEFloatFix">
			<div class="spacer"></div>
			<div style="clear: both; height: 6px; overflow: hidden;"></div>
			<div class="body">
				<div style="text-align: left;">
				<?php include("./includes/notices.php"); ?>
				</div>
          			</div>
		</div>
		<div class="container" id="box3">
                		<div class="title clickable visualIEFloatFix" id="box3_title" onmousedown="animatedcollapse.toggle('box3_content'); toggleDiv('box3_content',2)">
                  			<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box3_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2 class="profiles">Student Profiles</H2>
			</div>
			<div class="content" id="box3_content" >
				<p align="left">Try entering a Roll No. or a Name:</p>
				<div align="left"><input type="text" name="rollno" id="rollno" style="width:60%;" onkeypress="checkEnterforSearch(event)">
				<input type="button" style="padding: 1px 12px 1px 12px;" value="Search" onclick="LookupStudent()"></div>
                        	<div align="left"><div id="SearchMessage" class="error"></div></div>
			</div>
		</div>

<?php
if( $_SESSION['loginok'] == "ok")
{
?>

                <div class="container" id="box8">
			<div class="title clickable visualIEFloatFix" id="box8_title" onmousedown="animatedcollapse.toggle('box8_content'); toggleDiv('box8_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box8_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>CSL Reference</H2>
			</div>
			<div class="content" id="box8_content" >
					Important sites here.
			</div>
		</div>

<?php
}
?>
	</div>

        <div class="column">
<?php
if( $_SESSION['loginok'] == "ok")
{
?>

               <div class="container" id="box4">
			<div class="title clickable visualIEFloatFix" id="box4_title" onmousedown="animatedcollapse.toggle('box4_content'); toggleDiv('box4_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box4_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Logout</H2>
			</div>
			<div class="content" id="box4_content" >
				<p>You are logged in as <b><?php echo $_SESSION['username']; ?></b>.</p>
                              <form align="right" action="./includes/logout.php" method="post">
                               <input type="hidden" name="logout" value="true" />
                               <input type="submit" style="padding: 1px 12px 1px 12px;" value="Logout" />
                              </form>
			</div>
		</div>

<?php
}
else
{
?>
	
		<div class="container" id="box4">
			<div class="title clickable visualIEFloatFix" id="box4_title" onmousedown="animatedcollapse.toggle('box4_content'); toggleDiv('box4_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box4_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Login</H2>
			</div>
			<div class="content" id="box4_content" >
				<table style="width:100%; text-align: center;" >
				<tr>
					<td align="right" bgcolor="#E0E0E0" class="tablecontents" >Username:</td>
					<td align="left"><input type="text" name="username" id="username" size=15></td>
				</tr>
				<tr>
					<td align="right" bgcolor="#E0E0E0" class="tablecontents">Password:</td>
					<td align="left"><input type="password" name="password" size=15 id="password" onkeypress="checkCaps(event); checkEnterforLogin(event)" ></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><div id="Incorrect" class="error"></div></td>
				</tr>
				<tr>
					<td ></td>
					<td align="center"><input type="button" style="padding: 1px 12px 1px 12px;" value="Login" onclick="CheckLogin()"></td>
				</tr>
				</table>
			</div>
		</div>
<?php
}
?>
		<div class="container" id="box5">
			<div class="title clickable visualIEFloatFix" id="box5_title" onmousedown="animatedcollapse.toggle('box5_content'); toggleDiv('box5_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box5_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Activities</H2>
			</div>
			<div class="content" id="box5_content" >
 				<?php include("./includes/activities.php"); ?>
			</div>
		</div>
		<div class="container" id="box6">
			<div class="title clickable visualIEFloatFix" id="box6_title" onmousedown="animatedcollapse.toggle('box6_content'); toggleDiv('box6_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box6_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Feedback</H2>
			</div>
			<div class="content" id="box6_content" >
				<div id="feedback_form">
						<P><B>What&#39;s on your mind?</B></P>
						<P class="center"><TEXTAREA name="feedback_text" id="feedback_text" rows="5" cols="40" style="width:80%;"></TEXTAREA></P>
    						<P>Please include your email address if you&#39;d like us to respond to a specific question.<BR></P>
						<P class="center"><INPUT type="text" name="email" id="email" onkeypress="checkEnterforFeedback(event)" style="width:80%;"></P>
                        					<p class="center"><div id="FeedbackMessage" class="error"></div></p>
						<P align="center"><input type="button" style="padding: 1px 12px 1px 12px;" value="Submit" onclick="PostFeedback()"></P>
				</div>
			</div>
        		</div>

<?php
if( $_SESSION['loginok'] == "ok")
{
?>
                <div class="container" id="box7">
			<div class="title clickable visualIEFloatFix" id="box7_title" onmousedown="animatedcollapse.toggle('box7_content'); toggleDiv('box7_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box7_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Project Submission</H2>
			</div>
			<div class="content" id="box7_content" >
				File Upload protocol here.
			</div>
        	</div>
         
<?php
}
?>
	</div>
<div class="spacer"></div>
</div>
<?php include("./includes/footer.php"); ?>

</body></html>						