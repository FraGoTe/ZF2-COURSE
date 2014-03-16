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

class CategoriaController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $categoriaTable = $sl->get('Admin\Model\CategoriaTable');
        $view->rows = $categoriaTable->fetchAll();
        return $view;
    }
    
    public function nuevoAction()
    {
        $view = new ViewModel();
        $form = new \Admin\Form\Categoria();
        $inputFilter = new \Admin\InputFilter\Categoria();
        $form->setInputFilter($inputFilter);
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                $sl = $this->getServiceLocator();
                $categoria = new \Admin\Model\Categoria();
                $categoria->exchangeArray($form->getData());
                $categoriaTable = $sl->get('Admin\Model\CategoriaTable');
                $categoriaTable->guardar($categoria);
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
    
    
    
    
    public function getFamiliasAction() {
        $view = new ViewModel();
        $this->layout('blank');
        
        $data = array();
        
        $request = $this->getRequest();
        if($request->isPost()){
            $sl = $this->getServiceLocator();
            $familiaTable = $sl->get('Admin\Model\FamiliaTable');
            $data = $request->getPost();
            $data = $familiaTable->getCboDataHijas($data->id);
        }
        
        $json = json_encode($data);        
        
        $view->json = $json;
        return $view;
    }
    
    
    
    
    public function familiaAction() {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $familiaTable = $sl->get('Admin\Model\FamiliaTable');
        $form = new \Admin\Form\Familia();
        $form->setFamilias($familiaTable->getCboData());
        $inputFilter = new \Admin\InputFilter\Familia();
        $form->setInputFilter($inputFilter);
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                $familia = new \Admin\Model\Familia();
                $familia->exchangeArray($form->getData());
                $familiaTable->guardar($familia);
            }
        }
        $view->form = $form;
        return $view;
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
