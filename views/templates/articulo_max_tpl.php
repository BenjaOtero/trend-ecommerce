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
h4{color: #777777; margin-left: 10px;}
</style>
<h4>    
    <?php echo $DescripcionWebART[0];?>
</h4>  
<div class="left-column-2">  
    <ul>  
        <?php 
            foreach($ImagenART as $imagen)
            {
                echo "<li>
                        <img class= 'tumbhMax' src='images/".$imagen[0]."_small.jpg' height='120' width='90' 
                            data-imagen=".$imagen[0]." />
                     </li>";
            } 
            foreach($ImagenBackART as $imagen)
            {
                echo "<li>
                        <img class= 'tumbhMax' src='images/".$imagen[0]."_bck_medium.jpg' height='120' width='90' 
                            data-imagen=".$imagen[0]."_bck />
                     </li>";
            }          
        ?>
    </ul>     
</div>
<div class="left-column-8">
        <?php
            echo "<img id='imgMax'  src='images/".$_SESSION['id_articulo']."_medium.jpg' height='800' width='600'/>";
         ?>
</div>

