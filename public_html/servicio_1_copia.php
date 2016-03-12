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
        if(file_exists("images/".$imagen))
        {
            $img_original=imagecreatefromjpeg("images/".$imagen);
            //Se define el maximo ancho o alto que tendra la imagen final
            $max_ancho = 600;
            $max_alto = 800;
            //Ancho y alto de la imagen original
            list($ancho,$alto)=getimagesize("images/".$imagen);
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

            //Se crea la imagen final en el directorio indicado
            imagejpeg($tmp,"images/_z_".$imagen,$calidad);            
        }
        return $imagen;

}