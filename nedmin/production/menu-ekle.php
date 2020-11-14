<?php
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

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
                            <div class="col-md-12">
                                <h1 class="page-head-line">MENÜ EKLE</h1>
                                <ul class="nav navbar-right panel_toolbox">
                                    <?php
                                    if(@$_GET['durum']=="ok"):
                                    ?>
                                    <b style="color:green;">Menü başarıyla eklendi...</b>
                                    <?php
                                     elseif(@$_GET['durum']=="no"):
                                    ?>
                                    <b style="color:red;">Menü eklenemedi..</b>
                                    <?php
                                    endif;
                                    ?>
                                </ul>
        
                            </div>
                          <div class="clearfix"></div>
                        </div>
                     <div class="x_content">
                        
                       
                            <form action="../netting/islem.php" method="POST">

                                    <div class=" col-md-12">   
                                        <div class="form-group  col-md-6">
                                        <label>Menü Adı</label>                   
                                        <input class="form-control" type="text" name="menu_ad"  placeholder="Menü Adını Giriniz">
                                        </div>
                                    </div>
                                    <div class=" col-md-12">   
                                        <div class="form-group  col-md-6">
                                        <label>Menü Linki</label>                   
                                        <input class="form-control" type="text" name="menu_link" value="">
                                        </div>
                                    </div>
                                    <div class=" col-md-12">   
                                        <div class="form-group  col-md-6">
                                        <label>Menü İconu</label>                   
                                        <input class="form-control" type="text" name="menu_icon"  placeholder="Menü İconu Giriniz">
                                        </div>
                                    </div>
                                    <div class=" col-md-12 ">
                                        <div class="form-group  col-md-3">               
                                        <input style="width:%100" class="btn btn-success" type="submit" name="menukaydet" value="Menü Kaydet">
                                        </div>
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