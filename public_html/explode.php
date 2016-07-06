<?php
$cadena = "2050;2051;2052;";
$articulos = explode(";",$cadena);
foreach ($articulos as $valor) {
    if($valor !="")
        {echo "no esta vacio<br>";}
    else if($valor ==="")
        {echo "esta vacio";}
}


