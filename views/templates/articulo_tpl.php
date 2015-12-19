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
                <li class='mini' data-mini="<?php echo "images/".$imagen[0]."_large.jpg";?>">                        
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
                <div id='colors' class='clearfix'>
                    <p>Click en un color para ver talles disponibles:</p>
                    <ul>
                    <?php foreach($ImagenART as $imagen): ?>   
                        <!--para agregar y borrar clases para determinar el color activo uso el archivo jquery.jqzoom-core.js linea 185*/-->
                        <li class='mini' data-mini="<?php echo "images/".$registro[0]."_bck_large.jpg";?>">    
                            <label>
                                <span>                                                                                                                
                                    <img src="<?php echo "images/".$imagen[0]."_col.jpg"; ?>" height='25' width='25' 
                                         data-articulo="<?php echo $imagen[0]; ?>">                             
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
<script>
    $(document).ready(function(){
            $('#ex1').zoom();
    });
</script>