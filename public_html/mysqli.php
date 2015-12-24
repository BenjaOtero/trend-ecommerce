<?php

    $mysqli = new mysqli("dns26.cyberneticos.com","ncsoftwa_re","8953#AFjn","ncsoftwa_re");
  //  $mysqli->multi_query("call Web_Articulo_prueba()");
    $mysqli->multi_query("call Web_Articulo('035277')");
    $result = $mysqli->store_result();
    while ($row = $result->fetch_row()) {
        $dataset1[]=$row;
    }
    $registro = current($dataset1);
    echo $registro[0];
    

