<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/niftycube.js"></script>
	<script type="text/javascript" src="./js/preload.js"></script>
	<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
	<script type="text/javascript" src="./js/animatedcollapse.js"></script>
	<script type="text/javascript" src="./js/ajax.js"></script>
	<script type="text/javascript" src="./js/login.js"></script>
	<script type="text/javascript" src="./js/capslock.js"></script>
    <script type="text/javascript" src="./js/feedback.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			Nifty("div#updates,div#about,div#profiles,div#banner,div#login,div#activities,div#feedback,div#footer");
		}
		animatedcollapse.addDiv('updates_content', 'fade=1')
		animatedcollapse.addDiv('about_content', 'fade=1')
		animatedcollapse.addDiv('profiles_content', 'fade=1')
		animatedcollapse.addDiv('login_content', 'fade=1')
		animatedcollapse.addDiv('activities_content', 'fade=1')
		animatedcollapse.addDiv('feedback_content', 'fade=1')
		animatedcollapse.init()
		animatedcollapse.init()
		
	</script>
    <script type="text/javascript" src="./js/ajaxf.js"></script>
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
            						This needs to iinclude a php file that will make lists out of statements given from the administrative panel...
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
				<p>This ones difficult and complicated. Please think about this...</p>
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
			<!--<form name="form1" method="post" action="">-->
				<table style="width:100%;" align="center">
				<tr>
					<td align="right" bgcolor="#E0E0E0" class="tablecontents" >Username:</td>
					<td align="left"><input type="text" name="username" id="username" size=15></td>
				</tr>
				<tr>
					<td align="right" bgcolor="#E0E0E0" class="tablecontents">Password:</td>
					<td align="left"><input type="password" name="password" size=15 id="password" onkeypress="capLock(event)" ></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><div id="Incorrect"></div></td>
				</tr>
				<tr>
					<td ></td>
					<td align="center"><input type="button" style="padding: 1px 12px 1px 12px;" value="Login" onclick="CheckLogin()">			</td>
				</tr>
				</table>
			<!--</form>-->
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
						<P class="center"><TEXTAREA name="feedback" id="feedback" rows="5" cols="20" style="width:158px;"></TEXTAREA></P>
    						<P>Please include your email address if you&#39;d like us to respond to a specific question.<BR></P>
						<P class="center"><INPUT type="text" name="email" id="email" style="width:158px;"></P>
                        <p class="center"><div id="FeedbackMessage"></div></p>
						<P style="align:right"><INPUT type="button" value="Submit" onclick="PostFeedback()"></P>
				</div>
			</div>
        		</div>
	</div>
<div class="spacer"></div>
</div>
<?php include("./includes/footer.php"); ?>

</body></html>