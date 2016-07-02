<div id="mobile-main-menu">
    <ul id='menu-categorias'>
        <li>
            <a href="<?php echo "#/".$articulos['DescripcionGEN']."/Lo_nuevo/";?>">
                LO NUEVO
            </a>              
        </li>

  <?php foreach ($view_items->items as $item):  // uso la otra sintaxis de php para templates ?>
        <li>
            <a href="<?php echo "#/".$articulos['DescripcionGEN']."/".$item['DescripcionWebITE']."/";?>">
                <?php echo $item['DescripcionWebITE'];?>
            </a>                
        </li>
  <?php endforeach; ?>  
    </ul>
</div>

