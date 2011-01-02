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
	<script type="text/javascript" src="./js/scripts.js"></script>
	<script type="text/javascript">

                function notifyLogin(loginStatus)
		{
			if(loginStatus == 0) {
				$("#Incorrect").html("Username or Password seems wrong.<br>Did you <a href='forgot.php'>forget your password</a>?").show("slow");
			}
			else if(loginStatus == 1) {
				window.location = "http://www.iiitcslcentral.co.cc/";
			}
			else {
				$("#Incorrect").hide("slow");
			}
		}
                 
                function notifyFeedback(feedbackStatus)
		{
			if(feedbackStatus == 0) {
				$("#FeedbackMessage").html("Oops! We couldn't get it.").show("slow");
			}
			else if(feedbackStatus == 1){
				$("#FeedbackMessage").html("We got it. Thanks a lot!").show("slow");
			}
			else {
				$("#FeedbackMessage").hide("slow");
			}	
		}

                function notifyProfiles(Status_p)
		{
			if(Status_p == 0) {
				$("#SearchMessage").html("Oops. There is no one with that Roll No./Name on our records. Maybe you should try something else in the search term.").show("slow");
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
					$("#SearchMessage").html(list).show("slow");
				}
				else {
					$("#SearchMessage").hide("slow");
					window.location = "profiles.php?rollno="+Status_p;
				}
			}
		}

		function toggleArrow(id) {
			if ( $("#box" + id + "_content").css("height") == '1px' ) {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_down_2.gif'>");
			}
			else {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_right_2.gif'>");
			}
		}

		$(document).ready(function(){
			Nifty("div#box1,div#box2,div#box3,div#box4,div#box5,div#box6,div#box7,div#box8,div#box9,div#footer,div#navbar,div#noticesbody,div#notices");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
			$("#box2_title").click(function () { $("#box2_content").slideToggle("normal"); toggleArrow(2);});
			$("#box3_title").click(function () { $("#box3_content").slideToggle("normal"); toggleArrow(3);});
			$("#box4_title").click(function () { $("#box4_content").slideToggle("normal"); toggleArrow(4);});
			$("#box5_title").click(function () { $("#box5_content").slideToggle("normal"); toggleArrow(5);});
			$("#box6_title").click(function () { $("#box6_content").slideToggle("normal"); toggleArrow(6);});
			$("#box7_title").click(function () { $("#box7_content").slideToggle("normal"); toggleArrow(7);});
			$("#box8_title").click(function () { $("#box8_content").slideToggle("normal"); toggleArrow(8);});
			$("#box9_title").click(function () { $("#box9_content").slideToggle("normal"); toggleArrow(9);});

			$("input[value='Login']").click(function () {
				var username = $("input[name='username']").val(); 
				var password = $("input[name='password']").val();
				$.post("./includes/login.php", { username: username, password: password },
				function(data){
				   notifyLogin(data);
				}
				);
			});

			$("input[name='password']").keypress(function (e) {
			    if(e.which == 13) {
				  var username = $("input[name='username']").val(); 
				  var password = $("input[name='password']").val();
				  $.post("./includes/login.php", { username: username, password: password },
				       function(data){
					   notifyLogin(data);
				       }
				   );
			     }
			});

			 $("input[name='password']").keypress(function (e) {
				    kc = e.keyCode?e.keyCode:e.which;
				    sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
				    if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
					 $("#Incorrect").html("Caps Lock is ON").show("slow");
				    else
					 $("#Incorrect").hide("slow");
			 });

			$("input[value='Submit']").click(function () {
			     var feedback = $("#feedback_text").val(); 
			     var email = $("input[name='email']").val();
			    $.post("./includes/feedback.php", { username: feedback, password: email },
				function(data){
				   notifyFeedback(data);
				}
			     );
			});

			$("input[name='email']").keypress(function (e) {
			     if(e.which == 13) {
				     var feedback = $("#feedback_text").val(); 
				     var email = $("input[name='email']").val();
				     $.post("./includes/feedback.php", { username: feedback, password: email },
					   function(data){
					      notifyFeedback(data);
					    }
				      );
			      }
			 });

			$("input[value='Search']").click(function () {
			     var rollno = $("input[name='rollno']").val();
			    $.post("./includes/profilesearch.php", { rollno: rollno },
				function(data){
				   notifyProfiles(data);
				}
			     );
			});

			$("input[name='rollno']").keypress(function (e) {
				if(e.which == 13) {
					var rollno = $("input[name='rollno']").val();
					$.post("./includes/profilesearch.php", { rollno: rollno },
						function(data){
							notifyProfiles(data);
						}
					);
				} else {
					$("#SearchMessage").hide("slow");
				}
			});
		});
	</script>
	
