<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['level']);
unset($_SESSION['name']);

session_destroy();
header("Location: http://www.iiitcslcentral.co.cc/");

?>	