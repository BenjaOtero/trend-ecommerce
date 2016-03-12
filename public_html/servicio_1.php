<?php
require_once("nusoap/lib/nusoap.php");
$namespace = "http://localhost/Ecommerce/trunk/public_html/nusoap/lib";
//$namespace = "http://karminna.com/nusoap/lib";
// create a new soap server
$server = new soap_server();
// configure our WSDL
$server->configureWSDL("SimpleService");
// set our namespace
$server->wsdl->schemaTargetNamespace = $namespace;
// register our WebMethod
$server->register(
                // method name:
                'ProcessSimpleType', 		 
                // parameter list:
                array('name'=>'xsd:string'), 
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'A simple Hello World web method');
                
// Get our posted data if the service is being consumed
// otherwise leave this data blank.                
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) 
                ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service                    
$server->service($POST_DATA);                
exit();

function ProcessSimpleType($imagen) {
        $articulo = explode("_", $imagen);
        if(file_exists("images/".$imagen))
        {            
            $img_original=imagecreatefromjpeg("images/".$imagen);
            //Ancho y alto de la imagen original
            list($ancho,$alto)=getimagesize("images/".$imagen);
                       
            /*-------------------- 40 x 53 -------------------*/
            $max_ancho = 40;
            $max_alto = 53;
            //Se calcula ancho y alto de la imagen final
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto; 
            //Si el ancho y el alto de la imagen no superan los maximos,
            //ancho final y alto final son los que tiene actualmente
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
                    $ancho_final = $ancho;
                    $alto_final = $alto;
            }
            /*
             * si proporcion horizontal*alto mayor que el alto maximo,
             * alto final es alto por la proporcion horizontal
             * es decir, le quitamos al alto, la misma proporcion que
             * le quitamos al alto
             *
            */
            elseif (($x_ratio * $alto) < $max_alto){
                    $alto_final = ceil($x_ratio * $alto);
                    $ancho_final = $max_ancho;
            }
            /*
             * Igual que antes pero a la inversa
            */
            else{
                    $ancho_final = ceil($y_ratio * $ancho);
                    $alto_final = $max_alto;
            } 
            //Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
            $tmp=imagecreatetruecolor($ancho_final,$alto_final);

            //Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
            imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);

            //Definimos la calidad de la imagen final
            $calidad=85;            
            $nombre = $articulo[0]."_xsmall.jpg";
            //Se crea la imagen final en el directorio indicado
            imagejpeg($tmp,"images/".$nombre,$calidad);  
            
            /*-------------------- 185 x 250 -------------------*/
            $max_ancho = 185;
            $max_alto = 250;
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto; 
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
                    $ancho_final = $ancho;
                    $alto_final = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto){
                    $alto_final = ceil($x_ratio * $alto);
                    $ancho_final = $max_ancho;
            }
            else{
                    $ancho_final = ceil($y_ratio * $ancho);
                    $alto_final = $max_alto;
            } 
            $tmp=imagecreatetruecolor($ancho_final,$alto_final);
            imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            $calidad=85;
            $nombre = $articulo[0]."_small.jpg";
            imagejpeg($tmp,"images/".$nombre,$calidad);     
                        
            /*-------------------- 270 x 370 -------------------*/
            $max_ancho = 270;
            $max_alto = 370;
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto; 
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
                    $ancho_final = $ancho;
                    $alto_final = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto){
                    $alto_final = ceil($x_ratio * $alto);
                    $ancho_final = $max_ancho;
            }
            else{
                    $ancho_final = ceil($y_ratio * $ancho);
                    $alto_final = $max_alto;
            } 
            $tmp=imagecreatetruecolor($ancho_final,$alto_final);
            imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            $calidad=85;
            $nombre = $articulo[0]."_medium.jpg";
            imagejpeg($tmp,"images/".$nombre,$calidad);               
        }
        if(file_exists("images/".$articulo."_bck_large.jpg"))
        {
            $img_original=imagecreatefromjpeg("images/".$articulo."_bck_large.jpg");
            //Ancho y alto de la imagen original
            list($ancho,$alto)=getimagesize($img_original);            
            
            /*-------------------- 40 x 53 -------------------*/
            $max_ancho = 40;
            $max_alto = 53;
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto; 
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
                    $ancho_final = $ancho;
                    $alto_final = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto){
                    $alto_final = ceil($x_ratio * $alto);
                    $ancho_final = $max_ancho;
            }
            else{
                    $ancho_final = ceil($y_ratio * $ancho);
                    $alto_final = $max_alto;
            } 
            $tmp=imagecreatetruecolor($ancho_final,$alto_final);
            imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            $calidad=85;
            $nombre = $articulo[0]."_bck_xsmall.jpg";
            imagejpeg($tmp,"images/".$nombre,$calidad);                  
        }            
        return $imagen;

}