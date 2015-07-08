<ul>
  <li class="catalogo" data-idItem="0" data-desc="Lo nuevo" data-local="<?php echo $registro['IdLocalLOC'];?>">Lo nuevo</li>
  <?php foreach ($view_items->items as $item):  // uso la otra sintaxis de php para templates ?>
    <li class="catalogo" data-idItem="<?php echo $item['IdItemITE'];?>" data-local="<?php echo $item['IdLocalLOC'];?>"
            data-desc="<?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>">
      <?php echo ucfirst(strtolower($item['DescripcionWebITE']));?>
    </li>
  <?php endforeach; ?>
</ul>

