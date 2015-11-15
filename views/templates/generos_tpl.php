<ul>
  <li id="contacto">CONTACTO</li>
  <?php foreach ($view->generos as $genero):  // uso la otra sintaxis de php para templates ?>
    <li class="menu" data-idItem="0" data-idGenero="<?php echo $genero['IdGeneroGEN'];?>">
      <?php echo strtoupper($genero['DescripcionGEN']);?>
    </li>
  <?php endforeach; ?>
  <li id="index" class="active">INICIO</li>
</ul>


