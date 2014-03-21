<?php

namespace AlbumRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

//use Album\Model\Album;          // <-- Add this import
//use Album\Form\AlbumForm;       // <-- Add this import
//use Album\Model\AlbumTable;     // <-- Add this import
use Zend\View\Model\JsonModel;

class AlbumRestController extends AbstractRestfulController
{
    protected $albumTable;

    public function getList() // responde a GET
    {
        $data = array();
        foreach(range(0,rand(2,4)) as $result) {
            $data[] = array('id'=>$result,'nombre'=>'item '.$result);
        }

        return new JsonModel(array(
            'data' => $data,
        ));
    }

    public function get($id)  // responde a GET cuando existe id
    {
        $qparams = $this->params()->fromQuery();
        
        $req = $this->getRequest();
        $token = $req->getHeaders('X-Api-Token')->getFieldValue();

        $response = $this->getResponse();
        $headers = $response->getHeaders();
        $headers->addHeaders(array(
                'X-TokenValido: '.$token.$token,
            ));
        
        return new JsonModel(array(
            'data' => array('id'=>$id, 'valor'=>$id*rand(2,5)),
            'qparams' => $qparams,
            'ip_client' => $_SERVER['REMOTE_ADDR'],
        ));
    }

    public function create($data) // responde a POST
    {
        $this->response->setStatusCode(201);        
        return new JsonModel(array(
            'data' => array($data, 'x'=>$data['price']*2),
        ));
    }

    public function update($id, $data) // responde a PUT
    {
        return new JsonModel(array(
            'data' => array($data, 'x'=>$data['price']*4, 'id-param'=>$id),
        ));
    }

    public function delete($id) // responde a DELETE
    {
        return new JsonModel(array(
            'data' => 'deleted',
        ));
    }

}