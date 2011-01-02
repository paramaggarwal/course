<?
	//-----------------------------
	if(isset($_POST['rollno'])) {
		$rollno = $_POST['rollno'];
	}
	$poll_file = $rollno . ".txt";
	$options_file = "options.txt";
	$redirect_page = "form.php"; // The page the user will be redirect to after voting
	
	$display_votes = false; // If you want to leave the vote totals for each option hidden until the user votes, leave this at false; if you want the vote totals for each option to be shown all the time, change it to true

	$read_options = fopen($options_file, "r");
	$options = fread($read_options, 1024);
	$options = explode("\n", $options);
	fclose($read_options);
	
	$read_poll = fopen($poll_file, "r");
	$choices = fread($read_poll, 1024);
	$choices = explode("|", $choices);
	fclose($read_poll);
	
	$date = $options[0];
	$header = $options[1];
	$question = $options[2];
	$cookie_name = $options[3];
	$redirect_page = $options[4];
	$cookie_timeout = $options[5];
	$total_votes = $choices[10]+$choices[11]+$choices[12]+$choices[13]+$choices[14]+$choices[15]+$choices[16]+$choices[17]+$choices[18]+$choices[19];
	//-----------------------
	
	$this_page = $_SERVER["PHP_SELF"];

	if(isset($_GET["update"])) {

	$date = $_POST["date"];
	$header = stripslashes($_POST["header"]);
	$question = stripslashes($_POST["question"]);
	$cookie_name = $_POST["cookie_name"];
	$redirect_page = $_POST["redirect_page"];
	$cookie_timeout = $_POST["cookie_timeout"];
	
	$answer1 = stripslashes($_POST["choice0"]);
	$answer2 = stripslashes($_POST["choice1"]);
	$answer3 = stripslashes($_POST["choice2"]);
	$answer4 = stripslashes($_POST["choice3"]);
	$answer5 = stripslashes($_POST["choice4"]);
	$answer6 = stripslashes($_POST["choice5"]);
	$answer7 = stripslashes($_POST["choice6"]);
	$answer8 = stripslashes($_POST["choice7"]);
	$answer9 = stripslashes($_POST["choice8"]);
	$answer10 = stripslashes($_POST["choice9"]);
	$tally1 = $_POST["result0"];
	$tally2 = $_POST["result1"];
	$tally3 = $_POST["result2"];
	$tally4 = $_POST["result3"];
	$tally5 = $_POST["result4"];
	$tally6 = $_POST["result5"];
	$tally7 = $_POST["result6"];
	$tally8 = $_POST["result7"];
	$tally9 = $_POST["result8"];
	$tally10 = $_POST["result9"];

	$change_options = $date."\n".$header."\n".$question."\n".$cookie_name."\n".$redirect_page."\n".$cookie_timeout;
	$change_answers = $answer1."|".$answer2."|".$answer3."|".$answer4."|".$answer5."|".$answer6."|".$answer7."|".$answer8."|".$answer9."|".$answer10."|".$tally1."|".$tally2."|".$tally3."|".$tally4."|".$tally5."|".$tally6."|".$tally7."|".$tally8."|".$tally9."|".$tally10;

	$update_options_file = fopen($options_file, "w");
	fwrite($update_options_file, $change_options);
	fclose($update_options_file);
	
	$update_poll_file = fopen($poll_file, "w");
	fwrite($update_poll_file, $change_answers);
	fclose($update_poll_file);

	header("Location: $this_page");
	}
?>

<form action="<?=$this_page?>?update" method="post">
	<strong>Date</strong><br />
	<input name="date" type="text" value="<?=$options[0]?>" /><br /><br />
	<strong>Header</strong><br />
	<input name="header" type="text" value="<?=$options[1]?>" /><br /><br />
	<strong>Question</strong><br />
	<input name="question" size="50" type="text" value="<?=$options[2]?>" /><br /><br />
	<strong>Answers</strong> | <strong>Votes</strong><br />
	<input name="choice0" type="text" value="<?=$choices[0]?>" /> | <input name="result0" size="5" type="text" value="<?=$choices[10]?>" /><br />
	<input name="choice1" type="text" value="<?=$choices[1]?>" /> | <input name="result1" size="5" type="text" value="<?=$choices[11]?>" /><br />
	<input name="choice2" type="text" value="<?=$choices[2]?>" /> | <input name="result2" size="5" type="text" value="<?=$choices[12]?>" /><br />
	<input name="choice3" type="text" value="<?=$choices[3]?>" /> | <input name="result3" size="5" type="text" value="<?=$choices[13]?>" /><br />
	<input name="choice4" type="text" value="<?=$choices[4]?>" /> | <input name="result4" size="5" type="text" value="<?=$choices[14]?>" /><br />
	<input name="choice5" type="text" value="<?=$choices[5]?>" /> | <input name="result5" size="5" type="text" value="<?=$choices[15]?>" /><br />
	<input name="choice6" type="text" value="<?=$choices[6]?>" /> | <input name="result6" size="5" type="text" value="<?=$choices[16]?>" /><br />
	<input name="choice7" type="text" value="<?=$choices[7]?>" /> | <input name="result7" size="5" type="text" value="<?=$choices[17]?>" /><br />
	<input name="choice8" type="text" value="<?=$choices[8]?>" /> | <input name="result8" size="5" type="text" value="<?=$choices[18]?>" /><br />
	<input name="choice9" type="text" value="<?=$choices[9]?>" /> | <input name="result9" size="5" type="text" value="<?=$choices[19]?>" /><br /><br />
	<strong>Cookie Name</strong> (You should change this every time you change the poll question/answers)<br />
	<input name="cookie_name" type="text" value="<?=$options[3]?>" /><br /><br />
	<strong>Redirect Page</strong> (This is the page the user will be redirected to after they vote)<br />
	<input name="redirect_page" type="text" value="<?=$options[4]?>" /><br /><br />
	<strong>Cookie Timeout</strong> (The amount of time until the vote cookie expires, in seconds; 604800 equals one week)<br />
	<input name="cookie_timeout" type="text" value="<?=$options[5]?>" /><br /><br />
	<input type="submit" value="Update Poll" />
</form>