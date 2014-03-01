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

class ProductoController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
    
    public function nuevoAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $categoriaTable = $sl->get('Admin\Model\CategoriaTable');
        $proveedorTable = $sl->get('Admin\Model\ProveedorTable');
        $form = new \Admin\Form\Producto();
        $form->setCategorias($categoriaTable->getCboData());
        $form->setProveedores($proveedorTable->getCboData());
        $inputFilter = new \Admin\InputFilter\Producto();
        $form->setInputFilter($inputFilter);
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                $producto = new \Admin\Model\Producto();
                $data = $form->getData();
                $producto->exchangeArray($form->getData());
                $productoTable = $sl->get('Admin\Model\ProductoTable');
                $productoTable->guardar($producto);
                return $this->redirect()->toRoute('admin/default',array('controller'=>'producto','action'=>'index'));
            }
        }
        $view->form = $form;
        return $view;
    }
    
    public function editarAction()
    {
        $view = new ViewModel();
        return $view;
    }
    
    public function borrarAction()
    {
        $view = new ViewModel();
        return $view;
    }
    
    
    
    
    
    
  
}
