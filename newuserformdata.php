<?php
include  'Account.php';

$user_type= $_POST['user_type'];
$name = $_POST['name'];
$company_name = $_POST['company_name'];
$company_id = $_POST['company_id'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$country= $_POST['country'];
$city = $_POST['city'];
$state_province = $_POST['state_province'];
$zip = $_POST['zip'];
$mainPhone = $_POST['main_phone1'] . $_POST['main_phone2'] . $_POST['main_phone3'];
$altPhone = $_POST['alt_phone1'] . $_POST['alt_phone2'] . $_POST['alt_phone3'];



$servername = 'localhost';
$dbusername   = 'root';
$dbpassword   = 'b4b8b7536bc203b176b2f30ed15eee1fe3f69cb52728c3a2';
$dbname     = 'chukwuma_ophion';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword); //connects to database
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //shows errors

//checks if Account exists
function doesUserExist($username, $conn) {
	$stmt = $conn->prepare("SELECT username FROM user WHERE username = :username");
	$stmt->bindParam(':username', $username);
	$stmt->execute();

	if($stmt->rowCount() > 0){
		return true;
	}

	else {
		return false;
	}
}

$r = doesUserExist($username, $conn);

if ($r == true) {
	header("location:http://ophion.chukwumaokere.com/accountexists.html");
}
else {
	$acc = new Account();
	$acc->createAccount(
			$user_type,
			$name,
			$company_name,
			$company_id,
			$email,
			$username,
			$password,
			$address1,
			$address2,
			$country,
			$city,
			$state_province,
			$zip,
			$mainPhone,
			$altPhone
			);

	$acc->insertAccount($conn);

	header("location:http://ophion.chukwumaokere.com/accountcreated.html"); /* Redirect browser */
}

exit();
