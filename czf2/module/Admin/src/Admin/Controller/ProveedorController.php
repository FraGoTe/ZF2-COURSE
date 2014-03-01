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

class ProveedorController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
    
    public function nuevoAction()
    {
        $view = new ViewModel();
        $form = new \Admin\Form\Proveedor();
        $inputFilter = new \Admin\InputFilter\Proveedor(20);
        $form->setInputFilter($inputFilter);
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                $sl = $this->getServiceLocator();
                $proveedor = new \Admin\Model\Proveedor();
                $data = $form->getData();
//                $categoria->setNombre($data['nombre']);
//                $categoria->setActivo($data['activo']);
                $proveedor->exchangeArray($form->getData());
                $proveedorTable = $sl->get('Admin\Model\ProveedorTable');
                $proveedorTable->guardar($proveedor);
                return $this->redirect()->toRoute('admin/default',array('controller'=>'proveedor','action'=>'index'));
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
    
    
    
    
    
    
    public function listarAction() {
        return new ViewModel();
    }
    
    
    
        /**
         *  Esto es un ejemplo de Autocarga
         * Esta clase se mapea con el archivo 
         * modules/Admin/src/Admin/Mueble/Escritorio.php
         */
//        $objAuto = new \Admin\Mueble\Escritorio();
        

    
    public function formularioAction() {
        $view = new ViewModel();
        $form = new \Admin\Form\Contacto();
        $inputFilter = new \Admin\InputFilter\Contacto();
        $form->setInputFilter($inputFilter);
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            var_dump($data);
            if($form->isValid()){
                var_dump('Válido');
                var_dump($form->getData());
            }
        }
        $view->form = $form;
        return $view;
    }
    
}
