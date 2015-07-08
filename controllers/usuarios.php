<?php
session_start();
include_once ("../../models/items_mdl.php");

$modelo = new ItemMDL();
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
        $view->usuario=$modelo->Listar($find,$inicio);
        $cantRows= $modelo->Contar($find);
        $view->contentTemplate="../../views/templates/usuarios_grid.tpl"; // seteo el template que se va a mostrar
        $paginas = $cantRows / 10;  // 10 es el nro de registros mostrados por página (dato pasado a paginador.tpl)
        $resto = $cantRows%10;
        if($resto <> 0)
          {
            $paginas = (int)$paginas + 1;
          }
        $inicio2 = 0;
        break;
    case 'refreshGrid':
        $find="";
        if($_REQUEST['origen']=='btnFind'):
            $find=$_REQUEST['txtFind'];
            $_SESSION['find']=$find;
            $inicio=intval($_POST['pos']);
        elseif($_REQUEST['origen']=='paginar'):
            if(!isset($_SESSION['find'])):
                $find="";
            else:
                $find=$_SESSION['find'];
            endif;
            $inicio=intval($_POST['pos']);
        else:
            if(!isset($_SESSION['find'])):
                $find="";
            else:
                $find=$_SESSION['find'];
            endif;
            $inicio=$_SESSION["inicio"];
        endif;
        $view->disableLayout=true; // no usa el layout
        $view->usuario=$modelo->Listar($find,$inicio);
        $cantRows= $modelo->Contar($find);
        $paginas = $cantRows / 10;  // 10 es el nro de registros mostrados por página
        $resto = $cantRows%10;
        if($resto <> 0)
        {
            $paginas = (int)$paginas + 1;
        }
        $inicio2 = 0;
        $view->contentTemplate="../../views/templates/usuarios_grid.tpl"; // seteo el template que se va a mostrar
        break;
    case 'saveUsuario':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $id=intval($_POST['id']);
        $nombre=cleanString($_POST['nombre']);
        $email=cleanString($_POST['email']);
        $clave=cleanString($_POST['clave']);
        $nivel=cleanString($_POST['nivel']);
        $usuario=new UsuarioMDL();
        $usuario->setId($id);
        $usuario->setNombre($nombre);
        $usuario->setEmail($email);
        $usuario->setClave(md5($clave));
        $usuario->setNivel($nivel);
        $usuario->Guardar();
        break;
    case 'nuevo':
        $view->usuario=new UsuarioMDL;
        $view->label='Nuevo usuario';
        $view->disableLayout=true;
        $view->contentTemplate="../../views/templates/usuarios_form.tpl"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['id']);
        $view->label='Editar Usuario';
        $view->usuario=new UsuarioMDL($editId);
        $view->disableLayout=true;
        $view->contentTemplate="../../views/templates/usuarios_form.tpl"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $id=intval($_POST['id']);
        $modelo->Borrar($id);
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}
include_once ($view->contentTemplate);
?>