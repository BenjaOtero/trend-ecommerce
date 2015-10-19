<?php
require_once("../core/db_abstract_mdl.php");

class GeneroMDL extends DbAbstractMDL{

    var $id;
    var $descripcion;

    function getId(){ 
        return $this->id;            
    }

    function getDescripcion(){ 
        return $this->descripcion;            
    }

    function setId($val){ 
        $this->id=$val;        
    }
    
    function setDescripcion($val){ 
        $this->descripcion=$val;            
    }

    function GeneroMDL(){ // declara el constructor, si trae el numero de categoria lo busca
    }

    public function Listar(){
        $conex= $this->conectar();
        $sql="call Web_Generos_Listar();";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->fetchAll($registros);
        return $rows;
    }

}
?>