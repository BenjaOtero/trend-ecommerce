<?php

?>
<div class="row">
    <div class="col-xs-6 col-sm-4 col-lg-3">
        <div id="dialogo-cupon" align="center">
            <div align='center' style="margin: 10px; padding: 10px;">        
            <img src='app_images/cupones_logo.jpg' class="img-responsive">
            <br><br><br>
            <p style='font-size:20px; margin:0;'><?php echo "Número de cupón: ".$nroCupon;?></p>
            <p><?php echo "Válido hasta el ".$vencCuponFormat;?></p>
            <p style='font-size:10px; margin-top:10px;color:red;'>
                Acercate a nuestros locales, pasale el número de cupón a la vendedora y obtené un 20% de descuento.
            </p>
            <p style='font-size:10px; margin-top:10px;color:red;'>
                <?php echo "Te enviamos un mail a ".$correo." con los datos de la promo.";?>
            </p>
            </div>          
            <div id="privacidad">
                <p><?php echo "Válido hasta el  ".$vencimientoCupon;?></p>
                <p>El cupón tiene un uso por persona y es intransferible</p>
                <p><a href="#">Acepto los términos de uso</a></p>
                <a href="#" style="display: inline;">Políticas de privacidad</a>
                <p id="cerrar-cupon">Cerrar</p>
            </div>  
        </div>  
    </div>        
</div>                          
<script type="text/javascript">
    $("#dialogo-cupon").css(<?php echo "'border','10px solid ".$color."'";?>); 
</script>    
  

