<ul>
  <li class="catalogo" data-idItem="0" data-desc="Lo nuevo">Lo nuevo</li>
  <?php foreach ($view_items->items as $item):  // uso la otra sintaxis de php para templates ?>
    <li class="catalogo" data-idItem="<?php echo $item['IdItemITE'];?>" data-desc="<?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>">
      <?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>
    </li>
  <?php endforeach; ?>
</ul>

