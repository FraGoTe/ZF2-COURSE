<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemaAcl\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $auth = $sl->get('AuthService');
        
        $acl = $sl->get('acl');
        var_dump(array(
            'ver' => $acl->isAllowed('manager', 'categoria', 'ver'),
            'crear' => $acl->isAllowed('manager', 'categoria', 'crear'),
            'editar' => $acl->isAllowed('manager', 'categoria', 'editar'),
            'borrar' => $acl->isAllowed('manager', 'categoria', 'borrar'),
        ));
        
        return $view;
    }
    
}