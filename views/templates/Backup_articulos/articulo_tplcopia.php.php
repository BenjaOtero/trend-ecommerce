<?php 
$registro = current($view_articulos->articulos); 
$imagen=$registro['ImagenART'];
echo $imagen;
?>
<div id="foto">
    <div class="clearfix">
        <a href="images/<?php echo $registro['ImagenART']; ?>_large.jpg" class="jqzoom" rel='gal1'  title="KARMINNA" >
            <img src="images/<?php echo $registro['ImagenART']; ?>_medium.jpg"  title="KARMINNA" >
        </a>
    </div>
	<br/>
	<div class="clearfix" >
        <div>
            <ul id="lupita">
                <li>Zoom sobre imagen</li>
                <li>Click para ampliar</li>
            </ul>
        </div>
    	<ul id="thumblist" class="clearfix"  style="text-align: center;">
    		<li class="minis"><a href='javascript:void(0);' rel="{gallery: 'gal1',
                    smallimage: 'images/2601035_medium.jpg',largeimage: 'images/2601035_large.jpg'}">
                    <img src='images/2601035_xsmall.jpg'>
                </a>
            </li>
    		<li class="minis"><a href='javascript:void(0);' rel="{gallery: 'gal1',
                    smallimage: 'images/2601021_medium.jpg',largeimage: 'images/2601021_large.jpg'}">
                    <img src='images/2601021_xsmall.jpg'>
                </a>
            </li>
    		<li class="minis">
                <a href='javascript:void(0);' rel="{gallery: 'gal1',
                    smallimage: 'images/2601035_bck_medium.jpg',largeimage: 'images/2601035_bck_large.jpg'}">
                    <img src='images/2601035_bck_xsmall.jpg'>
                </a>
            </li>
    	</ul>
	</div>
</div>
<div id="compra">
    <h4>Pulover hilo basic</h4>
    <div id="color-talle">
        <div id="colors" class="clearfix">
            <p>Seleccioná un color:</p>
            <ul>
                <li>
                    <label>
                      <span data-imagen="2601035">
                        <a  href='javascript:void(0);' rel="{gallery: 'gal1',
                            smallimage: 'images/2601035_medium.jpg',largeimage: 'images/2601035_large.jpg'}">
                            <img src='images/2601035_col.jpg'>
                        </a>
                      </span>
                    </label>
                </li>
                <li>
                    <label>
                      <span data-imagen="2601021">
                        <a href='javascript:void(0);' rel="{gallery: 'gal1',
                            smallimage: 'images/2601021_medium.jpg',largeimage: 'images/2601021_large.jpg'}">
                            <img src='images/2601021_col.jpg'>
                        </a>
                      </span>
                    </label>
                </li>
            </ul>
        </div>
        <div id="talles">
            <p>Seleccioná un talle:</p>
            <ul>
                <li><label><span class="picker talle" title="M" style="width: 30px;">M</span></label></li>
                <li><label><span class="picker talle" title="M" style="width: 30px;">M</span></label></li>
                <li><label><span class="picker talle" title="M" style="width: 30px;">M</span></label></li>

            </ul>
        </div>
    </div>
    <div id="carrito">
        <div id="detalle-compra">
            <p>Precio:&nbsp<label>$250</label></p>
            <p>Cantidad:&nbsp;</p>
            <p>Color:&nbsp<label>Verde militar</label></p>
            <p>Talle:&nbsp</p>
        </div>
        <div>
            <p>Total:&nbsp<label>$250</label></p>
            <span class="agregar"><p>Agregar al carrito</p></span>
            <span class="agregar"><p>Generar cupón</p></span>
        </div>
    </div>
</div>
<div class="clear"></div>
<div id="descuentos" class="">
   <div>
        <p>
            <img src='app_images/descuento_dinero.jpg' alt='' />
            <img id='cupon' class='articulo' src='app_images/descuento_cupon.jpg' alt='' />
        </p>

   </div>
</div>
<br />
<div id="dineroMail" class="left-column-10 pull">
    <p>
        <img class='articulo' src='app_images/dinero_mail.jpg' alt='' />
    </p>
</div>