<?php
require_once("../core/db_abstract_mdl.php");

class ItemMDL extends DbAbstractMDL{
    
    public function Listar($idGenero){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Items_Listar($idGenero);");
        while($row = $result->fetch_assoc()){
            $rows[]=$row;
        }                
        return $rows;
    }     
    
}