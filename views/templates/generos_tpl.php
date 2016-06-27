<div class="container">
    <div class="row hidden-xs">
        <div class="col-xs-12 col-md-10 col-md-offset-1 div-menu">
            <ul>
              <li id="li-contacto">CONTACTO</li>
              <?php foreach ($view->generos as $genero):  // uso la otra sintaxis de php para templates ?>
              <li data-idItem="0" data-idGenero="<?php echo $genero['IdGeneroGEN'];?>">
                  <a href="<?php echo "#/".$genero['DescripcionGEN'];?>"><?php echo $genero['DescripcionGEN'];?></a>
              </li>
              <?php endforeach; ?>
              <li><a class="active" href="#/inicio">INICIO</a></li>
            </ul>  
        </div>
    </div>           
    <div class="row visible-xs">
        <div class="col-xs-12">  
            <?php foreach ($view->generos as $genero):  // uso la otra sintaxis de php para templates ?>
            <div class="div-menu-xs menu-own" data-idItem="0" data-idGenero="<?php echo $genero['IdGeneroGEN'];?>">
                <img src="app_images/menu_xs.jpg" class="" alt="">            
                <p>
                    <?php echo $genero['DescripcionGEN'];?>
                </p>
            </div>
            <?php endforeach; ?>                               
        </div>
    </div>              
</div>


