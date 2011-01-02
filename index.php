<html>
<head>

    <title>Communication Skills Lab - IIIT, Allahabad</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <script src="./js/fvalidateall.js" type="text/javascript"></script>
    <script src="./js/framework.js" type="text/javascript"></script>
    <script src="./js/jtree.js" type="text/javascript"></script>
    <script src="./js/preload.js" type="text/javascript"></script>

</head>

<body>

<?php include("./includes/header.php"); ?>

<DIV id="main">
	<DIV class="column">
		<DIV class="container" id="updates">
			<DIV class="title clickable visualIEFloatFix" id="updates_title" onmousedown="toggleDiv(&#39;updates_content&#39;,&#39;2&#39;);">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="updates_content_toggle"><IMG src="./images/arrow_down_2.gif"></A>
				<H2>Chit-Chat Updates</H2></P>
			</DIV>
			<DIV class="content" id="updates_content" style="display: block;">
			nwero nvwo enrrfvo wnerv owne rvwevvwevw
			</DIV>     
		</DIV>
      
		<DIV class="container" id="about">
			<DIV class="title clickable visualIEFloatFix" id="about_title" onmousedown="toggleDiv(&#39;about_content&#39;,&#39;2&#39;);">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="about_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>About CSL</H2>
			</DIV>
			<DIV class="content" id="about_content" style="display: block;">
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
                		<DIV class="title clickable visualIEFloatFix" id="profiles_title" onmousedown="toggleDiv(&#39;profiles_content&#39;,&#39;4&#39;);">
                  			<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="profiles_content_toggle"><IMG src="./images/arrow_down_4.gif"></A></P>
				<H2 class="profiles">Student Profiles</H2>
			</DIV>
			<DIV class="content" id="profiles_content" style="display: block;">
				This ones difficult and complicated. Please think about this...
			</DIV>
		</DIV>
	</DIV>

	<DIV class="column">
		<DIV class="container" id="login">
			<DIV class="title clickable visualIEFloatFix" id="login_title" onmousedown="toggleDiv(&#39;login_content&#39;,&#39;2&#39;);">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="login_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Login</H2>
			</DIV>
			<DIV class="content" id="login_content" style="display: block;">
					Include a php script for login here... Remember me is required.
			</DIV>
		</DIV>
		<DIV class="container" id="activities">
			<DIV class="title clickable visualIEFloatFix" id="activities_title" onmousedown="toggleDiv(&#39;activities_content&#39;,&#39;2&#39;);">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="activities_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Activities</H2>
			</DIV>
			<DIV class="content" id="activities_content" style="display: block;">
 				Works like Notices. Mostly a student will be made incharge of updating this part... Its like news...
			</DIV>
		</DIV>
		<DIV class="container" id="feedback">
			<DIV class="title clickable visualIEFloatFix" id="feedback_title" onmousedown="toggleDiv(&#39;feedback_content&#39;,&#39;2&#39;);">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="feedback_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Feedback</H2>
			</DIV>
			<DIV class="content" id="feedback_content" style="display: block;">
				<DIV id="feedback_form">
					<FORM>
						<P><B>What&#39;s on your mind?</B></P>
						<P class="center"><TEXTAREA name="whatsonyourmind" id="whatsonyourmind" rows="5" cols="20" style="width:158px;"></TEXTAREA></P>
    						<P>Please include your email address if you&#39;d like us to respond to a specific question.<BR></P>
						<P class="center"><INPUT type="text" name="whatsonyourmind_email" id="whatsonyourmind_email" style="width:158px;"></P>
						<P style="align:right"><INPUT type="submit"></P>
					</FORM>
				</DIV>
			</DIV>
        		</DIV>
	</DIV>
<DIV>
<DIV class="spacer"></DIV>
<?php include("./includes/footer.php"); ?>

</body></html>