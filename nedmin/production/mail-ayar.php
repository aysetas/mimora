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
                    <h2>Mail Ayarlar</h2>
                    
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MailSmtp Host <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required"  name="ayar_smtphost" value="<?php echo $ayarcek['ayar_smtphost'];?>" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MailSmtp User <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_smtpuser" value="<?php echo $ayarcek['ayar_smtpuser'];?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MailSmtp Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_smtppassword" value="<?php echo $ayarcek['ayar_smtppassword'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MailSmtp Port<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="ayar_smtpport" value="<?php echo $ayarcek['ayar_smtpport'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                          <button type="submit" name="mailayarkaydet" class="btn btn-primary">Güncelle</button>
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
