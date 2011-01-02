<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/scripts.js"></script>
	<script type="text/javascript">
		function toggleArrow(id) {
			if ( $("#box" + id + "_content").css("height") == '1px' ) {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_down_2.gif'>");
			}
			else {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_right_2.gif'>");
			}
		}

		$(document).ready(function(){
			Nifty("div#box1,div#box2,div#box3,div#box4,div#box5,div#footer,div#navbar");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
			$("#box2_title").click(function () { $("#box2_content").slideToggle("normal"); toggleArrow(2);});
			$("#box3_title").click(function () { $("#box3_content").slideToggle("normal"); toggleArrow(3);});
			$("#box4_title").click(function () { $("#box4_content").slideToggle("normal"); toggleArrow(4);});
			$("#box5_title").click(function () { $("#box5_content").slideToggle("normal"); toggleArrow(5);});
		});
	</script>
	

	

</head>



<body>



<?php include("./includes/header.php"); ?>



<div id="main">

	<div class="column">

		<div class="container" id="box1">

			<div class="title clickable visualIEFloatFix" id="box1_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="../images/arrow_down_2.gif"></A></P>

				<H2>Group Discussions</H2>

			</div>

			<div class="content" id="box1_content" >

			<p>Group discusison is an activity in which a group of 10,15 or 20 people (depending upon the situation) are given a topic to provide views. Point are then given to the participants depending on views and how they get themself highlighted. There are also point for the whole group for collaboration and flow of information.</p>
		<p>This practice is very helpful for the Group Discussion during the job placements and hence result in better impression not only of the particular person but the whole group instead.</p>

			</div>     

		</div>

      

		<div class="container" id="box2">

			<div class="title clickable visualIEFloatFix" id="box2_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="../images/arrow_down_2.gif"></A></P>

				<H2>Jam Sessions</H2>

			</div>

			<div class="content" id="box2_content" >

		


			</div>

  		</div>

	</div>

        

	<div class="column">

		<div class="container" id="box3">

                		<div class="title clickable visualIEFloatFix" id="box3_title" >

                  			<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box3_content_toggle"><IMG src="../images/arrow_down_2.gif"></A></P>

				<H2>Debates</H2>

			</div>

			<div class="content" id="box3_content" >

			4twetwretertwerg



			</div>

		</div>

	</div>



	<div class="column">

		<div class="container" id="box4">

			<div class="title clickable visualIEFloatFix" id="box4_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box4_content_toggle"><IMG src="../images/arrow_down_2.gif"></A></P>

				<H2>Presentations</H2>

			</div>

			<div class="content" id="box4_content" >

			wewertrytewqgtyoit



			</div>

		</div>

		<div class="container" id="box5">

			<div class="title clickable visualIEFloatFix" id="box5_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box5_content_toggle"><IMG src="../images/arrow_down_2.gif"></A></P>

				<H2>Writing Skills</H2>

			</div>

			<div class="content" id="box5_content" >

 			wervwerwergwergwer



			</div>

		</div>

	</div>

<div class="spacer"></div>

</div>

<?php include("./includes/footer.php"); ?>



</body></html>