</head>

<body>

<div id="header-content"> 
	<h1>Communication Skills Lab - IIIT, Allahabad</h1> 
</div>

<div id="header-image" style="width: 7%; height: 85%;" >
	<img src="http://www.iiitcslcentral.co.cc/images/header.png" style="height:100%; width:100%;" >
</div>


<div id="main">

<div id="navbar">
	<TABLE class="navbar">
	<TBODY>
	<TR>
	
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/'; ">Home</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/chit-chat/'; ">Chit-Chat</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/results.php'; ">Results</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/contact.php'; ">Contact</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/about.php'; ">About</TD>
	
	</TR>
	</TBODY>
	</TABLE>
</div>

	<div class="column">
		<div class="container" id="box1">
			<div class="title clickable visualIEFloatFix" id="box1_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box1_content_toggle"><img src='./images/arrow_down_2.gif'></A></P>
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
			<div class="title clickable visualIEFloatFix" id="box2_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2><?php echo $_SESSION['name']; ?>'s Profile</H2>
			</div>
			<div class="content" id="box2_content" >
				<?php include("./includes/myprofile.php"); ?>
				<a href="editprofile.php">Edit</a>
			</div>
		</div>
<?php
	}
	else
	{
?>
		<div class="container" id="box2">
			<div class="title clickable visualIEFloatFix" id="box2_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>About CSL</H2>
			</div>
			<div class="content" id="box2_content" >
				<b>Communication Skills Lab</b>
<p>CSL(Communication Skill Lab) is a practical course in <a href="http://www.iiita.ac.in" alt="Indian Institute of Information Technology">IIIT-A</a>. IIITA being one of the premier institute for Information Technology and Electronics and Communication, implementation of human resourse management and personality development is a must.</p>
<p>Communication Skill Lab is conducted by the having various activies such as Group Discussion, JAM Session, Essay writting, teaching resume format,presentation, Debate.</p>
			<div align=right><a href="./about.php">Know more...</a></div>
			</div>
		</div>
<?php
	}
?>
	</div>
	<div class="column">
		<div class="container" id="box9" style="background-color: #ffffff;">
			<div class="title clickable visualIEFloatFix " id="box9_title">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box9_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2><a>Notices</a></H2>
			</div>
			<div class="content" id="box9_content" >
				<div style="text-align: left;">
<?php
	if( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '2' )
	{
?>
					<form align="right" action="./includes/addnotice.php" method="post">
						<input type="text" name="noticeadd"  align="left" length="20"/>
						<input type="submit" style="padding: 1px 12px 1px 12px;" value="Add" />
					</form><br />
<?php
	}
?>
				<?php include("./includes/notices.php"); ?>
				</div>
			</div>
		</div>

		<div class="container" id="box3">
			<div class="title clickable visualIEFloatFix" id="box3_title">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box3_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Student Profiles</H2>
			</div>
			<div class="content" id="box3_content" >
				<p align="left">Try entering a Roll No. or a Name:</p>
				<div align="left"><input type="text" name="rollno" style="width:60%;">
				<input type="button" style="padding: 1px 12px 1px 12px;" value="Search"></div>
				<div align="left"><div id="SearchMessage" style="display:none;" class="error"></div></div>
			</div>
		</div>

