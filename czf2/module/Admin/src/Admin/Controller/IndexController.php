<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $view->acl = $sl->get('acl');
        return $view;
    }

    public function httpClientAction() {
        $view = new ViewModel();
        $client = new \Zend\Http\Client();
        $request = new \Zend\Http\Request();
        
        $request->setUri('http://local.czf2.com/tema-rest/5');
        $request->setMethod(\Zend\Http\Request::METHOD_DELETE);
//        $request->getPost()->set('nombre', 'Zend');
//        $client->setEncType(\Zend\Http\Client::ENC_URLENCODED);
        
        $response = $client->dispatch($request);
        
        
        if($response->isSuccess()){
            var_dump($response->getContent());
        }
                
        return $view;
    }
    
}
