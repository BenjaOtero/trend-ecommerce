<div class="container">
    <div class="row hidden-xs">
        <div class="col-xs-12 col-md-10 col-md-offset-1 div-menu">
            <ul>
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
    <div class="row visible-xs">
        <div class="col-xs-12">  
            <?php foreach ($view->generos as $genero):  // uso la otra sintaxis de php para templates ?>
            <div class="div-menu-xs">
                <img src="app_images/menu_xs_02.jpg" class="" alt="">            
                <p data-idItem="0" data-idGenero="<?php echo $genero['IdGeneroGEN'];?>">
                    <?php echo $genero['DescripcionGEN'];?>
                </p>
            </div>
            <?php endforeach; ?>                               
        </div>
    </div>              
</div>


