<?php
include("header.php");

?>

        <section class="page">
            <div class="pageTitle">
                <h1><?php echo __d('Galeri');?></h1>
            </div>
    
        </section>
        <section class="imgProduct">
            <div class="container">
                <div class="imgBody">
                    <div class="imgMenu">
                        <div class="col2">
                            <div class="item">

                            <?php                
                                $galeri_id=@$_GET['galeri_id'];
                                $galerisorgu = $db -> prepare("select * from galeri order by galeri_id='$galeri_id' ASC limit 4");
                                $galerisorgu -> execute (array());
                                $galeriliste= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC);
                                foreach($galeriliste as $galericek){
                            
                            ?>
                                <div class="imgPage">
                                    <img src="nedmin/<?php echo $galericek['galeri_resim'];?>">
                                </div>
                              
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="col2">
                            <div class="item">
                            <?php                
                                $galeri_id=@$_GET['galeri_id'];
                                $galerisorgu = $db -> prepare("select * from galeri order by galeri_id='$galeri_id' ASC limit 2");
                                $galerisorgu -> execute (array());
                                $galeriliste= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC);
                                foreach($galeriliste as $galericek){
                            
                            ?>
                               
                                <div class="text">
                                    <div class="itemtext">
                                        <h1><?php echo $galericek['galeri_baslik'];?></h1>
                                        <ul class="list">
                                            <li>Brand:<a href="#">Apple</a></li>
                                            <li>Product Code: Watches</li>
                                            <li>Reward Points: 600</li>
                                            <li>Availability: In Stock</li>
                                        </ul>
                                        <h2><?php echo $galericek['galeri_indirim'];?>TL <span><del><?php echo $galericek['galeri_fiyat'];?>TL</del></span></h2>
                                        <a href="#" class="btn"><?php echo __d('satınAl');?></a> 
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
            
                </div>
            </div>

        </section>
                     <!--Galeri kısmı-->
        <section id="galeri" class="sectionArea">
            <div class="container">
                <div class="galeriBody">
                        <div class="galeriText">
                            <h1 style="font-size: 19px;"><?php echo __d('digerleri');?></h1>
                        </div>
                    <div class="galeriMenu">

                        <?php                
                            $galeri_id=@$_GET['galeri_id'];
                            $galerisorgu = $db -> prepare("select * from galeri order by galeri_id='$galeri_id' ASC");
                            $galerisorgu -> execute (array());
                            $galeriliste= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC);
                            foreach($galeriliste as $galericek){
                            
                        ?>
                              
                        <div class="col5">
                            <div class="item2">
                                <div class="zoom">
                                    <img src="nedmin/<?php echo $galericek['galeri_resim'];?>">
                                </div>
                                <div class="itemtext">
                                    <h5><?php echo $galericek['galeri_ad']; ?></h5>
                                    <h1><?php echo $galericek['galeri_baslik']; ?></h1>
                                    <img src="img/line.png" alt="line">
                                    <h2><?php echo $galericek['galeri_indirim']; ?>TL<span><del><?php echo $galericek['galeri_fiyat']; ?>TL</del></span></h2>
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
include("footer.php");
?>