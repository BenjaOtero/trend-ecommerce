<?php
abstract class DbAbstractMDL {
    
    function crearConexion(){
        //$servidor   = 'ns21a.cyberneticos.com';
        $servidor   = 'localhost';
        $nombreBD   = 'ncsoftwa_re';
        $usuario    = 'ncsoftwa_re';
        $contrasena = '8953#AFjn';
        $conexion = new mysqli($servidor,$usuario,$contrasena,$nombreBD);
        $conexion->set_charset("utf8");
        if($conexion->connect_error){
            die('Error en la conexion : '.$conexion->connect_errno.' - '.$conexion->connect_error);
        }
        return $conexion;
    }        

}