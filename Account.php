<?php
class Account {
	public $user_type;
	private $name;
	public $company_name;
	public $company_id;
	public $email;
	public $username;
	public $password;
	public $address1;
	public $address2;
	public $country;
	public $city;
	public $state_province;
	public $zip;
	public $mainPhone;
	public $altPhone;

	public function createAccount(
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
	) {
		$this->user_type = $user_type;
		$this->name = $name;
		$this->company_name = $company_name;
		$this->company_id = $company_id;
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->address1 = $address1;
		$this->address2 = $address2;
		$this->country = $country;
		$this->city = $city;
		$this->state_province = $state_province;
		$this->zip = $zip;
		$this->mainPhone = $mainPhone;
		$this->altPhone = $altPhone;
	}
	
	public function insertAccount($conn){
		//prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO user (user_type, name, company_name, company_id, email, username, password, address_line_1, address_line_2, country, city, state_province, zip, main_phone, alt_phone)
								VALUES	(:user_type, :name, :company_name, :company_id, :email, :username, :password, :address_line_1, :address_line_2, :country, :city, :state_province, :zip, :main_phone, :alt_phone)");
		$stmt->bindParam(':user_type', $this->user_type);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':company_name', $this->company_name);
		$stmt->bindParam(':company_id', $this->company_id);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':username', $this->username);
		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':address_line_1', $this->address1);
		$stmt->bindParam(':address_line_2', $this->address2);
		$stmt->bindParam(':country', $this->country);
		$stmt->bindParam(':city', $this->city);
		$stmt->bindParam(':state_province', $this->state_province);
		$stmt->bindParam(':zip', $this->zip);
		$stmt->bindParam(':main_phone', $this->mainPhone);
		$stmt->bindParam(':alt_phone', $this->altPhone);
		$stmt->execute();
	}

	/*
	public function getEncryptedSsn()
	{
		return $this->ssn * 2;
	}*/
}

/*
$employee = new Employee();
var_dump($employee);
$employee->createEmployee(1, 2, 3, 4, 5, 6, 7, 8, 'nine', 10);
var_dump($employee);
*/