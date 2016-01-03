<ul id="ulItem">
  <li class="items" data-idItem="0" data-desc="Lo nuevo" data-genero="<?php echo $registro['IdGeneroART'];?>">Lo nuevo</li>
  <?php foreach ($view_items->items as $item):  // uso la otra sintaxis de php para templates ?>
    <li class="items" data-idItem="<?php echo $item['IdItemITE'];?>" 
                     data-desc="<?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>"
                     data-genero="<?php echo ucfirst(strtolower($item['IdGeneroART']));?>">
      <?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>
    </li>
  <?php endforeach; ?>
</ul>


