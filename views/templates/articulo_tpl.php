<?php 
include_once ("../controllers/componentes/array_column.php");
$foto=substr($id_articulo,0,8);
$registro = current($view_articulos->articulos);
?>
<link rel="stylesheet" href="app_css/articulo.css" type="text/css" media="screen" property="stylesheet" />
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-1 col-md-offset-1 col-lg-offset-">
        <div>  
                <img id="img-articulo" src="<?php echo "images/".$foto."_large.jpg";?>" 
                     data-img="<?php echo "images/".$foto."_large.jpg";?>" class="img-responsive">             
        </div>
        <div class="clearfix"></div>
            <ul id='lupita'>
                <li>Zoom sobre imagen</li>
                <li id='ampliar' data-imagen='".$foto."' >Click para ampliar</li>
            </ul>
        <ul id='miniaturas'>
            <?php foreach($ImagenART as $imagen): ?>
                <li class='mini' data-mini="<?php echo "images/".$imagen[0]."_large.jpg";?>"
                                 data-articulo="<?php echo $imagen[0]; ?>">                        
                    <img src="<?php echo "images/".$imagen[0]."_xsmall.jpg";?>">                         
                </li> 
            <?php endforeach; ?>                 
            <?php if($registro[4]!=null || $registro[4]!=''): ?>    
                <li class='mini' data-mini="<?php echo "images/".$registro[4]."_bck_large.jpg";?>">                                                 
                    <img src="<?php echo "images/".$registro[4]."_bck_xsmall.jpg";?>" alt="">                                                            
                </li>
            <?php endif; ?>                 
        </ul>
    </div> 
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
        <div id='compra'>
            <h4><?php echo $registro[1];?></h4>             
            <div id='color-talle'>
                <div id='colors'>
                    <p>Click en un color para ver talles disponibles:</p>
                    <ul>
                    <?php foreach($ImagenART as $imagen): ?>   
                        <!--para agregar y borrar clases para determinar el color activo uso el archivo jquery.jqzoom-core.js linea 185*/-->
                        <li>    
                            <label <?php echo "id='".$imagen[0]."_label'"; ?>>
                                <span class='color' data-mini="<?php echo "images/".$imagen[0]."_large.jpg";?>" 
                                      data-articulo="<?php echo $imagen[0]; ?>">                                                                                                                
                                    <img class="img-color" src="<?php echo "images/".$imagen[0]."_col.jpg"; ?>" alt="">                             
                                </span>
                            </label>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            
            <div id='talles'>
                <p>Talles:</p>
                    <?php foreach($ImagenART as $imagen):
                        if($foto===$imagen[0])
                        {
                            echo "<ul id='".$imagen[0]."'>";     
                        }
                        else
                        {
                           echo "<ul class='talle-inactivos' id='".$imagen[0]."'>";     
                        }
                        foreach($talleART as $talle)  
                        {
                            if($talle[0] != null)
                            {
                                $articulo = $imagen[0].$talle[0];                                
                                if (in_array($articulo, array_column($view_articulos->articulos, 0), true)) 
                                {
                                    echo "<li>
                                            <label class='activas'>
                                            <span class='picker talle' title=''>".$talle[0]."</span>                                    
                                            </label>
                                          </li>";
                                }
                                else
                                {
                                    echo "<li>
                                            <label class='inactivas'>
                                            <span class='picker sin-talle' title='talle no disponible' style='width: 30px;' >".$talle[0]."</span>                                    
                                            </label>
                                          </li>";
                                }                                    
                            }
                            else
                            {
                                    echo "<li>
                                            <p>
                                                Art&iacuteculo talle &uacutenico.                                  
                                            </p>
                                          </li>"; 
                            }
                        }
                        echo "</ul>";  
                endforeach; ?> 
            </div>                
            
            
        </div>
    </div>        
</div>   