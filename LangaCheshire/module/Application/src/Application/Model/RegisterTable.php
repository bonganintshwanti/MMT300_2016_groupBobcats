<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;   

class RegisterTable 
{
    protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()      
     {
         $resultSet = $this->tableGateway->select();    
         return $resultSet;
     }

     public function getUser($un,$pw)     
     {
         $username  = $un;
         $password = $pw;
         
        $rowset = $this->tableGateway->select(array(
                'username' => $username,
                'password' => $password
            )
        ); 
                                        
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $username");
         }
         return $row;
     }

     public function saveUser(Register $user)    
     {
         $data = array(
             'firstname'  => $user->firstName,
             'lastname'  => $user->lastName,
             'phonenumber' => $user->phoneNumber,
             'email'  => $user->email,
             'username'  => $user->username,
             'password' => $user->password,
         );

         $username = $user->username;
         if ($username == 0) {
             $this->tableGateway->insert($data);    
         } else {
             if ($this->getUser($username)) {
                 $this->tableGateway->update($data, array('username' => $username)); 
             } else {
                 throw new \Exception('User does not exist');
             }
         }
     }
}
