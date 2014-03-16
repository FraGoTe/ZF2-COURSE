<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VentaController extends AbstractActionController
{
    
    public function indexAction()
    {
        $sess = new \Zend\Session\Container('venta');
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $productoTable = $sl->get('Admin\Model\ProductoTable');
        $form = new \Admin\Form\VentaDetalle();
        $form->get('id_producto')->setValueOptions($productoTable->getCboData());
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                if($sess->cart==null){
                    $sess->cart = array();
                }
                $sess->cart[] = $form->getData();
            }
        }
        $view->cart = $sess->cart;
        $view->form = $form;
        return $view;
    }
    
    public function finalizarAction()
    {
        $view = new ViewModel();
        $sess = new \Zend\Session\Container('venta');
        $sl = $this->getServiceLocator();
        $ventaTable = $sl->get('Admin\Model\VentaTable');
        $form = new \Admin\Form\Venta();
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            if($form->isValid()){
                $venta = new \Admin\Model\Venta();
                $venta->exchangeArray($form->getData());
                if($sess->cart==null){
                    $sess->cart = array();
                }
                
                $ventaTable->registrarVenta($venta, $sess->cart);
                
            }
        }
        $view->cart = $sess->cart;
        $view->form = $form;
        return $view;
    }

    
    
}
