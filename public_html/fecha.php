<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Hello!</title>
</head>

<body>

<?php
        date_default_timezone_set("America/Argentina/Cordoba");
        //obtenemos fecha actual
        $fecha_actual = date('Y-m-d');
        $fecha_limite = "2013-04-30";
        $caracter="Expositor";

        if($fecha_limite >= $fecha_actual):
            $item_ammount_1 = "240000";
        else:
            $item_ammount_1 = "300000";
        endif;

        if($caracter=="Estudiante"):
            $item_ammount_1=$item_ammount_1 / 2;
        endif;

        echo($item_ammount_1);
?>
</body>

</html>
