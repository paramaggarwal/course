<?
	$message = "";
	$rollno = "";
        if(isset($_POST['rollno'])) {
		$rollno = $_POST['rollno'];
	}

	if(isset($_GET['rollno'])) {
		$rollno = $_GET['rollno'];
	}

	$poll_file = $rollno . ".txt";
	$options_file = "options.txt";
	$redirect_page = "form.php";
	
	$display_votes = false; 

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

	if(isset($_COOKIE["$cookie_name"]) && $_GET["message"] != "1" && $_GET["message"] != "2" && $_GET["message"] != "3") $message = "<ins>Results</ins><br /><br />";
	elseif(!isset($_COOKIE["$cookie_name"]) && !isset($_GET["message"]) || $_GET["message"] < "1" || $_GET["message"] > "3") $message = "<ins>Cast your vote below.</ins><br /><br />";
	elseif($_GET["message"] == "1") $message = "<ins>Your vote has been added.</ins><br /><br />";
	elseif($_GET["message"] == "2") $message = "<ins>You must select a choice.</ins><br /><br />";
	elseif($_GET["message"] == "3") $message = "<ins>You can only vote once per week.</ins><br /><br />";
?>
<table>
				<tr>
					<td>
					<?=$date?>

					</td>
				</tr>
				<tr>
					<td>
					<em><?=$header?></em><br />
					<strong><?=$question?></strong><br /><br />
					<?=$message?>

					<form action="vote.php" method="post">
					<hr />
<input type="hidden" name="rollno" value="<?php echo $rollno; ?>" />
					<p><input name="choice" type="radio" value="0" /> <?=$choices[0]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[10]?></strong>)<? } ?></p>
					<p><input name="choice" type="radio" value="1" /> <?=$choices[1]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[11]?></strong>)<? } ?></p>
<? if(isset($choices[2]) && trim($choices[2]) != "") { ?>
					<p><input name="choice" type="radio" value="2" /> <?=$choices[2]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[12]?></strong>)<? } ?></p>
<? } if(isset($choices[3]) && trim($choices[3]) != "") { ?>
					<p><input name="choice" type="radio" value="3" /> <?=$choices[3]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[13]?></strong>)<? } ?></p>
<? } if(isset($choices[4]) && trim($choices[4]) != "") { ?>
					<p><input name="choice" type="radio" value="4" /> <?=$choices[4]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[14]?></strong>)<? } ?></p>
<? } if(isset($choices[5]) && trim($choices[5]) != "") { ?>
					<p><input name="choice" type="radio" value="5" /> <?=$choices[5]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[15]?></strong>)<? } ?></p>
<? } if(isset($choices[6]) && trim($choices[6]) != "") { ?>
					<p><input name="choice" type="radio" value="6" /> <?=$choices[6]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[16]?></strong>)<? } ?></p>
<? } if(isset($choices[7]) && trim($choices[7]) != "") { ?>
					<p><input name="choice" type="radio" value="7" /> <?=$choices[7]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[17]?></strong>)<? } ?></p>
<? } if(isset($choices[8]) && trim($choices[8]) != "") { ?>
					<p><input name="choice" type="radio" value="8" /> <?=$choices[8]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[18]?></strong>)<? } ?></p>
<? } if(isset($choices[9]) && trim($choices[9]) != "") { ?>
					<p><input name="choice" type="radio" value="9" /> <?=$choices[9]?><? if($display_votes == false && isset($_COOKIE["$cookie_name"]) || $display_votes == true) { ?> (<strong><?=$choices[19]?></strong>)<? } ?></p>
<? } ?>
					<hr />				
					<p><strong><?=$total_votes?></strong> total votes<br /><br /></p>
					<? if(!isset($_COOKIE["$cookie_name"])) { ?>
<p><input name="submit" type="submit" value="Vote" /></p>
					<? } else { ?>
<p><em>Already voted.</em></p>
					<? } ?>
</form>
					
					</td>
				</tr>
			</table>
