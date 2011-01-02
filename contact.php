<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/scripts.js"></script>
	<script type="text/javascript">
		function toggleArrow(id) {
			if ( $("#box" + id + "_content").css("height") == '1px' ) {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_down_2.png'>");
			}
			else {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_right_2.png'>");
			}
		}

		$(document).ready(function(){
			Nifty("div.container,div.menu", "transparent");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
			$("#box2_title").click(function () { $("#box2_content").slideToggle("normal"); toggleArrow(2);});
			$("#box3_title").click(function () { $("#box3_content").slideToggle("normal"); toggleArrow(3);});
			$("#box4_title").click(function () { $("#box4_content").slideToggle("normal"); toggleArrow(4);});
			$("#box5_title").click(function () { $("#box5_content").slideToggle("normal"); toggleArrow(5);});
		});
	</script>

</head>

<body>

<?php include('./includes/header.php'); ?>

	<div class="column">

		<div class="container" id="box1">

			<div class="title clickable visualIEFloatFix" id="box1_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>

				<H2>Pranjal Kumar Singh</H2>

			</div>

			<div class="content" id="box1_content" >

			<p><b>Roll no.</b> : IIT2008008</p>

			<p><b>Course</b> : B. Tech</p>

			<p><b>Branch</b> : Information Technology</p>

			<p><b>Year</b> : First</p>

			<p><b>Phone</b> : 09936811647</p>

			<p><b>Email</b> : pranjaltech@gmail.com</p>

			</div>     

		</div>

      

		<div class="container" id="box2">

			<div class="title clickable visualIEFloatFix" id="box2_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>

				<H2>Param Aggarwal</H2>

			</div>

			<div class="content" id="box2_content" >

			<p><b>Roll no.</b> : IEC2008009</p>

			<p><b>Website</b> : <a href="http://www.feemoelectronics.com">FeemoElectronics.com</a></p>

			<p><b>Course</b> : B. Tech</p>

			<p><b>Branch</b> : Electronics and Communication</p>

			<p><b>Year</b> : First</p>

			<p><b>Phone</b> : 09621398588</p>

			<p><b>Email</b> : paramaggarwal@gmail.com</p>



			</div>

  		</div>

	</div>

        

	<div class="column">

		<div class="container" id="box3">

                		<div class="title clickable visualIEFloatFix" id="box3_title" >

                  			<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box3_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>

				<H2>Anvay Srivastav</H2>

			</div>

			<div class="content" id="box3_content" >

			<p><b>Roll no.</b> : IIT2008005</p>

			<p><b>Course</b> : B. Tech</p>

			<p><b>Branch</b> : Information Technology</p>

			<p><b>Year</b> : First</p>

			<p><b>Phone</b> : 9454949803</p>

			<p><b>Email</b> : anvay.bigbrother@gmail.com</p>



			</div>

		</div>

	</div>



	<div class="column">

		<div class="container" id="box4">

			<div class="title clickable visualIEFloatFix" id="box4_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box4_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>

				<H2>Chetan Agrawal</H2>

			</div>

			<div class="content" id="box4_content" >

			<p><b>Roll no.</b> : IIT2008032</p>

			<p><b>Course</b> : B. Tech</p>

			<p><b>Branch</b> : Information Technology</p>

			<p><b>Year</b> : First</p>

			<p><b>Phone</b> : 9335037631</p>

			<p><b>Email</b> : chetan1507@gmail.com</p>



			</div>

		</div>

		<div class="container" id="box5">

			<div class="title clickable visualIEFloatFix" id="box5_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box5_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>

				<H2>Divij Vaidya</H2>

			</div>

			<div class="content" id="box5_content" >

 			<p><b>Roll no.</b> : IIT2008077</p>

			<p><b>Course</b> : B. Tech</p>

			<p><b>Branch</b> : Information Technology</p>

			<p><b>Year</b> : First</p>

			<p><b>Phone</b> : 9889724411</p>

			<p><b>Email</b> : divijvaidya13@gmail.com</p>



			</div>

		</div>

	</div>

<div class="spacer"></div>

</div>
<?php include('./includes/footer.php'); ?>

</body></html>