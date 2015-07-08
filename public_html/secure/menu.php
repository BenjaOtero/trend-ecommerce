<?php
$controlador=$_REQUEST['controlador'];
$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template

switch ($controlador)
{
    case 'inscripciones':
        $view->contentTemplate="../../controllers/inscripciones.php";
        break;
    case 'pagos':

        break;
    case 'usuarios':
        $view->contentTemplate="../../controllers/usuarios.php";
        break;
    default :
}
include_once ($view->contentTemplate);
?>
