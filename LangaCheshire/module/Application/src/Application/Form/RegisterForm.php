<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class RegisterForm extends Form {
    
    public function __construct()
    {
       // Define form name
       parent::__construct('register-form');
       // Set POST method for this form
       $this->setAttribute('method', 'post');

       $this->addElements();
       $this->addInputFilter();
    }

    protected function addElements() {
        $this->add(array(
            'type' => 'text',
            'name' => 'firstname',
            'attributes' => array(
                'id' => 'firstname',
            ),
            'options' => array(
                'label' => 'First Name *',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'lastname',
            'attributes' => array(
                'id' => 'lastname',
            ),
            'options' => array(
                'label' => 'Last Name *',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'phonenumber',
            'attributes' => array(
                'id' => 'phonenumber',
            ),
            'options' => array(
                'label' => 'Phone Number *',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'email',
            'attributes' => array(
                'id' => 'email',
            ),
            'options' => array(
                'label' => 'Email *',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'username',
            'attributes' => array(
                'id' => 'username',
            ),
            'options' => array(
                'label' => 'Username *',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'password',
            'attributes' => array(
                'id' => 'password',
            ),
            'options' => array(
                'label' => 'Password *',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'confirm-password',
            'attributes' => array(
                'id' => 'confirm-password',
            ),
            'options' => array(
                'label' => 'Confirm Password *',
            ),
        ));
        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Register',
                'id' => 'submitbutton',
            ),
        ));
    }

    private function addInputFilter() {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add(array(
            'name' => 'firstname',
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
            'name' => 'lastname',
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
            'name' => 'phonenumber',
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
                        'max' => 10
                    ),
                ),
            ),
        ));
        
        $inputFilter->add(array(
            'name' => 'email',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck' => false,
                    ),
                ),
            ),
        ));
        
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

        $inputFilter->add(array(
            'name' => 'confirm-password',
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
                array(
                    'name' => 'Identical',
                    'options' => array(
                        'token' => 'password',
                    ),
                ),
            ),
        ));
    }

}