<?php
	if( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '1')
	{
?>
		<div class="container" id="box8">
			<div class="title clickable visualIEFloatFix" id="box8_title" >
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
	elseif ( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '2' )
	{
?>

		<div class="container" id="box8">
			<div class="title clickable visualIEFloatFix" id="box8_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box8_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Student Evaluation</H2>
		</div>
			<div class="content" id="box8_content" >

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
			<div class="title clickable visualIEFloatFix" id="box4_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box4_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Logout</H2>
			</div>
			<div class="content" id="box4_content" >
				<p>You are logged in as <b><?php echo $_SESSION['username']; ?></b>.</p>
<?php
if($_SESSION['loginok'] == "ok" && $_SESSION['level'] == '4')
{
echo "<a href='http://www.iiitcslcentral.co.cc/includes/mail.php' >Send mail to all</a>";
}
?>
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
			<div class="title clickable visualIEFloatFix" id="box4_title" >
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
					<td align="left"><input type="password" name="password" size=15 id="password" ></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><div id="Incorrect" style="display:none;" class="error"></div></td>
				</tr>
				<tr>
					<td ></td>
					<td align="center"><input type="button" style="padding: 1px 12px 1px 12px;" value="Login"></td>
				</tr>
				</table>
			</div>
		</div>
<?php
	}
?>

<?php
	if( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '2' )
	{
?>
		<div class="container" id="box5">
			<div class="title clickable visualIEFloatFix" id="box5_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box5_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Activities</H2>
			</div>
			<div class="content" id="box5_content" >
			<form align="right" action="./includes/addactivity.php" method="post">
				<input type="text" name="activityadd"  align="left" length="20"/>
				<input type="submit" style="padding: 1px 12px 1px 12px;" value="Add" />
			</form><br />
			<?php include("./includes/activities.php"); ?>
			</div>
		</div>
<?php
	}
	else
	{
?>
		<div class="container" id="box5">
			<div class="title clickable visualIEFloatFix" id="box5_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box5_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Activities</H2>
			</div>
			<div class="content" id="box5_content" >
 				<?php include("./includes/activities.php"); ?>
			</div>
		</div>

<?php
	}
?>
<?php
	if( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '2')
	{
?>
		<div class="container" id="box6">
			<div class="title clickable visualIEFloatFix" id="box6_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box6_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Results</H2>
			</div>
			<div class="content" id="box6_content" >
				Results page here.
			</div>
			</div>

<?php
	}
	else
	{
?>
			<div class="container" id="box6">
			<div class="title clickable visualIEFloatFix" id="box6_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box6_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Feedback</H2>
			</div>
			<div class="content" id="box6_content" >
				<div id="feedback_form">
						<P><B>What&#39;s on your mind?</B></P>
						<P class="center"><TEXTAREA name="feedback_text" id="feedback_text" rows="5" cols="40" style="width:80%;"></TEXTAREA></P>
						<P>Please include your email address if you&#39;d like us to respond to a specific question.<BR></P>
						<P class="center"><INPUT type="text" name="email" style="width:80%;"></P>
                        					<p class="center"><div id="FeedbackMessage" class="error"></div></p>
						<P align="center"><input type="button" style="padding: 1px 12px 1px 12px;" value="Submit"></P>
				</div>
			</div>
        		</div>

<?php
	}
?>


<?php
if( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '1')
{
?>
		<div class="container" id="box7">
			<div class="title clickable visualIEFloatFix" id="box7_title" >
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
	elseif ( $_SESSION['loginok'] == "ok" && $_SESSION['level'] == '2')
	{
?>
		<div class="container" id="box7">
			<div class="title clickable visualIEFloatFix" id="box7_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box7_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Usage Statistics</H2>
			</div>
			<div class="content" id="box7_content" >
				Site Statistics here.
			</div>
		</div>

<?php
}
?>
	</div>
<div class="spacer"></div>
<?php include("./includes/footer.php"); ?>
</div>

</body></html>							