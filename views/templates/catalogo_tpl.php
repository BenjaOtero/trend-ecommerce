<link rel="stylesheet" href="app_css/items_articulos.css" type="text/css" media="screen" property="stylesheet" />
<script type="text/javascript" src="app_js/jquery-1.10.2.js"></script> 
<div class="container">    
    <div class="row"> 
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="row" id="div-items-articulos">        
                <div class="col-sm-2 col-md-2 hidden-xs" id="div-items">
                    <?php include_once ($view_items->itemsTemplate);?>
                </div>               
                <div class="col-xs-12 col-sm-10 col-md-10">
                    <div id="fila-articulos" class="row">    
                       <div class="col-xs-12 col-md-12" id="columna-articulos">                                                              
                            <?php include_once ($view_articulos->articulosTemplate);?>                                                                    
                       </div> 
                    </div>                     
                </div>          
            </div>             
            
        </div>         
    </div>    
    <div class="row visible-xs" style="overflow: hidden;">
        <img src="app_images/drop_down_items_xs.jpg" class="" alt="" id="mobile-menu-button">        
        <div class="col-xs-12">                      
            <?php include_once ($view_items->itemsXsTemplate);?>
        </div>                                
    </div>      
</div>
