
<footer class="footerArea">
            <div class="container">
                <div class="footerBody">
                    <div class="footerTop">

                        <div class="col4">
                            <div class="footerItem">
                                <img src="<?php echo $ayarcek['ayar_logo']?>" alt="logo">
                                <ul class="socialLinks">
                                    <li><a href="<?php echo $ayarcek['ayar_twitter'];?>"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $ayarcek['ayar_googleplus'];?>"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="<?php echo $ayarcek['ayar_facebook'];?>"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?php echo $ayarcek['ayar_youtube'];?>"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="<?php echo $ayarcek['ayar_instagram'];?>"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                     
                        <div class="col4">
                            <div class="footerItem">
                                <h4>EXTRA</h4>
                                <ul class="footerExtra">
                                <?php                
                                    $menu_id=@$_GET['menu_id'];
                                    $menusorgu = $db -> prepare("select * from menuler order by menu_id='$menu_id' ASC");
                                    $menusorgu -> execute (array());
                                    $menuliste= $menusorgu -> FetchALL(PDO::FETCH_ASSOC);
                                    foreach($menuliste as $menucek){
                                    
                                ?>
                                <li><a href="<?php echo $menucek['menu_link'];?>"><?php echo __d($menucek['menu_ad']);?></a></li>
                                <?php
                                 }
                                ?>
                                </ul>
                        
                            </div>
                        </div>
                        <div class="col4">
                            <div class="footerItem">
                                <h3><?php echo __d('BizeUlas');?></h3>
                                <ul class="footerContact">
                                    <li> <strong><?php echo __d('Adres');?>:</strong><?php echo $ayarcek['ayar_adres']?><br><?php echo $ayarcek['ayar_ilce'];?>/<?php echo $ayarcek['ayar_il'];?></li>
                                    <li><strong><?php echo __d('Telefon');?>:</strong><?php echo $ayarcek['ayar_tel']?> </li>
                                    <li><strong>Fax:</strong><?php echo $ayarcek['ayar_fax']?></li>
                                    <li><strong>Email:</strong> <a href="<?php echo $ayarcek['ayar_mail']?>"><?php echo $ayarcek['ayar_mail']?></a></li>
                                </ul>
                        
                            </div>
                        </div>
                        <div class="col4">
                            <div class="footerItem">
                                <h3><?php echo __d('ozelurun');?></h3>
                                <div class="widget-product">

                                    <?php                
                                        $galeri_id=@$_GET['galeri_id'];
                                        $galerisorgu = $db -> prepare("select * from galeri order by galeri_id='$galeri_id' ASC limit 2");
                                        $galerisorgu -> execute (array());
                                        $galeriliste= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC);
                                        foreach($galeriliste as $galericek){
                            
                                    ?>
                                    <div class="product">
                                        <div class="productimg">
                                            <img src="nedmin/<?php echo $galericek['galeri_resim'];?>" alt="saat">
                                        </div>
                                        <div class="productText">
                                            <h5><?php echo $galericek['galeri_ad'];?></h5>
                                            <h1><?php echo $galericek['galeri_baslik'];?></h1>
                                            <h2><?php echo $galericek['galeri_indirim'];?>TL<span><del><?php echo $galericek['galeri_fiyat'];?> TL</del></span></h2>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <img src="img/line.png" alt="">
                                    </div>
                                    <?php } ?>
                          
                                </div>
                        
                            </div>
                        </div>
                    </div>

                    <div class="footerLower">
                        <div class="copyright">
                            <a href="#"> <?php echo __d('telifHakkı');?>&copy; 2020 |</a>
                            <span class="text">
                            <?php echo $ayarcek['ayar_author']?>.
                            </span>
                            <?php echo __d('haklar');?>.
            
                        </div>
                        <div class="footerImg">
                            <img src="img/payment.png" >
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <script>
            $(document).ready(function(){
                $('.bxslider').bxSlider({
                    mode: 'horizontal',
                    moveSlides: 1,
                    slideMargin: 10,
                    infiniteLoop: true,
                    slideWidth:1920,
                    minSlides: 6,
                    maxSlides: 20,
                    speed:600
                    
                
                });
            });
            $(document).ready(function(){
                $('.bxslider1').bxSlider({
                    mode: 'horizontal',
                    moveSlides: 1,
                    slideMargin: 10,
                    infiniteLoop: true,
                    slideWidth:1920,
                    minSlides: 1,
                    maxSlides: 1,
                    speed:600
                    
                
                });

            
            });
            $(document).ready(function(){
                var a=0;
                $('.mobil').click(function(){
                    if(a==0){
                        $(this).html("<i class='fas fa-times'> MENU</i>");
                        a++;
                    }
                    else{
                        $(this).html("<i class='fas fa-bars'> MENU</i>");
                        a=0;
                    }
                
                    $(this).next('.menuLink').toggle(); 

                });
            
            });
        
        </script>


    </body>
</html>