<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<style>
span.hidden {
	display:none;
}
span.hidden1 {
	display:none;
	font-size:12px;
}/*
span.error {
	display:block;
}*/
.smallErrorText {
font-size: 9px;
}

#Incorrect {
color: red;
font-size: 9px;
}
</style>

	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script src="./js/preload.js" type="text/javascript"></script>

<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
<script type="text/javascript" src="./js/animatedcollapse.js">

/***********************************************
* Animated Collapsible DIV v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
	<script type="text/javascript">
		animatedcollapse.addDiv('updates_content', 'fade=1')
		animatedcollapse.addDiv('about_content', 'fade=1')
		animatedcollapse.addDiv('profiles_content', 'fade=1')
		animatedcollapse.addDiv('login_content', 'fade=1')
		animatedcollapse.addDiv('activities_content', 'fade=1')
		animatedcollapse.addDiv('feedback_content', 'fade=1')

		animatedcollapse.init()
	</script>

    
    <script>

            var url = "./includes/login.php";
            var what = "LoginStatus(req.responseText)";

            function CheckLogin()
            {
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;
				
				if(username == '' && password == '') {
					document.getElementById('Incorrect').style.display = 'none';
					document.getElementById('Forgot').style.display = 'none';
				} else {
					DoCallback("username="+username+"&password="+password);
				}
            }

            function LoginStatus(Status)
            {
                if(Status == 0) {
                    document.getElementById('Incorrect').style.display = 'block';
					document.getElementById('Forgot').style.display = 'block';
				}
                else {
					document.getElementById('Forgot').style.display = 'none';
                    document.getElementById('Incorrect').style.display = 'none';
				}
            }

        </script>
        <script src="./js/ajax.js" type="text/javascript"></script>
	
</head>

<body>

<?php include("./includes/header.php"); ?>

<DIV id="main">
	<DIV class="column">
		<DIV class="container" id="updates">
			<DIV class="title clickable visualIEFloatFix" id="updates_title" onmousedown="animatedcollapse.toggle('updates_content')">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="updates_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Chit-Chat Updates</H2>
			</DIV>
			<DIV class="content" id="updates_content" >
			<?php
				include ("./includes/recentposts.php");
			?>
			</DIV>     
		</DIV>
      
		<DIV class="container" id="about">
			<DIV class="title clickable visualIEFloatFix" id="about_title" onmousedown="animatedcollapse.toggle('about_content')">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="about_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>About CSL</H2>
			</DIV>
			<DIV class="content" id="about_content" >
				<b>Communication Skills Lab</b>
				Please someone take out some time and write a text file about CSL. With a few pictures of our NSC campus. Send it to us... Thanks.
			</DIV>
  		</DIV>
	</DIV>
        
	<DIV class="column">
		<DIV class="banner">
			<H2>Notices</H2>
		</DIV>
		<DIV class="notices visualIEFloatFix">
			<DIV class="notices_date_top">Date - Time</DIV>
			<DIV class="spacer"></DIV>
			<DIV style="clear: both; height: 6px; overflow: hidden;"></DIV>
			<DIV class="body">
				<DIV style="text-align: left;">
					<p style="display: block;">
            						This needs to iinclude a php file that will make lists out of statements given from the administrative panel...
					</p>
				</DIV>
          			</DIV>
		</DIV>
		<DIV class="container" id="profiles">
                		<DIV class="title clickable visualIEFloatFix" id="profiles_title" onmousedown="animatedcollapse.toggle('profiles_content')">
                  			<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="profiles_content_toggle"><IMG src="./images/arrow_down_4.gif"></A></P>
				<H2 class="profiles">Student Profiles</H2>
			</DIV>
			<DIV class="content" id="profiles_content" >
				This ones difficult and complicated. Please think about this...
			</DIV>
		</DIV>
	</DIV>

	<DIV class="column">
		<DIV class="container" id="login">
			<DIV class="title clickable visualIEFloatFix" id="login_title" onmousedown="animatedcollapse.toggle('login_content')">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="login_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Login</H2>
			</DIV>
			<DIV class="content" id="login_content" >
					<!--<form name="form1" method="post" action="">-->
	<table style="width:100%;" align="center">
	<tr>
		<td align="right" bgcolor="#E0E0E0" class="tablecontents" >Username:</td>
		<td align="left"><input type="text" name="username" id="username" size=15></td>
	</tr>
	<tr>
		<td align="right" bgcolor="#E0E0E0" class="tablecontents">Password:</td>
		<td align="left"><input type="password" name="password" size=15 id="password"></td>
	</tr>
	<tr align="center">
    	
		<td></td>
		<td><p align="center"><div id="Incorrect" style="display:none" >
        	<p>Incorrect Details</p>
        </div></p></td>
        
	</tr>
	<tr>
		<td align="center" class="smallErrorText"><a href="forgot.php"><span id="Forgot" class="hidden1">Forgot Password?</span></a></td>
		<td align="center"><input type="button" style="padding: 1px 12px 1px 12px;" value="Login" onclick="CheckLogin()"></td>
	</tr>
	</table>
					<!--</form>-->
			</DIV>
		</DIV>
		<DIV class="container" id="activities">
			<DIV class="title clickable visualIEFloatFix" id="activities_title" onmousedown="animatedcollapse.toggle('activities_content')">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="activities_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Activities</H2>
			</DIV>
			<DIV class="content" id="activities_content" >
 				Works like Notices. Mostly a student will be made incharge of updating this part... Its like news...
			</DIV>
		</DIV>
		<DIV class="container" id="feedback">
			<DIV class="title clickable visualIEFloatFix" id="feedback_title" onmousedown="animatedcollapse.toggle('feedback_content')">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="feedback_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Feedback</H2>
			</DIV>
			<DIV class="content" id="feedback_content" >
				<DIV id="feedback_form">
					<FORM>
						<P><B>What&#39;s on your mind?</B></P>
						<P class="center"><TEXTAREA name="feedbeck" id="feedback" rows="5" cols="20" style="width:158px;"></TEXTAREA></P>
    						<P>Please include your email address if you&#39;d like us to respond to a specific question.<BR></P>
						<P class="center"><INPUT type="text" name="email" id="email" style="width:158px;"></P>
						<P style="align:right"><INPUT type="submit"></P>
					</FORM>
				</DIV>
			</DIV>
        		</DIV>
	</DIV>

<DIV class="spacer"></DIV>
<?php include("./includes/footer.php"); ?>

</body></html>