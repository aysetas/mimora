<?php
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

    $galerisorgu=$db->prepare("select * from galeri where galeri_id=:galeri_id");
    $galerisorgu->execute(array('galeri_id'=> $_GET['galeri_id'])); 
    $galericek= $galerisorgu -> Fetch(PDO::FETCH_ASSOC);


?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Yönetim Paneli</h3>
            </div>
        </div>
                
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="col-md-6">
                                <h3 class="page-head-line">GALERİ DÜZENLE </h3>
                                <ul class="nav navbar-right panel_toolbox">
                                    <?php
                                    if(@$_GET['durum']=="ok"):
                                    ?>
                                    <b style="color:green;">Galeri düzenlendi...</b>
                                    <?php
                                    elseif(@$_GET['durum']=="no"):
                                    ?>
                                    <b style="color:red;">Galeri düzenlenemedi..</b>
                                    <?php
                                    endif;
                                    ?>
                                </ul>
                                
            
                            </div>
                            <div align= "right" class="col-md-6">
                            <a href="galeri.php"><button class=" btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Geri Dön</button></a> 
                            </div>
                            <div class="clearfix"></div>
                        
                        </div>
                        <div class="x_content">
            
                        <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                                        
                                <input type="hidden" name="galeri_id" value="<?php echo $galericek['galeri_id'];?>">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img width="120" height="120" src="../<?php echo  $galericek['galeri_resim']; ?>" alt="galeri resmi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="first-name"   name="galeri_resim" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürünün Adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" name="galeri_ad" value="<?php echo $galericek['galeri_ad'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürünün Sırası<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="galeri_sira" value="<?php echo $galericek['galeri_sira'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Başlığı<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" name="galeri_baslik" value="<?php echo $galericek['galeri_baslik'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürünün Fiyatı<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" name="galeri_fiyat" value="<?php echo $galericek['galeri_fiyat'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İndirimli fiyatı<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" name="galeri_indirim" value="<?php echo $galericek['galeri_indirim'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
            
                              

                                    <div  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                    <button type="submit" name="galeriduzenle" class="btn btn-primary">Kaydet</button>
                                    </div>
                
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
    
    </div>
</div>

<?php
include 'footer.php';
?>