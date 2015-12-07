  <?php foreach ($view_articulos->articulos as $articulo):  // uso la otra sintaxis de php para templates ?>
        <div class="col-xs-6 col-sm-4 col-lg-3">
            <img src="<?php echo "images/".$articulo['ImagenART']."_small.jpg";?>" class="img-responsive" alt="Imagen responsive">
            <p class="descripcion-articulo"><?php echo $articulo['DescripcionWebART'];?></p>
        </div> 
  <?php endforeach; ?>

