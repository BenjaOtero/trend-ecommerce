<?php
require_once("../core/db_abstract_mdl.php");

class ItemMDL extends DbAbstractMDL{

    var $id;
	var $descripcion;

	function getId()
	 { return $this->id;}
	function getDescripcion()
	 { return $this->descripcion;}

    function setId($val)
	 { $this->id=$val;}
	function setDescripcion($val)
	 { $this->descripcion=$val;}


    function ItemMDL() // declara el constructor, si trae el numero de categoria lo busca
	{
	}

    public function Listar($id_local){
        $conex= $this->conectar();
        $sql="call Web_Items_Listar($id_local);";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->fetchAll($registros);
        return $rows;
	}

}
?>