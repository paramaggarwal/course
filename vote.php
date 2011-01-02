<?php
session_start();
include("./includes/config.php");

$voter = $_SESSION['username'];
$id = $_GET['id'];;
$teamname = "";
$members = "";
$voted = false;
$msg = "";

$res = mysql_query("SELECT * FROM voting_teams WHERE MATCH(voters) AGAINST('$voter' IN BOOLEAN MODE) AND ID='$id' ",$con);
if(mysql_num_rows($res) > 0) {
	$voted = true;
}

if($id == "") header("Location: http://iiitcslcentral.co.cc/");

if(isset($_SESSION['username'])) {
	$voter = $_SESSION['username'];
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysql_query("SELECT * from voting_teams WHERE ID='$id'",$con);
		if(mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_BOTH);
			$teamname = $row['name'];
			$members = $row['members'];
		}
	}
} else {
	echo "Access Denied!";
	exit();
}

if (isset($_POST['submit']) ) {
	if(!$voted) {
		$score = $_POST['score'];
		$result = mysql_query("SELECT * FROM voting_teams WHERE ID = '$id'",$con);
		if(mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_BOTH);
			$totalscore = $row['score'];
			$no_of_votes = $row['no_of_votes'];
			$voters = $row['voters'];
			
			$totalscore += $score;
			$no_of_votes++;
			if($voters != "") {
				$voters .= ", ".$voter;
			} else {
				$voters = $voter;
			}
			$result = mysql_query("UPDATE voting_teams SET voters='$voters',score='$score',no_of_votes='$no_of_votes' WHERE ID='$id'",$con);
			header("Location: http://iiitcslcentral.co.cc/");
		}
	} else {
		$msg = "<div class='error'>You have voted for this team already! Please select some other team now!</div><br />";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Voting :: Communication Skills Lab - IIIT, Allahabad</title>
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
			Nifty("div.container,div.menu","transparent");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});

		});
	</script>
	
</head>

<body>

<?php include('./includes/header.php'); ?>

	<div style="width: 32%; margin: auto;">
		<div class="container" id="box1" >
			<div class="title clickable visualIEFloatFix" id="box1_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box1_content_toggle"><img src='./images/arrow_down_2.png'></A></P>
				<H2>Vote for <?php echo $teamname; ?></H2>
			</div>
			<div class="content" id="box1_content" >
				<?php echo $msg; ?>
				<form action="" method="post">
					<b>Members:</b><p><?php echo $members; ?></p><br />
					<input type="radio" name="score" value="5">Excellent<br />
					<input type="radio" name="score" value="4">Very Good<br />
					<input type="radio" name="score" value="3">Good<br />
					<input type="radio" name="score" value="2">Satisfactory<br />
					<input type="radio" name="score" value="1">Not Satisfactory<br />
					<br />
					<input type="submit" value="Vote" name="submit" id="submit" />
				</form>
				
			</div>
		</div>
	</div>

<div class="spacer"></div>

<?php include('./includes/footer.php'); ?>

</div>
</body></html>