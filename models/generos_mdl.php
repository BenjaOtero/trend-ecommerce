<?php
require_once("../core/db_abstract_mdl.php");

class GeneroMDL extends DbAbstractMDL{
    
    public function Listar(){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Generos_Listar();");
        while($row = $result->fetch_assoc()){
            $rows[]=$row;
        }                
        return $rows;
    }    

}