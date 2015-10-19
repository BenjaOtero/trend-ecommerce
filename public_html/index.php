<?php
function limpiarString($string){
    $string=htmlspecialchars(mysql_escape_string(trim($string)));
    return $string;
  }
$action='index';
if(isset($_REQUEST['action'])):
    $action=$_REQUEST['action'];
endif;
$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template

switch ($action)
{
    case 'index':
        $view->contentTemplate="../views/templates/index_front.php"; // seteo el template que se va a mostrar
        $view->contentMenu="../controllers/catalogo.php";
    //    $_SESSION['btnActivo']="index";
        break;
    case 'refreshIndex':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/index_front.php";
      //  $_SESSION['btnActivo']="index";
        break;
    case 'catalogo':
        $view->disableLayout=true;
        $view->contentTemplate="../controllers/catalogo.php";
        break;
    case 'refreshContacto':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/contacto_tpl.php";
      //  $_SESSION['btnActivo']="contacto";
        break;
    case 'maximizarArticulo':
        $view->disableLayout=true;
        $view->contentTemplate="../controllers/catalogo.php";
        break;        
    case 'refreshVuelos':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/vuelos.tpl";
        $_SESSION['btnActivo']="reservas";
        $_SESSION['ancla']=$_REQUEST['ancla'];
        break;
    default :
} 
if($view->disableLayout==true) 
    {include_once ($view->contentTemplate);}
else
    {include_once ('../views/layouts/front_end.php');} // el layout incluye el template adentro