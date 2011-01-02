<?php

session_start();

if ( $_POST["logout"] == "true")

session_destroy();
header("Location: http://www.iiitcslcentral.co.cc/");


?>	