<?php
    $filas = count($view_articulos->articulos);
    $divs = $filas/4;
    if($divs<1)
    {
        $divs = 1;
    }
    else
    {
        $resto = $divs%2;
        if($resto <> 0)
        {
        $divs = (int)$divs + 1;
        }
    }
    $i=0;
    $filaActual = 0;
    $registro = current($view_articulos->articulos);
    echo "<p id='titulo'>".$titulo."</p>";
    for($i=1;$i<=$divs;$i++)
    {
        echo "<div class='rows'>";
        for($j=1;$j<=4;$j++)
        {
            if($filaActual==$filas) break;
            $descripcion=ucfirst(strtolower($registro['DescripcionWebART']));
            $precio=ucfirst(strtolower($registro['PrecioPublicoART']));
            $local=$registro['IdLocalSTK'];
            $imagen=$registro['ImagenART'];
            if($j==1)
            {
            echo "<div class='calle-1'>
                    <img class='articulo' data-art='".$imagen."' data-loc='".$local."'
                            src='images/".$imagen."_small.jpg' alt='' />
                    <p class='descripcion'>".$descripcion."</p>
                    <p class='precio'>Precio: $".$precio."</p>
                </div>";
            }
            else
            {
            echo "<div class='calle-x'>
                    <img class='articulo' data-art='".$imagen."' data-loc='".$local."'
                            src='images/".$imagen."_small.jpg' alt='' />
                    <p class='descripcion'>".$descripcion."</p>
                    <p class='precio'>Precio: $".$precio."</p>
                </div>";
            }
            $registro = next($view_articulos->articulos);
            $filaActual++;
        }
        echo "</div>";
    }
