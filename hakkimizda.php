<?php
include("header.php");
?>

<?php
   $hakkimizdasor= $db->prepare("select * from hakkimizda where hakkimizda_id=?");
   $hakkimizdasor ->execute(array(1));
   $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>
<section class="page">
    <div class="pageTitle">
        <h1><?php echo __d('Hakkımızda');?></h1>
    </div>

</section>
<section class="About">              
    <div class="aboutMenu">
        <div class="col2">
                <div class="imgAbout">
                    <img src="<?php echo $hakkimizdacek['hakkimizda_resimyol'];?>">
                </div>
        </div>
        <div class="col2">
            <div class="itemtext">
                <div class="baslik">
                <h1><?php echo $hakkimizdacek['hakkimizda_baslik'];?></h1>
                </div>
                <div class="icerik">
                <?php echo $hakkimizdacek['hakkimizda_icerik'];?>
                </div>
                
                <a href="#" class="btn">İŞİ GÖRÜNTÜLE </a> 
            </div>
        </div>

    </div>
</section>
<?php
include("footer.php");
?>