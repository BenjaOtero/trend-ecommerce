<?php
abstract class DbAbstractMDL {
    
    function crearConexion(){
        //Datos para la conexión con el servidor
      // $servidor   = 'dns26.cyberneticos.com';
         $servidor   = 'localhost';
        $nombreBD   = 'ncsoftwa_re';
     //   $nombreBD   = 'ncsoftwa_pruebas';
      // $usuario    = 'root';
       $usuario    = 'ncsoftwa_re';
      //  $contrasena = '';
        $contrasena = '8953#AFjn';
        //Creando la conexión, nuevo objeto mysqli
        $conexion = new mysqli($servidor,$usuario,$contrasena,$nombreBD);
        $conexion->set_charset("utf8");
        //Si sucede algún error la función muere e imprimir el error
        if($conexion->connect_error){
            die('Error en la conexion : '.$conexion->connect_errno.' - '.$conexion->connect_error);
        }
        return $conexion;
    }        

}