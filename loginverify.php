<?php

$username = $_POST['username'];
$password = $_POST['password'];
$hashpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];
$POSTPASS = "okere9898461";
$hash = '$2y$10$4QOBoDHIZidxHGDPk0y2bedE0bT33oPfrAKR5wFcCHMkojRHETEuK';

$servername = 'localhost';
$dbusername   = 'root';
$dbpassword   = 'b4b8b7536bc203b176b2f30ed15eee1fe3f69cb52728c3a2';
$dbname     = 'chukwuma_ophion';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword); //connects to database
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //shows errors

$userquery = "SELECT username,password FROM user";

function getHashedPassword($username, $conn) {
	$stmt = $conn->prepare('SELECT password FROM user WHERE username = :username');
	$stmt->execute(
			array(
					'username'=>$username
			)
			);
	$row = $stmt->fetch();
	var_dump($row);
	if ($row == false) {
		return false;
	}
	return $row['password'];
}
$passwordHash = getHashedPassword($username, $conn);
password_verify($password, $passwordHash);


var_dump($hashpass);
/* foreach ( $conn->query($userquery) as $row ) {
	echo $row['username']. " - " .$row['password']."<br>";
}

//this also works
if (password_verify($password, $hash)) {
	echo 'Password is valid!';
} else {
	echo 'Invalid password.';
}
 */
var_dump($password);
var_dump($hash);
//var_dump($row);
//var_dump(checkPassword($password, $conn));
var_dump($userquery);


//take the input, hash it and match it up against the db



var_dump($passwordHash);
