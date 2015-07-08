<?php 
include_once ("../controllers/componentes/array_column.php");
$imagen=substr($id_articulo,0,7);
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
                        <li id='ampliar'>Click para ampliar</li>
                    </ul>
                </div>
                <ul id='thumblist' class='clearfix'  style='text-align: center;'>";
                foreach($view_articulos->articulos as $articulo)
                {
                    if($articulo['ImagenART']!=null || $articulo['ImagenART']!='')
                    {
                    echo "<li class='minis'><a href='javascript:void(0);' rel=\"{gallery: 'gal1',
                            smallimage: 'images/".$articulo['ImagenART']."_medium.jpg',largeimage: 'images/".$articulo['ImagenART']."_large.jpg'}\">
                            <img src='images/".$articulo['ImagenART']."_xsmall.jpg'>
                            </a>
                        </li>";
                    }  
                    if($articulo['ImagenBackART']!=null || $articulo['ImagenBackART']!='')
                    {
                    echo "<li class='minis'><a href='javascript:void(0);' rel=\"{gallery: 'gal1',
                            smallimage: 'images/".$articulo['ImagenART']."_bck_medium.jpg',largeimage: 'images/".$articulo['ImagenART']."_bck_large.jpg'}\">
                            <img src='images/".$articulo['ImagenART']."_bck_xsmall.jpg'>
                            </a>
                        </li>";
                    }                       
                }                 
echo            "</ul>
            </div>
        </div>
        <div id='compra'>
            <h4>".$articulo['DescripcionWebART']."</h4>
            <div id='color-talle'>
                <div id='colors' class='clearfix'>
                    <p>Seleccioná un color:</p>
                    <ul>";
                    reset($view_articulos->articulos); /*vuelvo al primer registro del array*/
                    $talles = array();
                    foreach($view_articulos->articulos as $articulo) /*duplico array $view_articulos->articulos*/
                    {
                        $talles[]=$articulo;
                    }
                    $filtered = array_filter($view_articulos->articulos, function($el) { /*filtro los que tienen ImagenColorART*/
                        return !empty($el['ImagenColorART']); });
                    if(count($filtered)>0) 
                    {
                        foreach($filtered as $articulo)
                        {
                            echo "<li>
                                    <label>
                                    <span>
                                        <a  href='javascript:void(0);' rel=\"{gallery: 'gal1',
                                            smallimage: 'images/".$articulo['ImagenART']."_medium.jpg',
                                                largeimage: 'images/".$articulo['ImagenART']."_large.jpg'}\">
                                            <img src='images/".$articulo['ImagenART']."_col.jpg'>
                                        </a>
                                    </span>
                                    </label>
                                </li>";
                        }                         
                    }
                    else
                    {
                        $color='';
                        foreach($view_articulos->articulos as $key => $row) 
                        {
                            if($row['HexCOL']==$color) 
                            {
                                unset($view_articulos->articulos[$key]); /* borro el registro si el color se repite*/                               
                            }
                            $color=$row['HexCOL'];
                        }                    
                        foreach($view_articulos->articulos as $articulo)
                        {
                            echo "<li>
                                    <label>
                                    <div style='background-color: ".$articulo['HexCOL'].";'
                                            title='".$articulo['DescripcionCOL']."' class='color'>

                                    </div>
                                    </label>
                                </li>";
                        } 
                    }
echo                "</ul>
                </div>
                <div id='talles'>
                <p>Seleccioná un talle:</p>";
                $columna = array_column($talles, 'TalleART'); /*obtengo unicamente la columna TalleART del array $talles*/
                $talle = array_unique($columna);    /*elimino valores duplicados*/
                sort($talle);
                if(count($talle)>1)
                {                  
echo               "<ul>";                    
                    for($i=0;$i<count($talle);$i++)
                    {                            
echo                    "<li>
                            <label>
                                <span class='picker talle' title='' style='width: 30px;' >".$talle[$i]."</span>
                            </label>
                        </li>";
                    }
echo               "</ul>";                    
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