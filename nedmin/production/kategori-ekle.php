<?php 
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

            
                    $kategorisorgu = $db -> prepare("select * from kategori where kategori_id=?");
                    $kategorisorgu -> execute (array(1));
                    $kategoricek= $kategorisorgu -> Fetch(PDO::FETCH_ASSOC);       
?> 

<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>
        <!-- page content -->
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori Ekle</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                    <?php
                    if(@$_GET['durum']=="ok"):
                    ?>
                    <b style="color:green;">Kategori eklendi..</b>
                    <?php
                   elseif(@$_GET['durum']=="no"):
                    ?>
                    <b style="color:red;">Kategori eklenemedi..</b>
                    <?php
                   endif;
                    ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                   
                                           
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" required="required"  name="kategori_resimyol" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kategori_ad" placeholder="Kategori Adını giriniz.."  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Birinci Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kategori_baslik" placeholder="Birinci Başlığı giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İkinci Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kategori_baslik2" placeholder="İkinci Başlığı giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Link<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="kategori_link" placeholder="Kategori Linkini giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kategori_sira" placeholder="Kategori Sırasını giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                          <button type="submit" name="kategorikaydet" class="btn btn-primary">Kaydet</button>
                        </div>
                
                    </form>

                    
                  </div>
                </div>
              </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include 'footer.php';?>