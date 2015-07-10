﻿<?php
 class Utilitarios {

  public static function cleanString($string){
    $string=trim($string);
    $string=mysql_escape_string($string);
	$string=htmlspecialchars($string);
    return $string;
  }

  function TratarImagen($path,$pathTemp,$imagen,$ImagenTemp,$anchoBase,$anchoZ){
    $archivo=$path.$imagen;
    if(file_exists($archivo))
    {
        $mensaje="<script type='text/javascript'> alert('El archivo de imagen ya existe. (Cambie el nombre del archivo) No se creó el registro.')</script>";
        echo $mensaje;
        return false;
    }
	copy($ImagenTemp,$pathTemp.$imagen);
    list($width, $height, $type, $attr) = getimagesize($pathTemp.$imagen);
    $anchos[0]=$anchoBase;
    $anchos[1]=$anchoZ;
    $x=1;
    foreach ($anchos as $ancho):
        if($x==1):
            $porcentaje = $anchoBase/$width;
            $img_original=$pathTemp.$imagen;
            $img_nueva=$path.$imagen;
            $img_nueva_anchura=$anchoBase;
            $img_nueva_altura=$porcentaje*$height;
        else:
            $porcentaje = $anchoZ/$width;
            $img_original=$pathTemp.$imagen;
            $img_nueva=$path."z_".$imagen;
            $img_nueva_anchura=$anchoZ;
            $img_nueva_altura=$porcentaje*$height;
        endif;
        $img_nueva_calidad="85";
        $extension = explode(".", $imagen);
        if($extension[1]=='jpg')
          {
            $img=imagecreatefromjpeg($img_original);
          }
        elseif($extension[1]=='JPG')
          {
            $img=imagecreatefromjpeg($img_original);
          }
        elseif($extension[1]=='JPEG')
          {
            $img=imagecreatefromjpeg($img_original);
          }
        elseif($extension[1]=='jpeg')
          {
            $img=imagecreatefromjpeg($img_original);
          }
        elseif($extension[1]=='png')
          {
            $img=imagecreatefrompng($img_original);
          }
        elseif($extension[1]=='PNG')
          {
            $img=imagecreatefrompng($img_original);
          }
        elseif($extension[1]=='gif')
          {
            $img=imagecreatefromgif($img_original);
          }
        elseif($extension[1]=='GIF')
          {
            $img=imagecreatefromgif($img_original);
          }
        $thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
        $sizes=getimagesize($img_original);
        $alto=$sizes[0];
        $ancho=$sizes[1];
        imagecopyresized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,imagesx($img),imagesy($img ));
        imagejpeg($thumb,$img_nueva,$img_nueva_calidad);
        imagedestroy ($img);
        $x++;
    endforeach;
    unlink($img_original);
    return true;
  }

  public static function getRealIP() {
      if (!empty($_SERVER['HTTP_CLIENT_IP']))
          return $_SERVER['HTTP_CLIENT_IP'];

      if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
          return $_SERVER['HTTP_X_FORWARDED_FOR'];

      return $_SERVER['REMOTE_ADDR'];
  }

  public static function insertFormatoFecha($fecha) {
      list($dia,$mes,$anio)=explode("/",$fecha);
      return $anio."-".$mes."-".$dia;
  }
  public static function insertFechaDesde($fecha) {
      list($dia,$mes,$anio)=explode("/",$fecha);
      return $anio."-".$mes."-".$dia;
  }
  public static function insertFechaHasta($fecha) {
      list($dia,$mes,$anio)=explode("/",$fecha);
      $hora=" 23:59:59";
      return $anio."-".$mes."-".$dia." ".$hora;
  }
  public static function devolverFormatoFecha($fecha) {
      list($anio,$mes,$dia)=explode("-",$fecha);
      return $dia."/".$mes."/".$anio;
  }
  public static function devolverFechaHora($valor) {
      $fecha=substr ($valor, 0, 10);
      $hora=substr ($valor, -8);
      list($anio,$mes,$dia)=explode("-",$fecha);
      return $dia."/".$mes."/".$anio." ".$hora;
  }
}
?>