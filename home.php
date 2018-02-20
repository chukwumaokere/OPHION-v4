<?php
session_start();

$_SESSION['user_type'];


if (isset($_SESSION['username']) && $_SESSION['user_type'] == 0) {
	header("location:./welcomeemployer.html");
}
else if (isset($_SESSION['username']) && $_SESSION['user_type'] == 1) {
	header("location:./welcome.html");
}

else {
	header("location:./index.html");
}