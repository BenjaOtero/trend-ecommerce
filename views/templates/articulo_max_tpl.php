<script type="text/javascript" src="app_js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="app_js/jquery.preload.min.js"></script> 
<script type="text/javascript" src="app_js/articulo_max.js"></script>   
<style type="text/css">
*{
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
}    
.left-column-2 {width: 100px; float: left; margin-left: 10px; margin-top: 50px; overflow: hidden;}
.left-column-8 {width: 630px; float: left; margin-left: 0px; margin-top: 10px; overflow: hidden;}
ul{list-style: none;}
li:hover{cursor: pointer;}
h4{color: #777777; margin-left: 10px; margin-bottom: 5px; text-align: center;}
</style>
<div class="left-column-2">  
    <ul>  
        <?php foreach($ImagenART as $imagen): ?>
            <li class="mini" data-imagen="<?php echo $imagen['0'];?>">
                <img class= 'tumbhMax' src="<?php echo "images/".$imagen['0']."_small.jpg" ;?>" 
                     height='120' width='90' />
            </li>
        <?php endforeach; ?>
        <?php foreach($ImagenBackART as $imagen): ?> 
            <li class="mini" data-imagen="<?php echo $imagen['0'];?>">
                <img class= 'tumbhMax' src="<?php echo "images/".$imagen['0']."_bck_medium.jpg" ;?>" 
                     height='120' width='90' />
            </li>
        <?php endforeach; ?>
    </ul>     
</div>
<div class="left-column-8">
    <h4>    
        <?php echo $DescripcionWebART[0];?>        
    </h4>      
    <img id='imgMax'  src="<?php echo $_SESSION['imagen'] ;?>" 
         height='800' width='600'/>     
</div>

