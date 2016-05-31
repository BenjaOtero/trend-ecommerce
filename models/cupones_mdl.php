<?php
require_once("../core/db_abstract_mdl.php");

class CuponMDL extends DbAbstractMDL{
    
    public function ListarConfig(){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Cupon_Config_Listar();");
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
    
    public function BuscarCupon($correo,$vencimiento){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Cupon_Buscar('$correo','$vencimiento');");
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
    
    public function InsertCupon($id,$correo,$porcentaje,$vencimiento){
        $mysqli = $this->crearConexion();
        mysqli_query($mysqli,"CALL Web_Cupon_Insertar('$id','$correo','$porcentaje','$vencimiento');");   
    }       

}