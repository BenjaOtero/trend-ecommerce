<link rel="stylesheet" href="app_css/items_articulos.css" type="text/css" media="screen" property="stylesheet" />
<div class="container">
    <div class="row">        
        <div class="col-sm-2 col-md-2 col-md-offset-1 hidden-xs" id="div-items">
            <div id="div-items-sub">
                <?php include_once ($view_items->itemsTemplate);?>
            </div>
        </div>               
        <div class="col-xs-12 col-sm-10 col-md-8">
            <div id="fila-articulos" class="row">    
               <div class="col-xs-12 col-md-12" id="columna-articulos">  
                   <div id="div-articulos">                                
                       <div class="row">
                           <?php include_once ($view_articulos->articulosTemplate);?> 
                       </div>                                  
                   </div>                                         
               </div> 
            </div>                     
        </div>          
    </div> 
    <div class="row visible-xs">
        <div class="col-xs-12">                      
            <?php include_once ($view_items->itemsXsTemplate);?>
        </div>                                
    </div>      
</div>
