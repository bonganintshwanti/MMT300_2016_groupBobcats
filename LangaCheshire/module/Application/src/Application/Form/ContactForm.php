<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class ContactForm extends Form {
    
    public function __construct()
    {
       // Define form name
       parent::__construct('contact-form');
       // Set POST method for this form
       $this->setAttribute('method', 'post');

       $this->addElements();
       $this->addInputFilter();
    }

    protected function addElements() {
        $this->add(array(
            'type' => 'text',
            'name' => 'name',
            'attributes' => array(
                'id' => 'name',
            ),
            'options' => array(
                'label' => 'Name *',
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
            'type' => 'textarea',
            'name' => 'message',
            'attributes' => array(
                'id' => 'message',
            ),
            'options' => array(
                'label' => 'Message *',
            ),
        ));
        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Send',
                'id' => 'submitbutton',
            ),
        ));
    }

    private function addInputFilter() {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add(array(
            'name' => 'name',
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
            'name' => 'message',
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
                        'max' => 255
                    ),
                ),
            ),
        ));
    }

}
