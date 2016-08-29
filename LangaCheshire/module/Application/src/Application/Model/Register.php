<?php

namespace Application\Model;

class Register
{
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $email;
    public $username;
    public $password;
    
    public function exchangeArray($data)
    {
        $this->firstName = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastName = (!empty($data['lastname'])) ? $data['lastname'] : null;
        $this->phoneNumber = (!empty($data['phonenumber'])) ? $data['phonenumber'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->username = (!empty($data['username'])) ? $data['username'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
    }
}
