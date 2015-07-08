<?php
  function conectar() {
      $server="localhost";
      $user="root";
      $pass="";
      $cone=mysql_connect($server,$user,$pass) or die("Error en la conexion al servidor");
      mysql_select_db("ncsoftwa_re",$cone) or die("Error en la conexion con la base de datos");
      return $cone;
  }
?>
