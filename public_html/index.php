<?php
session_start();
include_once ("../controllers/componentes/utilitarios.php");
include_once ("../models/cupones_mdl.php");
include_once ("../models/items_mdl.php");
include_once ("../models/articulos_mdl.php");
include_once ("../models/generos_mdl.php");
$utilitarios = new Utilitarios();
$modelo_cupon = new CuponMDL();
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
$view_articulos = new stdClass();
$view_cupones = new stdClass();
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template

switch ($action)
{
    case 'index':
        $ip = $_SERVER["REMOTE_ADDR"];
        $existePromo = $utilitarios->CuponConfig();
        if($existePromo==false)
        {
            $view_cupones->cuponesTemplate="../views/templates/cupon_empty_tpl.php"; 
        }
        else 
        {
            $view_cupones->cuponesTemplate="../views/templates/cupon_tpl.php";
            $porcentaje = $existePromo[0]['Porcentaje'];
            $vencimientoCupon = $existePromo[0]['FechaVencimiento'];
            $vencCuponFormat = $utilitarios->devolverFormatoFecha($vencimientoCupon);            
            $color = $existePromo[0]['Color'];
        }
        if(isset($_REQUEST['cupon']))
        {
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $correo = $_REQUEST['correo'];
            $datos = $utilitarios->AgregarCupon($nombre, $apellido, $correo,$vencimientoCupon);
            if($datos['AgregarCupon'] != FALSE)
            {
               // enviar mail
               $view_cupones->cuponesTemplate="../views/templates/cupon_empty_tpl.php";  
            }
            else 
            {
                $view_cupones->cuponesTemplate="../views/templates/cupon_empty_tpl.php";
            }            
        }
        $utilitarios->contador($ip);
        $view->contentTemplate="../views/templates/index_front.php"; // seteo el template que se va a mostrar
        $view->generos=$modelo_genero->Listar();
        $view->generosTemplate="../views/templates/generos_tpl.php"; // seteo el template que se va a mostrar        
        break;
    case 'refreshIndex':      
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/index_front.php";        
        break;
    case 'loNuevoOutside':
        $view->generos=$modelo_genero->Listar();
        $view->generosTemplate="../views/templates/generos_tpl.php"; // seteo el template que se va a mostrar     
        $idItem=$_REQUEST['item'];
        $idGenero=$_REQUEST['genero'];
        $view_items = new stdClass();
        $view_items->items=$modelo_item->Listar($idGenero);  
        $view_items->itemsTemplate="../views/templates/items_tpl.php";
        $view_items->itemsXsTemplate="../views/templates/items_xs_tpl.php";
        $registro = current($view_items->items);
        $view_articulos->articulos=$modelo_articulo->Articulos($idItem, $idGenero);                        
        $view_articulos->articulosTemplate="../views/templates/articulos_tpl.php";
        $view->contentTemplate="../views/templates/catalogo_tpl.php";
        $titulo = "Lo nuevo";        
        break;
    case 'itemsYarticulos':
        $ip = $_SERVER["REMOTE_ADDR"];
        $utilitarios->contador($ip);        
        $view->disableLayout=true;
        $idItem=$_REQUEST['item'];
        $idGenero=$_REQUEST['genero'];
        $view_items = new stdClass();
        $view_items->items=$modelo_item->Listar($idGenero);  
        $view_items->itemsTemplate="../views/templates/items_tpl.php";
        $view_items->itemsXsTemplate="../views/templates/items_xs_tpl.php";
        $registro = current($view_items->items);
        $view_articulos->articulos=$modelo_articulo->Articulos($idItem, $idGenero);                        
        $view_articulos->articulosTemplate="../views/templates/articulos_tpl.php";
        $view->contentTemplate="../views/templates/catalogo_tpl.php";
        $titulo = "Lo nuevo";
        break;
    case 'byItem':
        $view->disableLayout=true;
        $id_item=$_REQUEST['idItem'];
        $id_genero=$_REQUEST['genero'];
        $titulo = $_REQUEST['titulo'];
        $view_articulos->articulos=$modelo_articulo->Articulos($id_item, $id_genero);        
        $registro = current($view_articulos->articulos);        
        $view->contentTemplate="../views/templates/articulos_tpl.php"; // seteo el template que se va a mostrar
        break; 
    case 'articulo':
        $view->disableLayout=true;
    //    $id_local=$_REQUEST['local'];
        $id_articulo=$_REQUEST['articulo']; 
        $talleART =array();
        $ImagenART =array();
        $ImagenBackART =array();        
        $view_articulos->articulos=$modelo_articulo->Articulo($id_articulo, $ImagenART, $ImagenBackART, $talleART);
        $view->contentTemplate="../views/templates/articulo_tpl.php"; // seteo el template que se va a mostrar
        break;    
    case 'contacto':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/contacto_tpl.php";
        break;
    case 'enviarMail':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/mail_tpl.php";
        break;
    case 'maximizarArticulo':
        $view->disableLayout=true;    
        $id_articulo=$_REQUEST['articulo']; 
        $_SESSION['imagen']=$_REQUEST['imagen']; 
        $ImagenART =array();
        $ImagenBackART =array();
        $DescripcionWebART ='';        
        $view_articulos->articulos=$modelo_articulo->ArticuloMaximizar($id_articulo, 
                $ImagenART, $ImagenBackART, $DescripcionWebART);        
        $view->contentTemplate="../views/templates/articulo_max_tpl.php"; // seteo el template que se va a mostrar
        break;
    case 'cupon':
        $view->disableLayout=true;
        $view_cupones->cuponesTemplate="../views/templates/cupon_ok_tpl.php"; 
        break;    
    default :
} 
    if($action==='maximizarArticulo'){
    {include_once ('../views/layouts/articulo_maximizar.php');} // el layout incluye el template adentro
}   
else if($action==='loNuevoOutside'){
    include_once ('../views/layouts/front_end.php'); // el layout incluye el template adentro      
    include_once ($view->contentTemplate);   
}  
else {
    if($view->disableLayout==true) 
        {include_once ($view->contentTemplate);}
    else
        {include_once ('../views/layouts/front_end.php');} // el layout incluye el template adentro     
}   


