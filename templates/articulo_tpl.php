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
                    if($registro[4]!=null || $registro[4]!='')  /* el índice 4 es el campo 'ImagenBackART' */
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
                    foreach($ImagenART as $imagen) 
                    {
                        /*para agregar y borrar clases para determinar el color activo uso el archivo jquery.jqzoom-core.js linea 185*/
                        echo "<li>
                                <label>
                                    <span>
                                        <a  href='javascript:void(0);' rel=\"{gallery: 'gal1',
                                                smallimage: 'images/".$imagen[0]."_medium.jpg',
                                                largeimage: 'images/".$imagen[0]."_large.jpg'}\" 
                                                data-articulo='".$imagen[0]."'>
                                            <img src='images/".$imagen[0]."_col.jpg' height='25' width='25' />
                                        </a>
                                    </span>
                                </label>
                            </li>";
                    } 
echo                "</ul>
                </div>
                <div id='talles'>
                    <p>Talles:</p>";
                    if(count($talleART)>0)
                    { 
                        $i = 0;
                        foreach($ImagenART as $imagen)  // hago un foreach por imagen color
                        {
                            if($i===0)
                            {
                                echo "<ul id='".$imagen[0]."'>";     
                            }
                            else
                            {
                               echo "<ul class='talle-inactivos' id='".$imagen[0]."'>";     
                            }
                            foreach($talleART as $talle)  
                            {
                                $articulo = $imagen[0] + $talle[0];
                                if (in_array($articulo, $view_articulos->articulos)) {
                                    echo "<li>
                                            <label>
                                            <span class='picker talle' title='' style='width: 30px;' >".$talle[0]."</span>                                    
                                            </label>
                                          </li>";
                                }
                                else
                                {
                                    echo "<li>
                                            <label>
                                            <span class='picker talle' title='' style='width: 30px;' >X</span>                                    
                                            </label>
                                          </li>";
                                }
                            }
                            echo "<ul>";
                            $i++;
                        }                                                                         
                    } 
echo           "</div>
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