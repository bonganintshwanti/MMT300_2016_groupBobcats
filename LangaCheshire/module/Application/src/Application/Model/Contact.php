<?php

namespace Application\Model;

class Contact
{
    public $name;
    public $email;
    public $message;
    
    public function exchangeArray($data)
    {
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->message = (!empty($data['message'])) ? $data['message'] : null;
    }
}
