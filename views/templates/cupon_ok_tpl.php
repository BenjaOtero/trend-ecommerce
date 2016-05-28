<div class="modal fade" id="divCupones" role="dialog">
  <div class="modal-dialog">      
    <!-- Modal content-->
    <div class="modal-content">
      <div id="div-cupones-body" class="modal-body" align="center">

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
          
      </div>
      <div class="modal-footer">
        <div id="privacidad">
            <p><?php echo "Válido hasta el  ".$vencimientoCupon;?></p>
            <p>El cupón tiene un uso por persona y es intransferible</p>
          <!--   <p><a href="#">Acepto los términos de uso</a></p>
            <a href="#" style="display: inline;">Políticas de privacidad</a> -->
            <button id="cerrar-cupon" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>            
        </div>            
        
      </div>
    </div>      
  </div>
</div>  
<script type="text/javascript">
    $('#divCupones').modal('show'); 
</script>  
  

