<div class="row">
    <div id="div-menu" class="col-xs-12 col-md-10 col-md-offset-1">
        <ul class="hidden-xs">
          <li id="contacto">CONTACTO</li>
          <?php foreach ($view->generos as $genero):  // uso la otra sintaxis de php para templates ?>
          <li class="menu" data-idItem="0" data-idGenero="<?php echo $genero['IdGeneroGEN'];?>">
            <?php echo $genero['DescripcionGEN'];?>
          </li>
          <?php endforeach; ?>
          <li id="index" class="active">INICIO</li>
        </ul>  
    </div>
</div>           
<div class="row">
    <div class="col-xs-12">
        <div class="visible-xs">
            <ul id="mobile-main-menu">
            <li class="menu-active">INICIO</li>
            <?php foreach ($view->generos as $genero):  // uso la otra sintaxis de php para templates ?>
            <li class="menu" data-idItem="0" data-idGenero="<?php echo $genero['IdGeneroGEN'];?>">
                <?php echo $genero['DescripcionGEN'];?>
            </li>
            <?php endforeach; ?>
            <li>CONTACTO</li>
            </ul>
        </div>                
    </div>
</div>  


