<?php 
include_once ("../controllers/componentes/array_column.php");
$imagen=substr($id_articulo,0,7);
$registro = current($view_articulos->articulos);
$idLocal = $registro[10];
echo   "<div id='foto'>
            <div class='clearfix'>
                <a href='images/".$imagen."_large.jpg' class='jqzoom' rel='gal1'  title='KARMINNA' >
                    <img src='images/".$imagen."_medium.jpg'  title='KARMINNA' >
                </a>
            </div>        
            <br/>
            <div class='clearfix' >
                <div>
                    <ul id='lupita'>
                        <li>Zoom sobre imagen</li>
                        <li id='ampliar' data-imagen='".$imagen."' data-loc='".$idLocal."'>Click para ampliar</li>
                    </ul>
                </div>
                <ul id='thumblist' class='clearfix'  style='text-align: center;'>";
                    foreach($ImagenART as $imagen)
                    {
                        echo "<li class='minis'>
                                <a href='javascript:void(0);' rel=\"{gallery: 'gal1',
                                        smallimage: 'images/".$imagen[0]."_medium.jpg',
                                        largeimage: 'images/".$imagen[0]."_large.jpg'}\">
                                    <img src='images/".$imagen[0]."_xsmall.jpg'>
                                </a>
                            </li>";
                    }
                    if($registro[3]!=null || $registro[3]!='')  /* el índice 3 es el campo 'ImagenBackART' */
                    {
                    echo "<li class='minis'><a href='javascript:void(0);' rel=\"{gallery: 'gal1',
                            smallimage: 'images/".$registro[3]."_bck_medium.jpg',largeimage: 'images/".$registro[3]."_bck_large.jpg'}\">
                            <img src='images/".$registro[3]."_bck_xsmall.jpg'>
                            </a>
                        </li>";
                     
                    }                 
echo            "</ul>
            </div>
        </div>
        <div id='compra'>
            <h4>".$registro[1]."</h4> 
            <div id='color-talle'>
                <div id='colors' class='clearfix'>
                    <p>Seleccioná un color:</p>
                    <ul>";
                    reset($view_articulos->articulos); /*vuelvo al primer registro del array*/
                    if($registro[4]=='')    /* el índice 4 es el campo ImagenColorART, el 5 es HexCOL, el 6 DescripcionCOL */
                    {
                        foreach($view_articulos->articulos as $articulo)
                        {
                            echo "<li>
                                    <label>
                                    <div data-articulo='".substr($articulo[0],0,7)."' style='background-color: ".$articulo[5].";'
                                            title='".$articulo[6]."' class='color'>
                                    </div>
                                    </label>
                                </li>";
                        } 
                    }
                    else
                    {
                        foreach($view_articulos->articulos as $articulo)  /* el índice 2 es ImagenART */
                        {
                            /*para agregar y borrar clases para determinar el color activo uso el archivo jquery.jqzoom-core.js linea 185*/
                            echo "<li>
                                    <label>
                                        <span>
                                            <a  href='javascript:void(0);' rel=\"{gallery: 'gal1',
                                                    smallimage: 'images/".$articulo[2]."_medium.jpg',
                                                    largeimage: 'images/".$articulo[2]."_large.jpg'}\" 
                                                    data-articulo='".$articulo[2]."'>
                                                <img src='images/".$articulo[2]."_col.jpg'>
                                            </a>
                                        </span>
                                    </label>
                                </li>";
                        } 
                    }
echo                "</ul>
                </div>
                <div id='talles'>
                <p>Seleccioná un talle:</p>";
                $columna = array_column($talles, 1); /*obtengo unicamente la columna TalleART del array $talles*/
                $talle = array_unique($columna);    /*elimino valores duplicados*/
                sort($talle);
                if(count($talle)>0)
                { 
                    $articulos = array();
                    $columna = array_column($talles, 0); /*obtengo unicamente la columna 0(IdArticuloART) del array $talles*/
                    foreach ($columna as $key => $row)
                    {
                        $articulos[]=  substr($row, 0, 7);
                    }
                    sort($articulos);
                    $articulo = array_unique($articulos);    /*elimino valores duplicados*/
                    sort($talles);
                    $i=0;
                    foreach ($articulo as $keyArticulo => $rowArticulo)
                    {
                        if($imagen==$rowArticulo)
                        {
                            echo "<ul id='".$rowArticulo."'>";    
                        }    
                        else
                        {
                            echo "<ul class='talle-inactivos' id='".$rowArticulo."'>";   
                        }
                        foreach($talles as $keyTalle => $rowTalle) 
                        {
                            if($rowArticulo === substr($rowTalle[0], 0, 7)) 
                            {
                            echo "<li>
                                    <label>
                                    <span class='picker talle' title='' style='width: 30px;' >".$rowTalle[1]."</span>                                    
                                    </label>
                                  </li>";
                            }                             
                        }                            
                        echo "</ul>";
                        $i++;
                    }
                    
                } 
                else
                {                                                          
                    echo "<p>Artículo talle único.</p>";
                }
echo           "</div>
            </div>
            <div id='carrito'>
                <div id='detalle-compra'>
                    <p>Precio:&nbsp<label>$250</label></p>
                    <p>Cantidad:&nbsp;</p>
                    <p>Color:&nbsp<label>Verde militar</label></p>
                    <p>Talle:&nbsp</p>
                </div>
                <div>
                    <p>Total:&nbsp<label>$250</label></p>
                    <span class='agregar'><p>Agregar al carrito</p></span>
                    <span class='agregar'><p>Generar cupón</p></span>
                </div>
            </div>
        </div>
        
        <div class='clear'></div>
        <div id='descuentos' class=''>
        <div>
            <p>
                <img src='app_images/descuento_dinero.jpg' alt='' />
                <img id='cupon' class='articulo' src='app_images/descuento_cupon.jpg' alt='' />
            </p>
        </div>
        </div>
        <br />
        <div id='dineroMail' class='left-column-10 pull'>
            <p>
                <img class='articulo' src='app_images/dinero_mail.jpg' alt='' />
            </p>
        </div>";