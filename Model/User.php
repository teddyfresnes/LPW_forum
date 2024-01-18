<?php
class User
{
	private int $id;
	private string $email;
	private string $password;
	private string $firstName;
	private string $lastName;
	private string $address;
	private string $postalCode;
	private string $city;
	private string $country;
	private bool $admin;
	private DateTime $createdAt;
	
	
	public function __construct(array $donnees)
	{
		foreach($donnees as $key => $value)
		{
			$this->$key = $value;
		}
	}
	
	
	// getters
	public function getId()
	{
		return $this->id;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getFirstName()
	{
		return $this->firstName;
	}
	public function getLastName()
	{
		return $this->lastName;
	}
	public function getAddress()
	{
		return $this->address;
	}
	public function getPostalCode()
	{
		return $this->postalCode;
	}
	public function getCity()
	{
		return $this->city;
	}
	public function getCountry()
	{
		return $this->country;
	}
	public function getAdmin()
	{
		return $this->admin;
	}
	public function getCreatedAt()
    {
        return $this->createdAt;
    }


	
	
	// setters
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	public function setFirstName($firstName)
	{
		if(is_string($firstName))
		{
			$this->firstName = $firstName;
			return $this;
		}
	}
	public function setLastName($lastName)
	{
		if(is_string($lastName))
		{
			$this->lastName = $lastName;
			return $this;
		}
	}
	public function setAddress($address)
	{
		$this->address = $address;
		return $this;
	}
	public function setPostalCode($postalCode)
	{
		$this->postalCode = $postalCode;
		return $this;
	}
	public function setCity($city)
	{
		$this->city = $city;
		return $this;
	}
	public function setCountry($city)
	{
		$this->city = $city;
		return $this;
	}
	public function setAdmin($admin)
	{
		$this->admin = $admin;
		return $this;
	}
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}

?>