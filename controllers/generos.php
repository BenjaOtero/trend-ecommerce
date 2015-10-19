<?php
session_start();
include_once ("../../models/generos_mdl.php");

$modelo = new GeneroMDL();
$action='index';
if(isset($_REQUEST['action']))
    {$action=$_REQUEST['action'];}

$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template
$controlador='items'; // Uso $pagina en el atributo name del grid para pasar la ruta a functions.js
$n=1;

switch ($action)
{
    case 'index':
        $view->generos=$modelo->Listar();
        $view->contentTemplate="../../views/templates/usuarios_grid.tpl"; // seteo el template que se va a mostrar
        break;
    default :
}
include_once ($view->contentTemplate);
?>