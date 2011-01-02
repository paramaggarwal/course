<?
	//-----------------------------
	if(isset($_POST['rollno'])) {
		$rollno = $_POST['rollno'];
	}
	$poll_file = "$rollno".".txt";
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

	$choice = $_POST["choice"];

	if(isset($choice) && !isset($_COOKIE["$cookie_name"])) {
	
	$pick = "1".$choice;
	$choices[$pick] += 1;

	$file_write = $choices[0]."|".$choices[1]."|".$choices[2]."|".$choices[3]."|".$choices[4]."|".$choices[5]."|".$choices[6]."|".$choices[7]."|".$choices[8]."|".$choices[9]."|".$choices[10]."|".$choices[11]."|".$choices[12]."|".$choices[13]."|".$choices[14]."|".$choices[15]."|".$choices[16]."|".$choices[17]."|".$choices[18]."|".$choices[19];

	$choices_file = fopen($poll_file, "w");
	fwrite($choices_file, $file_write);
	fclose($choices_file);

	setcookie("$cookie_name", "true", time()+$cookie_timeout);
	header("Location: $redirect_page?message=1#poll");
	}

	elseif(!isset($choice)) {
	header("Location: $redirect_page?message=2#poll");
	}

	elseif(isset($_COOKIE["$cookie_name"])) {
	header("Location: $redirect_page?message=3#poll");
	}
?>