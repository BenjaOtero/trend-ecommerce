<?php
abstract class DbAbstractMDL  // se declara una clase para hacer la conexion con la base de datos
{
    static function conectar() {
        /*$server="dns26.cyberneticos.com";
        $user="ncsoftwa_re";
        $pass="8953#AFjn";
        $cone=mysql_connect($server,$user,$pass) or die("Error en la conexion al servidor");
        mysql_select_db("ncsoftwa_re",$cone) or die("Error en la conexion con la base de datos");*/

        $server="localhost";
        $user="root";
        $pass="";
        $cone=mysql_connect($server,$user,$pass) or die("Error en la conexion al servidor");
        mysql_select_db("ncsoftwa_re",$cone) or die("Error en la conexion con la base de datos");
        return $cone;
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

?>