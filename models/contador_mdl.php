<?php
require_once("../core/db_abstract_mdl.php");

class ContadorMDL extends DbAbstractMDL{
    
    public function Listar($ip){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Contador_Listar('$ip');");
        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc()){
                $rows[]=$row;
            }    
        } 
        else 
        {
            $rows = NULL;
        }
        return $rows;
    }    

    public function Insertar($ip){
        $mysqli = $this->crearConexion();
        mysqli_query($mysqli,"CALL Web_Contador_Insertar('$ip');");
    }  
    
}