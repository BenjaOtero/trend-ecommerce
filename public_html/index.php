<?php
include_once ("../models/items_mdl.php");
include_once ("../models/articulos_mdl.php");
require_once ("../models/generos_mdl.php");
$modelo_item = new ItemMDL();
$modelo_articulo = new ArticuloMDL();
$modelo_genero = new GeneroMDL();
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
        $view->generos=$modelo_genero->Listar();
        $view->generosTemplate="../views/templates/generos_tpl.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshIndex':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/index_front.php";
        break;
    case 'itemsYarticulos':
        $idItem=$_REQUEST['item'];
        $idGenero=$_REQUEST['genero'];
        $view->disableLayout=true;
        $view_items->items=$modelo_item->Listar($idGenero);   // la vista esta en el contentTemplate
        $view_items->itemsTemplate="../views/templates/items_tpl.php";
        $view_items->itemsXsTemplate="../views/templates/items_xs_tpl.php";
        $registro = current($view_items->items);
        $view_articulos->articulos=$modelo_articulo->ItemsArticulos($idItem, $idGenero);                        
        $view_articulos->articulosTemplate="../views/templates/articulos_tpl.php";
        $view->contentTemplate="../views/templates/catalogo_tpl.php";
        $titulo = "Lo nuevo";
        break;
    case 'byItem':
        $view->disableLayout=true;
        $id_item=$_REQUEST['idItem'];
        $id_genero=$_REQUEST['genero'];
        $titulo = $_REQUEST['titulo'];
        $view_articulos->articulos=$modelo_articulo->ArticulosByItem($id_item, $id_genero);        
        $registro = current($view_articulos->articulos);        
        $view->contentTemplate="../views/templates/articulos_tpl.php"; // seteo el template que se va a mostrar
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
    default :
} 
if($view->disableLayout==true) 
    {include_once ($view->contentTemplate);}
else
    {include_once ('../views/layouts/front_end.php');} // el layout incluye el template adentro