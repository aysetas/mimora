<?php 
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

$slidersorgu=$db->prepare("select * from slider where slider_id=:slider_id");
$slidersorgu->execute(array('slider_id'=> $_GET['slider_id'])); 
$slidercek= $slidersorgu -> Fetch(PDO::FETCH_ASSOC);
                         
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
                   <div class="col-md-6">
                    <h2>Slider Düzenle</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                    <?php
                    if(@$_GET['durum']=="ok"):
                    ?>
                    <b style="color:green;">Düzenleme Başarılı...</b>
                    <?php
                   elseif(@$_GET['durum']=="no"):
                    ?>
                    <b style="color:red;">Düzenleme Başarısız...</b>
                    <?php
                   endif;
                    ?>
                    </ul>
                    </div>
                    <div align= "right" class="col-md-6">
                      <a href="slider.php"><button class=" btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Geri Dön</button></a> 
                    </div>
                   
                    <div class="clearfix"></div>
                  </div>

                    <div class="x_content">

                        <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                   
                            <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'];?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <img width="250" height="100" src="../<?php echo  $slidercek['slider_resimyol']; ?>" alt="slider resmi">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="file" id="first-name"   name="slider_resimyol" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Adı <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first-name" required="required" name="slider_ad" value="<?php echo $slidercek['slider_ad'];?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first-name" required="required" name="slider_sira" value="<?php echo $slidercek['slider_sira'];?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="slider_durum" required>
                                        <?php
                                        if( $slidercek['slider_durum']==1):
                                        ?>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        <?php
                                        else:
                                        ?>
                                        <option value="0">Pasif</option>
                                        <option value="1">Aktif</option>
                                        <?php
                                        endif;
                                        ?>

                                    </select>
                                </div>
                            </div>

                                <div  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                <button type="submit" name="sliderduzenle" class="btn btn-primary">Kaydet</button>
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
