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
                                        <h5><?php echo $slidercek['slider_baslik1'];?></h5>
                                        <h1><?php echo $slidercek['slider_baslik2'];?></h1>
                                        <p><?php echo $slidercek['slider_icerik1'];?> </p>
                                        <p><?php echo $slidercek['slider_icerik2'];?> <strong><?php echo $slidercek['slider_fiyat'];?></strong></p>
                                        <a href="#" class="slider-btn">SATIN AL </a> 
                                        </div> 
                                        <img src="<?php echo $slidercek['slider_resimyol'];?>" />
                               
                                    </li>
                                <?php
                                 }
                                ?>
                        
                      
                      
                     
                    </ul>    