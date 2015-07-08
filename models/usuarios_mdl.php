<?php
require_once("../../core/db_abstract_mdl.php");

class UsuarioMDL extends DbAbstractMDL{

    var $id;
	var $nombre;
	var $email;
	var $clave;
	var $nivel;

	function getId()
	 { return $this->id;}
	function getNombre()
	 { return $this->nombre;}
	function getEmail()
	 { return $this->email;}
	function getClave()
	 { return $this->clave;}
	function getNivel()
	 { return $this->nivel;}

    function setId($val)
	 { $this->id=$val;}
	function setNombre($val)
	 { $this->nombre=$val;}
	function setEmail($val)
	 { $this->email=$val;}
	function setClave($val)
	 { $this->clave=$val;}
	function setNivel($val)
	 { $this->nivel=$val;}


    function UsuarioMDL($nro=0) // declara el constructor, si trae el numero de categoria lo busca
	{
  		if ($nro!=0)
  		{
  			$conex= $this->conectar();
            $sql="call Usuario_GetById($nro);";
            $registros=$this->consulta($sql,$conex);
  			$row=mysql_fetch_array($registros);
  			$this->id=$row['id'];
  			$this->nombre=$row['nombre'];
  			$this->email=$row['email'];
  			$this->clave=$row['clave'];
  			$this->nivel=$row['nivel'];
  		}
	}

    public function Listar($nombre,$inicio){
        $conex= $this->conectar();
        $sql="call Usuario_Listar('$nombre','$inicio');";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->fetchAll($registros);
        return $rows;
	}

    public function Contar($find) {
        $conex= $this->conectar();
        $sql="call Usuario_Contar('$find');";
        $registros=$this->consulta($sql,$conex);
        $rows = mysql_num_rows($registros);
        $this->desconectar($conex);
        return $rows;
	}

    function Guardar(){
        if($this->id)
        {
          $this->Actualizar();
        }
        else
        {
          $this->Insertar();
        }
    }

	private function Actualizar(){
    	$conex= $this->conectar();
        $id = $this->id;
        $nombre=$this->nombre;
        $email=$this->email;
        $clave=$this->clave;
        $nivel=$this->nivel;
        $sql="call Usuario_Actualizar($id, '$nombre', '$email', '$clave', '$nivel');";
        $this->consulta($sql,$conex);
        $this->desconectar($conex);
	}

	private function Insertar(){
    	$conex= $this->conectar();
        $nombre=$this->nombre;
        $email=$this->email;
        $clave=$this->clave;
        $nivel=$this->nivel;
        $sql="call Usuario_Insertar('$nombre', '$email', '$clave', '$nivel');";
        $this->consulta($sql,$conex);
        $this->desconectar($conex);
	}

	function Borrar($id)
	{
        $conex= $this->conectar();
        $sql="call Usuario_Borrar($id);";
        $this->consulta($sql,$conex);
	}

}
function cleanString($string)
{
    $string=trim($string);
    $string=mysql_escape_string($string);
	$string=htmlspecialchars($string);
    return $string;
}
?>