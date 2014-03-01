<?php

namespace Admin\Model;

class Producto {
    
    protected $id;
    protected $categoriaId;
    protected $proveedorId;
    protected $nombre;
    protected $precioCompra;
    protected $precioVenta;


    public function getId() {
        return $this->id;
    }

    public function getCategoriaId() {
        return $this->categoriaId;
    }

    public function getProveedorId() {
        return $this->proveedorId;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecioCompra() {
        return $this->precioCompra;
    }

    public function getPrecioVenta() {
        return $this->precioVenta;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoriaId($categoriaId) {
        $this->categoriaId = $categoriaId;
    }

    public function setProveedorId($proveedorId) {
        $this->proveedorId = $proveedorId;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecioCompra($precioCompra) {
        $this->precioCompra = $precioCompra;
    }

    public function setPrecioVenta($precioVenta) {
        $this->precioVenta = $precioVenta;
    }

        
    public function exchangeArray(array $data)
    {
        $this->id                = (isset($data['id'])) ? $data['id']: null;
        $this->categoriaId       = (isset($data['categoria_id'])) ? $data['categoria_id']: null;
        $this->proveedorId       = (isset($data['proveedor_id'])) ? $data['proveedor_id']: null;
        $this->nombre            = (isset($data['nombre'])) ? $data['nombre']: null;
        $this->precioCompra      = (isset($data['precio_compra'])) ? $data['precio_compra']: null;
        $this->precioVenta       = (isset($data['precio_venta'])) ? $data['precio_venta']: null;
    }
    
    public function toArray(){
        return array(
            'id' => $this->id,
            'categoria_id' => $this->categoriaId,
            'proveedor_id' => $this->proveedorId,
            'nombre' => $this->nombre,
            'precio_compra' => $this->precioCompra,
            'precio_venta' => $this->precioVenta
        );
    }
    
}
