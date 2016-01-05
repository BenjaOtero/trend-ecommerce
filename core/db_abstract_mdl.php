<?php
abstract class DbAbstractMDL  // se declara una clase para hacer la conexion con la base de datos
{
    static function conectar() {
     /*   $server="localhost";
   //   $server='dns26.cyberneticos.com';
        $user="ncsoftwa_re";
        $pass="8953#AFjn";
        $cone=mysql_connect($server,$user,$pass) or die("Error en la conexion al servidorrrrrrrrrr");
        mysql_query("SET NAMES 'utf8'");
        mysql_select_db("ncsoftwa_re",$cone) or die("Error en la conexion con la base de datos");*/
        $server="localhost";
        $user="root";
        $pass="";
        $cone=mysql_connect($server,$user,$pass) or die("Error en la conexion al servidor");
        mysql_select_db("ncsoftwa_re",$cone) or die("Error en la conexion con la base de datos");
        return $cone;
    }

    function crearConexion(){
        //Datos para la conexión con el servidor
      // $servidor   = 'dns26.cyberneticos.com';
         $servidor   = 'localhost';
        $nombreBD   = 'ncsoftwa_re';
     //   $nombreBD   = 'ncsoftwa_pruebas';
       $usuario    = 'root';
    //   $usuario    = 'ncsoftwa_re';
        $contrasena = '';
     //   $contrasena = '8953#AFjn';
        //Creando la conexión, nuevo objeto mysqli
        $conexion = new mysqli($servidor,$usuario,$contrasena,$nombreBD);
        $conexion->set_charset("utf8");
        //Si sucede algún error la función muere e imprimir el error
        if($conexion->connect_error){
            die('Error en la conexion : '.$conexion->connect_errno.' - '.$conexion->connect_error);
        }
        return $conexion;
    }    
    
    protected function consulta($sql,$conex){
        $registros=@mysql_query($sql, $conex) or die('Error en el query: '.mysql_errno($conex).' - '.mysql_error($conex));
        return $registros;
    }

    protected function filas($registros){
        $rows=mysql_fetch_array($registros);
        return $rows;
    }

    protected function NroFilas($registros){
        $rows=mysql_num_rows($registros);
        return $rows;
    }

    function fetchAll($registros)
    {
        $rows=array();
    	while($row=mysql_fetch_array($registros))
    	{
    		$rows[]=$row;
    	}
        return $rows;
    }
       
    protected function desconectar($cn){
        mysql_close($cn);
    }

}
