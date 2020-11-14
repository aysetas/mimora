<?php
include ("header.php");
include ("slider.php");



?>
       
                   <!--Kategori kısmı--> 
        <section id="mainWatches" class="sectionArea">
            <div class="container">
                <div class="mainBody">
                    <?php
                        $kategori_id=@$_GET['kategori_id'];
                        $kategorisor = $db -> prepare("select * from kategori order by kategori_id='$kategori_id' ASC limit 3");
                        $kategorisor->execute(array());
                        $kategoriliste=$kategorisor->FetchALL(PDO::FETCH_ASSOC);

                        foreach($kategoriliste as $kategoricek){
                    
                    ?>
                         
                             
                    <div class="col3">
                        <div class="item">
                            <a href="#" class="promo__box">
                               <img src="nedmin/<?php echo $kategoricek['kategori_resimyol'];?>">
                                <span class="promo__content">
                                  <span class="promo__label"><?php echo $kategoricek['kategori_baslik'];?></span>
                                  <span class="promo__name"><?php echo $kategoricek['kategori_ad'];?></span>
                                  <span class="promo__price"><?php echo $kategoricek['kategori_baslik2'];?></span>
                                </span>
                            </a>
                        </div>
                    </div>

                        <?php } ?>
               
                </div>
           
            </div>
        </section>
                     <!--Galeri kısmı-->
        <section id="galeri" class="sectionArea">
            <div class="container">
                <div class="galeriBody">
                        <div class="galeriText">
                            <h1><?php echo __d('Galeri');?></h1>
                        </div>
                    <div class="galeriMenu">
                  
                    <?php                
                            $galeri_id=@$_GET['galeri_id'];
                            $galerisorgu = $db -> prepare("select * from galeri order by galeri_id='$galeri_id' ASC limit 8");
                            $galerisorgu -> execute (array());
                            $galeriliste= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC);
                            foreach($galeriliste as $galericek){
                            
                    ?>
                              
                        <div class="col5">
                            <div class="item2">
                                <div class="zoom">
                                    <img src="nedmin/<?php echo $galericek['galeri_resim']; ?>">
                                </div>
                                <div class="itemtext">
                                    <h5><?php echo $galericek['galeri_ad']; ?></h5>
                                    <h1><?php echo $galericek['galeri_baslik']; ?></h1>
                                    <img src="img/line.png" alt="line">
                                    <h2><?php echo $galericek['galeri_indirim']; ?> TL<span><del><?php echo $galericek['galeri_fiyat']; ?>TL</del></span></h2>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $parallaxsorgu = $db -> prepare("select * from parallax where parallax_id=?");
        $parallaxsorgu -> execute (array(2));
        $parallaxcek= $parallaxsorgu -> Fetch(PDO::FETCH_ASSOC);

        ?>
                      <!--Parallax kısmı-->
        <section id="parallax" class="sectionArea">

            <div class="parallaxTop">
                <h5><?php echo $parallaxcek['parallax_baslik1'];?></h5>
                <h1><?php echo $parallaxcek['parallax_baslik2'];?> </h1>
                <p> <?php echo $parallaxcek['parallax_icerik'];?></p>
                <a href="#" class="btn"><?php echo __d('satınAl');?></a> 
            </div>

        </section>

        <section class="watchSlider">
            <div class="container">
               
                <ul  class="bxslider">
                <?php
                    $galeri_id=@$_GET['galeri_id'];
                    $galerisorgu = $db -> prepare("select * from galeri order by galeri_id='$galeri_id' ASC limit 8");
                    $galerisorgu -> execute (array());
                    $galeriliste= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC);
                    foreach($galeriliste as $galericek){
                                
                ?>
                
                    <li><img src="nedmin/<?php echo $galericek['galeri_resim'];?>" /></li>
                    
                    <?php
                     }
                    ?>
                </ul> 
            </div>
        </section>

                              <!--Elmas kısmı-->
        <section id="diamond" class="selectionArea">
            <div class="container">
                <div class="diamondBody">
                    <div class="itemText">
                        <h1><?php echo __d('elmasvemucevher');?></h1>
                    </div>
                    <div class="diamondMenu">

                    <?php
                        $urun_id=@$_GET['urun_id'];
                        $urunsorgu = $db -> prepare("select * from urun_gorsel order by urun_id='$urun_id' ASC limit 2");
                        $urunsorgu -> execute (array());
                        $urunliste= $urunsorgu -> FetchALL(PDO::FETCH_ASSOC);
                        foreach($urunliste as $uruncek){
                                
                    ?>

                        <div class="col2">
                            <div class="item2">
                                <div class="zoom">
                                    <img src="<?php echo $uruncek['urun_resimyol'];?>" class="imageOver">
                                    <div class="diamondOverlay">
                                     <div class="diamondText"><?php echo $uruncek['urun_ad'];?></div>
                                    </div>
                                </div>
                                <div class="itemtext3">
                                    <h1><?php echo $uruncek['urun_ad'];?></h1>
                                    <p><?php echo $uruncek['urun_icerik'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>   
                  

                    </div>
            
                </div>
            </div>

        </section>

<?php include("footer.php"); ?>

