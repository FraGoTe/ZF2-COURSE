<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemaAuth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
    
    
    public function miCuentaAction()
    {
        $sl = $this->getServiceLocator();
        $auth = $sl->get('AuthService');
        if(!$auth->hasIdentity()){
            return $this->redirect()->toRoute(
                'tema-auth/default',
                array('controller'=>'index','action'=>'login')
            );
        }

        $view = new ViewModel();
        return $view;
    }
    
    public function logoutAction(){
        $sm = $this->getServiceLocator();
        $auth = $sm->get('AuthService');
        $auth->clearIdentity();
        return $this->redirect()->toRoute(
            'tema-auth/default',
            array('controller'=>'index','action'=>'login')
        );
        
    }
    
    public function loginAction(){
        $sl = $this->getServiceLocator();
        $auth = $sl->get('AuthService');
        if($auth->hasIdentity()){
            return $this->redirect()->toRoute('tema-auth/default',array('controller'=>'index','action'=>'index'));
        }
        $this->layout('login');
        $view = new ViewModel();
        $form = new \TemaAuth\Form\Login();
        $inputFilter = new \TemaAuth\InputFilter\Login();
        $form->setInputFilter($inputFilter);
        $view->form = $form;
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                $values = $form->getData();
                $auth->getAdapter()
                        ->setIdentity($values['usuario'])
                        ->setCredential($values['pwd']);
                $result = $auth->authenticate();
                
                if ( $result->isValid() ) {
                    $auth->getStorage()->write(
                        $auth->getAdapter()
                            ->getResultRowObject(null,array('password'))
                    );
                    return $this->redirect()->toRoute(
                        'tema-auth/default',
                        array('controller'=>'index','action'=>'mi-cuenta')
                    );
                }else {
                    $view->errorMsg = 'User or password incorrect';
                }
            }
        }
        return $view;
    }
    
}
