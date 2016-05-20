<?php
require_once("../core/db_abstract_mdl.php");

class CuponMDL extends DbAbstractMDL{
    
    public function ListarConfig(){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Cupon_Config_Listar();");
        while($row = $result->fetch_assoc()){
            $rows[]=$row;
        }                
        return $rows;
    } 
    
    public function InsertCupon($id,$correo,$vencimiento){
        $mysqli = $this->crearConexion();
        mysqli_query($mysqli,"CALL Web_Cupon_Insertar('$id','$correo','$vencimiento');");   
    }       

}