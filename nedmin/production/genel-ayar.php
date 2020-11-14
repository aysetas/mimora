<?php 
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

            
                    $ayarsorgu = $db -> prepare("select * from ayar where ayar_id=?");
                    $ayarsorgu -> execute (array(1));
                    $ayarcek= $ayarsorgu -> Fetch(PDO::FETCH_ASSOC);       
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
                    <h2>Genel Ayarlar</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                    <?php
                    if(@$_GET['durum']=="ok"):
                    ?>
                    <b style="color:green;">GÜNCELLEME BAŞARILI...</b>
                    <?php
                   elseif(@$_GET['durum']=="no"):
                    ?>
                    <b style="color:red;">GÜNCELLEME BAŞARISIZ...</b>
                    <?php
                   endif;
                    ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                   
                                           
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Adresi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required"  name="ayar_siteurl" value="<?php echo $ayarcek['ayar_siteurl'];?>" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_title" value="<?php echo $ayarcek['ayar_title'];?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Logosu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_logo" value="<?php echo $ayarcek['ayar_logo'];?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Açıklaması <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_description" value="<?php echo $ayarcek['ayar_description'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Anahtar Kelimeler <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Yazar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_author" value="<?php echo $ayarcek['ayar_author'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sitenin Birinci Yazısı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_text" value="<?php echo $ayarcek['ayar_text'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sitenin ikinci Yazısı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_text2" value="<?php echo $ayarcek['ayar_text2'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                          <button type="submit" name="genelayarkaydet" class="btn btn-primary">Güncelle</button>
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
