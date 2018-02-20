<?php
class Employee {
	public $employeeId;
	public $user_type;
	private $name;
	public $address1;
	public $address2;
	public $city;
	public $state;
	public $zip;
	public $mainPhone;
	public $altPhone;
	public $isFullTime;

	public function createEmployee(
		$employeeId,
		$user_type,
		$name, 
		$address1, 
		$address2, 
		$city,
		$state,
		$zip, 
		$mainPhone, 
		$altPhone, 			
		$isFullTime
	) {
		$this->employeeId = $employeeId;
		$this->user_type = $user_type;
		$this->name = $name;
		$this->address1 = $address1;
		$this->address2 = $address2;
		$this->city = $city;
		$this->state = $state;
		$this->zip = $zip;
		$this->mainPhone = $mainPhone;
		$this->altPhone = $altPhone;
		$this->isFullTime = $isFullTime;
	}
	
	public function insertEmployee($conn){
		//prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO employee (user_type, employee_id, name, address_line_1, address_line_2, city, state, zip, main_phone, alt_phone, is_full_time)
								VALUES	(:user_type, :employee_id, :name, :address_line_1, :address_line_2, :city, :state, :zip, :main_phone, :alt_phone, :is_full_time)");
		$stmt->bindParam(':user_type', $this->user_type);
		$stmt->bindParam(':employee_id', $this->employeeId);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':address_line_1', $this->address1);
		$stmt->bindParam(':address_line_2', $this->address2);
		$stmt->bindParam(':city', $this->city);
		$stmt->bindParam(':state', $this->state);
		$stmt->bindParam('zip', $this->zip);
		$stmt->bindParam(':main_phone', $this->mainPhone);
		$stmt->bindParam(':alt_phone', $this->altPhone);
		$stmt->bindParam(':is_full_time', $this->isFullTime);
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