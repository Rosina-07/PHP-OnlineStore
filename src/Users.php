<?php

namespace src;

abstract class Users
{
    protected string $firstName;
    protected string $lastName;
    protected string $addressStreet;
    protected string $postCode;
    protected string $emailAddress;

    public function __construct(string $firstName, string $lastName, string $addressStreet, string $postCode, string $emailAddress)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->addressStreet = $addressStreet;
        $this->postCode = $postCode;
        $this->emailAddress = $emailAddress;
    }

    abstract protected function getAddress() :string;
}

class Customer extends Users
{
    public function getAddress() :string
    {
        return "<p>
                    $this->lastName, $this->firstName<br />
                    $this->addressStreet $this->postCode
                </p>";
    }

}

class BusinessUser extends Users
{
    private string $businessName;
    public int $VATNumber;

    public function __construct(string $firstName, string $lastName, string $addressStreet, string $postCode, string $emailAddress, string $businessName, int $VATNumber)
    {
        parent::__construct($firstName, $lastName, $addressStreet, $postCode, $emailAddress, $businessName, $VATNumber);
        $this->businessName = $businessName;
        $this->VATNumber = $VATNumber;
    }

    public function getAddress(): string
    {
            return "<p>
                $this->lastName, $this->firstName<br />
                $this->businessName<br />
                $this->addressStreet $this->postCode
            </p>";

    }
}
