<?php

namespace Educacion;

/**
 * Description of AlumnoAdiestra
 *
 * @author Ernesto Anaya
 */
class AlumnoAdiestra extends Alumno {
    
    const INSTITUTO = 'Adientra';
    const INSTITUTO_DIRECCION = 'Emilio de Althaus ...';
    protected $separadoresValidos;


    public $lab;
    
    public function __construct() {
        parent::__construct();
        $this->separadoresValidos = array(
            'Espacio' => ' ',
            'Guion' => '-',
            'Arroba' => '@'
        );
    }

    protected function cambiarSeparador($sep){
        $this->separador = $sep;
    }
    

    public function __call($name, $arguments) {
        if(substr($name, 0, 16)=='cambiarSeparador'){
            $sep = substr($name, 16, strlen($name)-1);
            if(array_key_exists($sep, $this->separadoresValidos)){
                    $this->cambiarSeparador($this->separadoresValidos[$sep]);
            }
        }
    }
    
}
