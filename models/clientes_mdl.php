<?php
require_once("../core/db_abstract_mdl.php");

class ClienteMDL extends DbAbstractMDL{
    
    public function GetCliente($correo){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Clientes_GetByCorreo('$correo');");  
        $filas = mysqli_num_rows($result);
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
    
    public function InsertCliente($id,$nombre,$apellido,$correo){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Clientes_Insertar('$id','$nombre','$apellido','$correo');");   
    }    
    
    public function UnsuscribeNews($correo){
        $mysqli = $this->crearConexion();
        $result = mysqli_query($mysqli,"CALL Web_Clientes_UnsuscribeNews('$correo');");   
    }    

}