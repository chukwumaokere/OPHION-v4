<?php
session_start();

if (isset ($_SESSION['username'])) {
	echo "Welcome " . $_SESSION['username'] . " This is your profile <br>";
	echo " Welcome " . $_SESSION['user_type'] . " This is your user type";
	//header("location:./profile.html");
}else {
	//header(location:./pleaselogin.html);
	echo "You must be logged in to see this page";
}
?>
<html>
</html>
