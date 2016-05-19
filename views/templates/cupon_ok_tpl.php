<?php

?>
<div id="dialogo-cupon" align="center">
    <?php echo $_REQUEST['nombre']." ".$_REQUEST['apellido']."<br>";?>
    <?php echo $_REQUEST['correo']."<br>";?>
    <?php echo rand(1000000000, 2147483647);?>
        <div id="privacidad">
            <p><?php echo "Válido hasta el  ".$vencimientoCupon;?></p>
            <p>El cupón tiene un uso por persona y es intransferible</p>
            <p><a href="#">Acepto los términos de uso</a></p>
            <a href="#" style="display: inline;">Políticas de privacidad</a>
            <p id="cerrar-cupon">Cerrar</p>
        </div>      
</div>                        
<script type="text/javascript">
    $("#dialogo-cupon").css(<?php echo "'border','10px solid ".$color."'";?>); 
</script>    
  

