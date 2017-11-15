<?php
Session_start();
Session_destroy();

Session_start();
$_SESSION["Messege"] = "You have been logged out";

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>