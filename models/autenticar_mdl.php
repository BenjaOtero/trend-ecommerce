<?php
require_once("../../core/db_abstract_mdl.php");

class AutenticarMDL extends DbAbstractMDL{

    public function LoginAttemps($ip){
        $conex= $this->conectar();
        $sql="call Loginattemps_GetByIp('$ip');";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->filas($registros);
        return $rows;
	}

    public function Login($usuario,$clave){
        $conex= $this->conectar();
        $sql="call Login_Usuarios('$usuario','$clave');";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        $rows=$this->NroFilas($registros);
        return $rows;
	}

    public function LoginAttempsInsert($ip,$attemps,$tiempo){
        $conex= $this->conectar();
        $sql="call Loginattemps_Insert('$ip','$attemps','$tiempo');";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        return $registros;
	}

     public function LoginAttempsUpdate($ip,$attemps,$tiempo){
        $conex= $this->conectar();
        $sql="call Loginattemps_Update('$ip','$attemps','$tiempo');";
        $registros=$this->consulta($sql,$conex);
        $this->desconectar($conex);
        return $registros;
	}

     public function LoginAttempsBorrar($ip){
        $conex= $this->conectar();
        $sql="call Loginattemps_Borrar('$ip');";
        $this->consulta($sql,$conex);
        $this->desconectar($conex);
	}

}
?>