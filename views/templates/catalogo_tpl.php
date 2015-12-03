<link rel="stylesheet" href="app_css/items_articulos.css" type="text/css" media="screen" property="stylesheet" />
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 items-articulos">
            <div id="div-items">
                <?php include_once ($view_items->itemsTemplate);?>
            </div>
        </div>                     
        <div class="col-xs-12 col-sm-7  items-articulos">
            <div id="div-articulos">
                <?php include_once ($view_articulos->articulosTemplate);?>                 
            </div>                             
        </div>
    </div> 
</div>
