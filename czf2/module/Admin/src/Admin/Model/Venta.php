<?php

namespace Admin\Model;

class Venta {
    
    protected $id;
    protected $ndoc;
    protected $ruc;
    protected $fecha;
    

    public function getId() {
        return $this->id;
    }

    public function getNdoc() {
        return $this->ndoc;
    }

    public function getRuc() {
        return $this->ruc;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNdoc($ndoc) {
        $this->ndoc = $ndoc;
    }

    public function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

            
        public function exchangeArray(array $data)
    {
        $this->id       = (isset($data['id'])) ? $data['id']: null;
        $this->ndoc   = (isset($data['ndoc'])) ? $data['ndoc']: null;
        $this->ruc   = (isset($data['ruc'])) ? $data['ruc']: null;
        $this->fecha   = (isset($data['fecha'])) ? $data['fecha']: null;
    }
    
    public function toArray(){
        return array(
            'id' => $this->id,
            'ndoc' => $this->ndoc,
            'ruc' => $this->ruc,
            'fecha' => $this->fecha,
        );
    }
    
}
