<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;   

class ContactTable 
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
     
     public function getEmail($e)     
     {
        $email  = $e;
         
        $rowset = $this->tableGateway->select(array(
                'email' => $email,
            )
        ); 
                                        
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $email");
         }
         return $row;
     }

     public function saveEmail(Contact $sender)    
     {
         $data = array(
             'name'  => $sender->name,
             'email'  => $sender->email,
             'message'  => $sender->message,
         );

         $email = $sender->email;
         if ($email == 0) {
             $this->tableGateway->insert($data);    
         } else {
             if ($this->getEmail($email)) {
                 $this->tableGateway->update($data, array('email' => $email)); 
             } else {
                 throw new \Exception('Email does not exist');
             }
         }
     }
}
