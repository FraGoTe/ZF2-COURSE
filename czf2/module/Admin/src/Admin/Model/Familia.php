<?php

namespace Admin\Model;

class Familia {
    
    protected $id;
    protected $idPadre;
    protected $nombre;
    
    public function getId() {
        return $this->id;
    }

    public function getIdPadre() {
        return $this->idPadre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdPadre($idPadre) {
        $this->idPadre = $idPadre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

        
        public function exchangeArray(array $data)
    {
        $this->id       = (isset($data['id'])) ? $data['id']: null;
        $this->idPadre   = (isset($data['id_padre'])) ? $data['id_padre']: null;
        $this->nombre   = (isset($data['nombre'])) ? $data['nombre']: null;
    }
    
    public function toArray(){
        return array(
            'id' => $this->id,
            'id_padre' => $this->idPadre,
            'nombre' => $this->nombre,
        );
    }
    
}
