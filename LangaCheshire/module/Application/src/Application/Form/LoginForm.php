<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class LoginForm extends Form {
    
    public function __construct()
    {
       // Define form name
       parent::__construct('login-form');
       // Set POST method for this form
       $this->setAttribute('method', 'post');
       
       $this->addElements();
       $this->addInputFilter();
    }

    protected function addElements() {
        $this->add(array(
            'type' => 'text',
            'name' => 'username',
            'attributes' => array(
                'id' => 'username',
            ),
            'options' => array(
                'label' => 'Username',
            ),

        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'password',
            'attributes' => array(
                'id' => 'password',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'LOGIN',
                'id' => 'submitbutton',
            ),
        ));
    }

    private function addInputFilter() {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add(array(
            'name' => 'username',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 1,
                        'max' => 30
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name' => 'password',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 12,
                    ),
                ),
            ),
        ));
    }

}
