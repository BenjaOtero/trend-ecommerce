<?php
include_once ("../models/items_mdl.php");
include_once ("../models/articulos_mdl.php");
$modelo_item = new ItemMDL();
$modelo_articulo = new ArticuloMDL();

$actionCatalogo='lo_nuevo';
if(isset($_REQUEST['actionCatalogo']))
    {$actionCatalogo=$_REQUEST['actionCatalogo'];}
    
$view= new stdClass();
$view_items= new stdClass();
$view_articulos= new stdClass(); // creo una clase standard para contener la vista

switch ($actionCatalogo)
{
    case 'loNuevo':
        $id_local=$_REQUEST['local'];
        $view_items->items=$modelo_item->Listar($id_local);   // la vista esta en el contentTemplate
        $view_items->itemsTemplate="../views/templates/items_tpl.php";
        $registro = current($view_items->items);
        $view_articulos->articulos=$modelo_articulo->LoNuevo($id_local);    // la vista esta en el contentTemplate
        $view_articulos->articulosTemplate="../views/templates/articulos_tpl.php";
        $view->contentTemplate="../views/templates/catalogo_tpl.php";
        $titulo = "Lo nuevo";
        break;
    case 'loNuevoRefresh':
        $id_local=$_REQUEST['local'];
        $titulo = $_REQUEST['titulo'];
        $view_articulos->articulos=$modelo_articulo->LoNuevo($id_local);
        $view->contentTemplate="../views/templates/articulos_tpl.php"; // seteo el template que se va a mostrar
        break;
    case 'byItem':
        $id_local=$_REQUEST['local'];
        $id_item=$_REQUEST['idItem'];
        $titulo = $_REQUEST['titulo'];
        $view_articulos->articulos=$modelo_articulo->ArticulosByItem($id_local, $id_item);
        $view->contentTemplate="../views/templates/articulos_tpl.php"; // seteo el template que se va a mostrar
        break;
    case 'articulo':
        $id_local=$_REQUEST['local'];
        $id_articulo=$_REQUEST['articulo']; 
        $talleART =array();
        $ImagenART =array();
        $ImagenBackART =array();
        $view_articulos->articulos=$modelo_articulo->Articulo($id_local, $id_articulo, $ImagenART, $ImagenBackART, $talleART);
        $view->contentTemplate="../views/templates/articulo_tpl.php"; // seteo el template que se va a mostrar
        break;
    case 'maximizarArticulo':
        $id_local=$_REQUEST['local'];
        $id_articulo=$_REQUEST['imagen']; 
        $_SESSION['id_articulo']=$_REQUEST['imagen']; 
        $ImagenART =array();
        $ImagenBackART =array();
        $DescripcionWebART ='';
        $view_articulos->articulos=$modelo_articulo->ArticuloMaximizar($id_local, $_SESSION['id_articulo'], 
                $ImagenART, $ImagenBackART, $DescripcionWebART);        
        $view->contentTemplate="../views/templates/articulo_max_tpl.php"; // seteo el template que se va a mostrar
        break;       
    default :
}
if($actionCatalogo==='maximizarArticulo')
    {include_once ('../views/layouts/articulo_maximizar.php');} // el layout incluye el template adentro
else    
    include_once ($view->contentTemplate);