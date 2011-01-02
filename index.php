<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/preload.js"></script>
	<script type="text/javascript" src="./js/niftycube.js"></script>
	<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
	<script type="text/javascript" src="./js/animatedcollapse.js"></script>
	<script type="text/javascript" src="./js/capslock.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			Nifty("div#updates,div#about,div#profiles,div#banner,div#login,div#activities,div#feedback,div#footer");
			Nifty("div#navbar","transparent");
		}
		animatedcollapse.addDiv('updates_content', 'fade=1')
		animatedcollapse.addDiv('about_content', 'fade=1')
		animatedcollapse.addDiv('profiles_content', 'fade=1')
		animatedcollapse.addDiv('login_content', 'fade=1')
		animatedcollapse.addDiv('activities_content', 'fade=1')
		animatedcollapse.addDiv('feedback_content', 'fade=1')
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
				window.location = "student.php";
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
			//var roll = document.getElementById("rollno").value;
			if(Status_p == 0) {
				document.getElementById('SearchMessage').innerHTML = "Oops. There is no one with that Roll No. on our records.";
			}
			else{
				document.getElementById('SearchMessage').innerHTML = "";
				window.location = "profiles.php?rollno="+Status_p;
			}
		}
	</script>

	<script type="text/javascript" src="./js/ajax.js"></script>
	
</head>

<body>

<?php include("./includes/header.php"); ?>

<div id="main">
	<div class="column">
		<div class="container" id="updates">
			<div class="title clickable visualIEFloatFix" id="updates_title" onmousedown="animatedcollapse.toggle('updates_content'); toggleDiv('updates_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="updates_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Chit-Chat Updates</H2>
			</div>
			<div class="content" id="updates_content" >
			<p><?php include("./includes/recentposts.php"); ?></p>
			</div>     
		</div>
      
		<div class="container" id="about">
			<div class="title clickable visualIEFloatFix" id="about_title" onmousedown="animatedcollapse.toggle('about_content'); toggleDiv('about_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="about_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>About CSL</H2>
			</div>
			<div class="content" id="about_content" >
				<b>Communication Skills Lab</b>
				<?php include("./about/about.php"); ?>
			</div>
  		</div>
	</div>
        
	<div class="column">
		<div class="banner" id="banner">
			<H2>Notices</H2>
		</div>
		<div class="notices visualIEFloatFix">
			<div class="spacer"></div>
			<div style="clear: both; height: 6px; overflow: hidden;"></div>
			<div class="body">
				<div style="text-align: left;">
					<p style="display: block;">
            						This needs to include a php file that will make lists, out of statements given from the administrative panel...
					</p>
				</div>
          			</div>
		</div>
		<div class="container" id="profiles">
                		<div class="title clickable visualIEFloatFix" id="profiles_title" onmousedown="animatedcollapse.toggle('profiles_content'); toggleDiv('profiles_content',2)">
                  			<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="profiles_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2 class="profiles">Student Profiles</H2>
			</div>
			<div class="content" id="profiles_content" >
				<p align="left">Try entering a Roll No. or a Name:</p>
				<div align="left"><input type="text" name="rollno" id="rollno" style="width:60%;" onkeypress="checkEnterforSearch(event)">
				<input type="button" style="padding: 1px 12px 1px 12px;" value="Search" onclick="LookupStudent()"></div>
                        			<div align="left"><div id="SearchMessage" class="error"></div></div>
			</div>
		</div>
	</div>

	<div class="column">
		<div class="container" id="login">
			<div class="title clickable visualIEFloatFix" id="login_title" onmousedown="animatedcollapse.toggle('login_content'); toggleDiv('login_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="login_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Login</H2>
			</div>
			<div class="content" id="login_content" >
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
		<div class="container" id="activities">
			<div class="title clickable visualIEFloatFix" id="activities_title" onmousedown="animatedcollapse.toggle('activities_content'); toggleDiv('activities_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="activities_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Activities</H2>
			</div>
			<div class="content" id="activities_content" >
 				Works like Notices. Mostly a student will be made incharge of updating this part... Its like news...
			</div>
		</div>
		<div class="container" id="feedback">
			<div class="title clickable visualIEFloatFix" id="feedback_title" onmousedown="animatedcollapse.toggle('feedback_content'); toggleDiv('feedback_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="feedback_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Feedback</H2>
			</div>
			<div class="content" id="feedback_content" >
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
	</div>
<div class="spacer"></div>
</div>
<?php include("./includes/footer.php"); ?>

</body></html>