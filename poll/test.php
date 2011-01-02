<?php
	if(isset($_POST["submit"])) {
		$roll = $_POST["roll"];
		header("Location: form.php?rollno=$roll");
	}
?>
<form method="post" action="">
<input name="roll" type="text">
<input name="submit" type="submit">
</form>