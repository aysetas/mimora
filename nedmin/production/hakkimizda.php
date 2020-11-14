<?php 
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

            
                    $hakkimizdasorgu = $db -> prepare("select * from hakkimizda where hakkimizda_id=?");
                    $hakkimizdasorgu -> execute (array(1));
                    $hakkimizdacek= $hakkimizdasorgu -> Fetch(PDO::FETCH_ASSOC);       
?> 
<head>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Yönetim Paneli</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Anahtar kelime...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ara</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12"> 
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hakkımızda</h2>
                    
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Başlık <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="first-name" required="required"  name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'];?>" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="ckeditor" id="editor1"  name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik'];?> </textarea>
            
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="first-name" required="required" name="hakkimizda_resimyol" value="<?php echo $hakkimizdacek['hakkimizda_resimyol'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

  
                        <div  class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3" align="right">
                          <button type="submit" name="hakkimizdakaydet" class="btn btn-primary">Güncelle</button>
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
        <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
        </script>

<?php include 'footer.php';?>
