                    <!--Slider kısmı-->
  
                    <ul  class="bxslider1">
                                <?php                
                                    $slider_id=@$_GET['slider_id'];
                                    $slidersorgu = $db -> prepare("select * from slider order by slider_id='$slider_id' ASC");
                                    $slidersorgu -> execute (array());
                                    $sliderliste= $slidersorgu -> FetchALL(PDO::FETCH_ASSOC);
                                    foreach($sliderliste as $slidercek){
                                    
                                ?>
                                    <li>
                                        <div class="caption">
                                        <h5><?php echo __d($slidercek['slider_baslik1']);?></h5>
                                        <h1><?php echo __d($slidercek['slider_baslik2']);?></h1>
                                        <p><?php echo __d($slidercek['slider_baslik3']);?> </p>
                                        <p><?php echo __d($slidercek['slider_baslik4']);?> <strong><?php echo __d($slidercek['slider_fiyat']);?></strong></p>
                                        <a href="#" class="slider-btn"><?php echo __d('satınAl');?> </a> 
                                        </div> 
                                        <img src="nedmin/<?php echo $slidercek['slider_resimyol'];?>" />
                               
                                    </li>
                                <?php
                                 }
                                ?>
                        
                      
                      
                     
                    </ul>    