<?php
  function cleanString($string){
    $string=trim($string);
    $string=mysql_escape_string($string);
	$string=htmlspecialchars($string);
    return $string;
  }
$action=$_REQUEST['action'];
$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template

switch ($action)
{
    case 'pagos':
        $view->contentTemplate="../views/templates/index_front.tpl"; // seteo el template que se va a mostrar
        $_SESSION['btnActivo']="index";
        break;
    case 'usuarios':
        unset($_REQUEST['action']);
        $view->disableLayout=true;
        $view->contentTemplate="../../controllers/usuarios.php";
        break;
    default :
}
if ($view->disableLayout==true)
    {include_once ($view->contentTemplate);}
else
    {include_once ('../views/layouts/front_end.lyt');} // el layout incluye el template adentro
?>
