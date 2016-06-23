<?php
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

    public function devolverFormatoFecha($fecha) {
        list($anio,$mes,$dia)=explode("-",$fecha);
        return $dia."/".$mes."/".$anio;
    }

    public static function devolverFechaHora($valor) {
        $fecha=substr ($valor, 0, 10);
        $hora=substr ($valor, -8);
        list($anio,$mes,$dia)=explode("-",$fecha);
        return $dia."/".$mes."/".$anio." ".$hora;
    }
    
    public static function contador($ip)
    {
        include_once ("../models/contador_mdl.php");
        $modelo_contador = new ContadorMDL();
        $registro = $modelo_contador->Listar($ip);
        if($registro != NULL)
        {
           $diferencia = $registro[0]['diferencia'];
           $tiempoTrascurrido=(int)substr($diferencia,0,2); 
            if($tiempoTrascurrido>0)
            {
                $modelo_contador->Insertar($ip); 
            }
        }
        else
        {
            $modelo_contador->Insertar($ip);  
        }
    }
    
    public static function CuponConfig()            
    {
        $fecha = date("Y-m-d");
        include_once ("../models/cupones_mdl.php");
        $modelo_cupon = new CuponMDL();
        $registro = $modelo_cupon->ListarConfig();
        if($registro === NULL)
        {
            return false;
        }
        else
        {
           if($registro[0]['FechaVencimiento']>= date("Y-m-d"))
           {
               return $registro;
           }
           else
           {
               return false;
           }
        }   
    }
    
    public function AgregarCupon($nombre, $apellido, $correo,$vencimiento,$porcentaje)
    {
        include_once ("../models/clientes_mdl.php");
        include_once ("../models/cupones_mdl.php");
        $modelo_cliente = new ClienteMDL();        
        $modelo_cupon = new CuponMDL();  
        $cliente = $modelo_cliente->GetCliente($correo);
        if($cliente === NULL)
        {
            $id = rand(1, 2000000000);
            $modelo_cliente->InsertCliente($id,$nombre, $apellido, $correo);
            $modelo_cupon->InsertCupon($id, $correo,$porcentaje,$vencimiento);
            // enviar mail
            $array = [
                "AgregarCupon" => TRUE,
                "CuponNuevo" => $id,
                "CuponExistente" => NULL,
            ];            
        }
        else
        {
            $cupon = $modelo_cupon->BuscarCupon($correo, $vencimiento);
            if($cupon === NULL)
            {
                $id = rand(1, 2000000000);
                $modelo_cupon->InsertCupon($id, $correo,$porcentaje,$vencimiento);
                // enviar mail
                $array = [
                    "AgregarCupon" => TRUE,
                    "CuponNuevo" => $id,
                    "CuponExistente" => NULL,
                ];                  
            }
            else
            {
                $array = [
                    "AgregarCupon" => FALSE,
                    "CuponNuevo" => NULL,
                    "CuponExistente" => $cupon[0]['Nro_cupon'],
                ];  
                $id = $cupon[0]['Nro_cupon'];
            }
        }            
        $fechaVenc = $this->devolverFormatoFecha($vencimiento);
        $html = "<div align='center' style='border: margin: 10px; padding: 10px;'>";        
        $html .= "<img src=http://karminna.com/app_images/cupones_logo.jpg>";
        $html .= "<br><br><br>";
        $html .= "<p style='font-size:20px; margin:0;'>Nro cupón: ".$id."</p>";
        $html .= "<p>Válido hasta el ".$fechaVenc."</p>";
        $html .= "<p style='font-size:15px; margin-top:10px;color:red;'>";
        $html .= "Acercate a nuestros locales, pasale el número de cupón a la vendedora y obtené un 20% de descuento.";
        $html .= "</p>";
        $html .= "</div>";     
        $this->EnviarMail($correo, $html);             
        return $array;
    }   
    
    function EnviarMail($destinatario, $html)
    {
        require("../PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();        
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );          
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth = true;
        $mail->Host = "mail.karminna.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
        $mail->Username = "info@karminna.com"; // Correo completo a utilizar
        $mail->Password = "8953#AFjn"; // Contraseña
        $mail->Port = 587; // Puerto a utilizar
        $mail->From = "info@karminna.com"; // Desde donde enviamos (Para mostrar)
        $mail->FromName = "Karminna";
        $mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos
       // $mail->AddCC("cuenta@dominio.com"); // Copia
      //  $mail->AddBCC("cuenta@dominio.com"); // Copia oculta
        $mail->IsHTML(true); // El correo se envía como HTML
        $mail->Subject = "Cupon de descuento"; // Este es el titulo del email.
        $mail->Body = $html; // Mensaje a enviar
    //    $mail->AddAttachment("imagenes/imagen.jpg", "imagen.jpg");
        $exito = $mail->Send(); // Envía el correo.
        if($exito){
            $mensaje = "Exito";
        }else{
            $mensaje = "Fracasado";
        }  
        echo $mensaje;
    }    
    
    public static function LoginFacebook() {        
        $fb = new Facebook\Facebook([
          'app_id' => '1068588159868715',
          'app_secret' => 'd3790d1f47df4805b47976f16199fd89',
          'default_gra]ph_version' => 'v2.6',
          ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // optional

        if (isset($_SESSION['facebook_access_token'])) {
                $accessToken = $_SESSION['facebook_access_token'];
        } else {
                $accessToken = $helper->getAccessToken();
        }
        if (isset($_SESSION['facebook_access_token'])) {
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);            
        } else {
                // getting short-lived access token
                $_SESSION['facebook_access_token'] = (string) $accessToken;
                // OAuth 2.0 client handler
                $oAuth2Client = $fb->getOAuth2Client();
                // Exchanges a short-lived access token for a long-lived one
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
                // setting default access token to be used in script
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        }        
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $profile = $profile_request->getGraphNode()->asArray();
        return $profile;
    }  
}
?>