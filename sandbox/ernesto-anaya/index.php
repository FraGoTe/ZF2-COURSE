Hola,
mi primera App de POO
<br />
<?php

spl_autoload_register(function($className){
    $classNameParts = explode('\\', $className);
    $filename = 'lib/'.$classNameParts[0].'/'.$classNameParts[1].'.php';
    require_once $filename;
});

$c = new \Formas\Cuadrado();

//define('TIPOALUMNO', 'asdsad');

//$alumno = new Alumno();
$alumnoAd = new \Educacion\AlumnoAdiestra();

$alumnoAd->nombre = 'Juan';
$alumnoAd->apellido = 'Perez';


//echo $alumnoAd->getNombreCompleto();
echo '<br />';
$alumnoAd->cambiarSeparadorArroba();
echo $alumnoAd;
echo '<br />';
$alumnoAd->cambiarSeparadorGuion();
echo $alumnoAd;
echo '<br />';
$alumnoAd->cambiarSeparadorEspacio();
echo $alumnoAd;
echo '<br />';
//echo Alumno::TIPO_REGULAR;


