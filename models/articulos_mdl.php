<?php
require_once("../core/db_abstract_mdl.php");

class ArticuloMDL extends DbAbstractMDL{

    public function LoNuevo(){
        $conex= $this->conectar();
        $sql="call Web_Lo_Nuevo();";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->fetchAll($registros);
        return $rows;
    }

    public function ItemsArticulos($idItem, $idGenero){
        $conex= $this->conectar();
        $sql="call Web_Items_y_Articulos($idItem, $idGenero);";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->fetchAll($registros);
        return $rows;
    }
    
    public function ArticulosByItem($idItem, $idGenero){
        $conex= $this->conectar();
        $sql="call Web_Articulos_by_Item($idItem, $idGenero);";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->fetchAll($registros);
        return $rows;
    }    
    
    public function Articulo($id_articulo, &$ImagenART, &$ImagenBackART, &$talleART){
        $mysqli = $this->crearConexion();
        $mysqli->multi_query("call Web_Articulo($id_articulo);");
        $result = $mysqli->store_result();
        while ($row = $result->fetch_row()) {
            $dataset1[]=$row;
        }
        $mysqli->next_result();
        $result2 = $mysqli->store_result();
        while ($row = $result2->fetch_row()) {
            $ImagenART[]=$row;
        }  
        $mysqli->next_result();
        $result3 = $mysqli->store_result();
        while ($row = $result3->fetch_row()) {
            $ImagenBackART[]=$row;
        } 
        $mysqli->next_result();
        $result4 = $mysqli->store_result();
        while ($row = $result4->fetch_row()) {
            $talleART[]=$row;
        }         
        return $dataset1;
    }   
    
    public function ArticuloMaximizar($id_articulo, &$ImagenART, &$ImagenBackART, &$DescripcionWebART){
        $mysqli = $this->crearConexion();
        $mysqli->multi_query("call Web_Articulo_Maximizar($id_articulo);");
        $result1 = $mysqli->store_result();
        while ($row = $result1->fetch_row()) {
            $ImagenART[]=$row;
        }  
        $mysqli->next_result();
        $result2 = $mysqli->store_result();
        while ($row = $result2->fetch_row()) {
            $ImagenBackART[]=$row;
        } 
        $mysqli->next_result();
        $result3 = $mysqli->store_result();
        while ($row = $result3->fetch_row()) {
            $DescripcionWebART=$row;
        } 
    }      
}
