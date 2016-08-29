<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\LoginForm;
use Application\Form\RegisterForm;
use Application\Form\ContactForm;
use Application\Model\Register;
use Application\Model\Login;
use Application\Model\Contact;

class IndexController extends AbstractActionController
{
    protected $registerTable;
    protected $contactTable;
    public function getRegisterTable()
    {
         if (!$this->registerTable) {
             $sm = $this->getServiceLocator();
             $this->registerTable = $sm->get('Application\Model\RegisterTable');
         }
         return $this->registerTable;
    }
    
    public function getContactTable()
    {
         if (!$this->contactTable) {
             $sm = $this->getServiceLocator();
             $this->contactTable = $sm->get('Application\Model\ContactTable');
         }
         return $this->contactTable;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function aboutAction()
    {
        return new ViewModel();
    }
    
    public function missionAction()
    {
        return new ViewModel();
    }
    
    public function visionAction()
    {
        return new ViewModel();
    }
    
    public function historyAction()
    {
        return new ViewModel();
    }

    public function needsAction()
    {
        return new ViewModel();
    }
    
    public function servicesAction()
    {
        return new ViewModel();
    }
    
    public function galleryAction()
    {
        return new ViewModel();
    }
    
    public function newsletterAction()
    {
        return new ViewModel();
    }
    
    public function contactAction()
    {
        $contactForm = new ContactForm();
        
        if($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost();            
            
            $contactForm->setData($data);
            
            // Validate form
            if($contactForm->isValid()) {
                
                // Get filtered and validated data
                $data = $contactForm->getData();
 
                $contact = new Contact();
                $contact->exchangeArray($data);

                $this->getContactTable()->saveEmail($contact);
                
                return $this->redirect()->toRoute('application/default', 
                        array('controller'=>'index', 'action'=>'emailsuccess'));
            }               
        } 
        return new ViewModel(
            array("contact" => $contactForm)
        );
    }
    
    public function donateAction()
    {
        $contactForm = new ContactForm();
        
        if($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost();            
            
            $contactForm->setData($data);
            
            // Validate form
            if($contactForm->isValid()) {
                
                // Get filtered and validated data
                $data = $contactForm->getData();
 
                $contact = new Contact();
                $contact->exchangeArray($data);

                $this->getContactTable()->saveEmail($contact);
                
                return $this->redirect()->toRoute('application/default', 
                        array('controller'=>'index', 'action'=>'emailsuccess'));
            }               
        } 
        return new ViewModel(
            array("contact" => $contactForm)
        );
    }
    
    public function registerAction()
    {
        $registerForm = new RegisterForm();
        
        if($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost();            
            
            $registerForm->setData($data);
            
            // Validate form
            if($registerForm->isValid()) {
                
                // Get filtered and validated data
                $data = $registerForm->getData();
 
                $register = new Register();
                $register->exchangeArray($data);

                $this->getRegisterTable()->saveUser($register);
                
                return $this->redirect()->toRoute('application/default', 
                        array('controller'=>'index', 'action'=>'registersuccess'));
            }               
        } 
        return new ViewModel(
            array("register" => $registerForm)
        );
    }
    
    public function loginAction()
    {
        $loginForm = new LoginForm();
        
        if($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost();            
            
            $loginForm->setData($data);
            
            // Validate form
            if($loginForm->isValid()) {
                
                // Get filtered and validated data
                $data = $loginForm->getData();
 
                $login = new Login();
                $login->exchangeArray($data);

                $this->getRegisterTable()->getUser($login->username,$login->password);
                
                return $this->redirect()->toRoute('application/default', 
                        array('controller'=>'index', 'action'=>'loginsuccess'));
            }               
        } 
        
        return new ViewModel(
            array("login" => $loginForm)
        );
    }
    
    public function emailsuccessAction()
    {
        return new ViewModel();
    }
    
    public function registersuccessAction()
    {
        return new ViewModel();
    }
    
    public function loginsuccessAction()
    {
        return new ViewModel();
    }
    
    public function unsubscribeAction()
    {
        return new ViewModel();
    }
}
