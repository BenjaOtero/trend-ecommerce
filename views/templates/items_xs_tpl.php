<div id="mobile-main-menu">
    <div class="div-menu-items-xs item" data-idItem="0" data-desc="Lo nuevo" data-genero="<?php echo $registro['IdGeneroART'];?>">
        <img src="app_images/menu_items_xs.jpg" class="" alt="">
        <p>LO NUEVO</p>
    </div> 
    <?php foreach ($view_items->items as $item):  // uso la otra sintaxis de php para templates ?>
      <div class="div-menu-items-xs item"  data-idItem="<?php echo $item['IdItemITE'];?>" 
                     data-desc="<?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>"
                     data-genero="<?php echo ucfirst(strtolower($item['IdGeneroART']));?>">
          <img src="app_images/menu_items_xs.jpg" class="" alt="">
          <p><?php echo $item['DescripcionWebITE'];?></p>
      </div> 
    <?php endforeach; ?>    
</div>
