<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/niftycube.js"></script>
	<script type="text/javascript" src="./js/preload.js"></script>
	<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
	<script type="text/javascript" src="./js/animatedcollapse.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			Nifty("div#updates,div#myprofile,div#profiles,div#banner,div#reference,div#activities,div#submission,div#footer");
		}
		animatedcollapse.addDiv('updates_content', 'fade=1')
		animatedcollapse.addDiv('myprofile_content', 'fade=1')
		animatedcollapse.addDiv('profiles_content', 'fade=1')
		animatedcollapse.addDiv('reference_content', 'fade=1')
		animatedcollapse.addDiv('activities_content', 'fade=1')
		animatedcollapse.addDiv('submission_content', 'fade=1')
		animatedcollapse.init()

//about - myprofile
//feedback - submission
//login- reference
	</script>

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
      
		<div class="container" id="myprofile">
			<div class="title clickable visualIEFloatFix" id="myprofile_title" onmousedown="animatedcollapse.toggle('myprofile_content'); toggleDiv('myprofile_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="myprofile_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>My Profile</H2>
			</div>
			<div class="content" id="myprofile_content" >
				nlenfv lwnlfvnasl fnvsldnfvls ndfv
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
		<div class="container" id="reference">
			<div class="title clickable visualIEFloatFix" id="reference_title" onmousedown="animatedcollapse.toggle('reference_content'); toggleDiv('reference_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="reference_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>CSL Reference</H2>
			</div>
			<div class="content" id="reference_content" >
					wetbw efgvwergwe rgwgergwergw ergwergw errgwrthert wetherth erthert
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
		<div class="container" id="submission">
			<div class="title clickable visualIEFloatFix" id="submission_title" onmousedown="animatedcollapse.toggle('submission_content'); toggleDiv('submission_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="submission_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Project Submission</H2>
			</div>
			<div class="content" id="submission_content" >
				efwvw efvwefvw  efvwefv wefvwefv wefv wef vwef
			</div>
        		</div>
	</div>
<div class="spacer"></div>
</div>
<?php include("./includes/footer.php"); ?>

</body></html>