<?php
session_start();
include_once("autenticar_mdl.php");
include_once("../../../core/utilitarios.php");
$usuario=$_POST['txtUsuario'];
$pass=md5($_POST['pssContraseña']);
$modelo = new AutenticarMDL();
$ip=Utilitarios::getRealIP();
$rows=$modelo->LoginAttemps($ip);
$intentos=$rows['attemps'];
if($intentos==null):
    $logueado=$modelo->Login($usuario,$pass);
    if($logueado>0):
        $_SESSION['usuario']=$usuario;
    else:
        $attemps=1;
        $tiempo=0;
        $modelo->LoginAttempsInsert($ip,$attemps,$tiempo);
        if(isset($_SESSION['usuario'])):
            unset($_SESSION['usuario']);
        endif;
    endif;
elseif($intentos<5):
    $logueado=$modelo->Login($usuario,$pass);
    if($logueado>0):
        $_SESSION['usuario']=$usuario;
        $modelo->LoginAttempsBorrar($ip);
    else:
        $intentos++;
        date_default_timezone_set("America/Argentina/Cordoba");
        $tiempo = date('H:i:s',time()+300);
        $modelo->LoginAttempsUpdate($ip,$intentos,$tiempo);
        if(isset($_SESSION['usuario'])):
            unset($_SESSION['usuario']);
        endif;
    endif;
else:
    $tiempoAttemps=$rows['tiempo']; // si el tiempo en tabla loginattems es mayor al tiempo actual debe esperar la diferencia entre tiempos
    date_default_timezone_set("America/Argentina/Cordoba");
    $tiempo = date('H:i:s',time());
    $tiempoRestante= date("H:i:s", strtotime("00:00:00") + strtotime($tiempoAttemps) - strtotime($tiempo) );
    if($tiempoRestante<"00:05:00"):
        $_SESSION['intentos']=5;
    else:
        if(isset($_SESSION['intentos'])):
            unset($_SESSION['intentos']);
        endif;
        $logueado=$modelo->Login($usuario,$pass);
        if($logueado>0):
            $_SESSION['usuario']=$usuario;
            $modelo->LoginAttempsBorrar($ip);
        else:
            $intentos=1;
            date_default_timezone_set("America/Argentina/Cordoba");
            $tiempo = date('H:i:s',time()+300);
            $modelo->LoginAttempsUpdate($ip,$intentos,$tiempo);
            if(isset($_SESSION['usuario'])):
                unset($_SESSION['usuario']);
            endif;
        endif;
    endif;
endif;
header("location:http://localhost:82/01_PHP/Autoadministrable/public_html/secure/");
?>
