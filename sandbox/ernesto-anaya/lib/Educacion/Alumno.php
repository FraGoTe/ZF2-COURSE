<?php
/**
 * Description of Alumno
 *
 * @author Ernesto Anaya
 */

namespace Educacion;

class Alumno {
    
    public $nombre;
    public $apellido;
    public $tipo;
    
    protected $separador;
    
//    const TIPO_VIP = 1;
//    const TIPO_REGULAR = 2;
//    const TIPO_LIBRE = 3;
    
    const TIPO_VIP = 'vip';
    const TIPO_REGULAR = 'regular';
    const TIPO_LIBRE = 'libre';
//    
    //put your code here
    
    public function __construct() {
        $this->tipo = self::TIPO_REGULAR;
        $this->separador = ' ';
    }

    public function getNombreCompleto() {
        return $this->nombre. $this->separador . $this->apellido;
    }
    
    public function __toString() {
        return $this->getNombreCompleto();
    }

    private function cambiarSeparador($sep){
        $this->separador = $sep;
    }
    
    
}
