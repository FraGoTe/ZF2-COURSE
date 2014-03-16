<?php

namespace Admin\Model;

class VentaDetalle {
    
    protected $id;
    protected $idVenta;
    protected $idProducto;
    protected $cantidad;
    
    public function getId() {
        return $this->id;
    }

    public function getIdVenta() {
        return $this->idVenta;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdVenta($idVenta) {
        $this->idVenta = $idVenta;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

            
        public function exchangeArray(array $data)
    {
        $this->id       = (isset($data['id'])) ? $data['id']: null;
        $this->idVenta   = (isset($data['id_venta'])) ? $data['id_venta']: null;
        $this->idProducto   = (isset($data['id_producto'])) ? $data['id_producto']: null;
        $this->cantidad   = (isset($data['cantidad'])) ? $data['cantidad']: null;
    }
    
    public function toArray(){
        return array(
            'id' => $this->id,
            'id_venta' => $this->idVenta,
            'id_producto' => $this->idProducto,
            'cantidad' => $this->cantidad,
        );
    }
    
}
