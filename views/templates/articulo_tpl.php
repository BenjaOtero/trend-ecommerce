<?php 
include_once ("../controllers/componentes/array_column.php");
$foto=substr($id_articulo,0,8);
$registro = current($view_articulos->articulos);
?>
<link rel="stylesheet" href="app_css/articulo.css" type="text/css" media="screen" property="stylesheet" />
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div>
                <a href="<?php echo "images/".$foto."_large.jpg";?>" class='jqzoom' rel="gal1"  title='KARMINNA' >
                    <img src="<?php echo "images/".$foto."_medium.jpg";?>" class="img-responsive"  title='KARMINNA' >
                </a>                  
            </div>
            <div class="clearfix"></div>
                <ul id='lupita'>
                    <li>Zoom sobre imagen</li>
                    <li id='ampliar' data-imagen='".$foto."' >Click para ampliar</li>
                </ul>
            <ul id='thumblist' style='text-align: center;'>
                <?php foreach($ImagenART as $imagen): ?>
                    <li class='minis'>
                        <a href="javascript:void(0);" 
                           rel="<?php echo "{gallery: 'gal1', smallimage: 'images/".$imagen[0]."_medium.jpg', largeimage: 'images/".$imagen[0]."_large.jpg'}";?>">
                             <img src="<?php echo "images/".$imagen[0]."_xsmall.jpg";?>">                         
                        </a>
                    </li> 
                <?php endforeach; ?>                 
                <?php if($registro[4]!=null || $registro[4]!=''): ?>    
                    <li class='minis'>
                        <a href='javascript:void(0);' 
                           rel="<?php echo "{gallery: 'gal1',smallimage: 'images/".$registro[4]."_bck_medium.jpg',largeimage: 'images/".$registro[4]."_bck_large.jpg'}";?>">
                                <img src="<?php echo "images/".$registro[4]."_bck_xsmall.jpg";?>" alt="">                            
                        </a>                                        
                    </li>
                <?php endif; ?>                 
            </ul>
        </div> 
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div id='compra'>
                <h4><?php echo $registro[1];?></h4>             
                <div id='color-talle'>
                    <div id='colors' class='clearfix'>
                        <p>Click en un color para ver talles disponibles:</p>
                        <ul>
                        <?php foreach($ImagenART as $imagen): ?>   
                            <!--para agregar y borrar clases para determinar el color activo uso el archivo jquery.jqzoom-core.js linea 185*/-->
                            <li>
                                <label>
                                    <span>
                                        <a  href='javascript:void(0);' 
                                            rel="<?php echo "{gallery: 'gal1', smallimage: 'images/".$imagen[0]."_medium.jpg', largeimage: 'images/".$imagen[0]."_large.jpg'}";?>"
                                            data-articulo="<?php echo $imagen[0]; ?>">                                                                                                                   
                                            <img src="<?php echo "images/".$imagen[0]."_col.jpg"; ?>" height='25' width='25' />                                
                                        </a>
                                    </span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>        
    </div>   
</div>
<div class="container">
    <div class="row">
        eaeapepe
    </div>
</div>