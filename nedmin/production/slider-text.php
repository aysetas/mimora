<?php include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

if(isset($_POST['arama'])):
  $aranan=$_POST['ara'];
  $slidersorgu = $db -> prepare("select * from slider where slider_ad LIKE '%$aranan%' order by slider_durum DESC, slider_sira ASC limit 3");
  $slidersorgu -> execute (array());
  $sliderlistele= $slidersorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$slidersorgu ->rowCount();

else:
  $slidersorgu = $db -> prepare("select * from slider order by slider_durum DESC, slider_sira ASC limit 3");
  $slidersorgu -> execute (array());
  $sliderlistele= $slidersorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$slidersorgu ->rowCount();
endif;
   
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
                 <form action="" method="post">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ara" placeholder="Anahtar kelime...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" name="arama" type="submit">Ara</button>
                    </span>
                  </div>
                 </form>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-6">
                      
                        <h2>Slider İşlemleri
                      
                        <?php
                        
                        if(@$_GET['durum']=="ok"):
                        ?>
                      <h5 style="color:green;" align="right"><b><i>İşlem Başarılı...</i></b></h5>
                        <?php
                      elseif(@$_GET['durum']=="no"):
                        ?>
                        <h5 style="color:red;"align="right"><b><i>İşlem Başarısız...</i></b></h5>
                        <?php
                      endif;
                        ?>
                      </h2>
                   
                    </div>
                    <div align= "right" class="col-md-6">
                        <b  style="color:green;"><i>
                        <?php
                      echo $say."  Kayıt listelendi...";?>
                      </i></b>
                   
                      <a href="slider-textekle.php"><button class=" btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Ekle</button></a> 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                         
                                <th class="text-center">Birinci Başlık </th>
                                <th class="text-center">İkinci Başlık  </th>
                                <th class="text-center">üçüncü Başlık </th>
                                <th class="text-center">Dördüncü Başlık  </th>
                                <th class="text-center">Fiyatı</th>
                                <th class="text-center" style="width:80px"></th>
                                <th class="text-center" style="width:80px"></th>
                                
                    
                            </tr>
                        </thead>


                          <?php
                          
                            foreach($sliderlistele as $slidercek) {
                            ?>
                                <tbody>
                                  <tr class="odd pointer">
                                  <td class="text-center "><?php echo $slidercek['slider_baslik1'];?></td>
                                  <td class="text-center "><?php echo $slidercek['slider_baslik2'];?></td>
                                  <td class="text-center "><?php echo $slidercek['slider_baslik3'];?></td>
                                  <td class="text-center "><?php echo $slidercek['slider_baslik4'];?></td>
                                  <td class=" text-center"><?php echo $slidercek['slider_fiyat'];?></td>

                                    <td class="text-center "><a href="slider-textduzenle.php?slider_id=<?php echo $slidercek['slider_id'];?>"><button class=" btn btn-primary btn-xs " style="width:60px; ">Düzenle</button></a></td>
                                    <td class=" text-center"><a href="../netting/islem.php?slider_id=<?php echo $slidercek['slider_id'];?>&slidertextsil=ok"><button class=" btn btn-danger btn-xs" style="width:60px">Sil</button></a></td>

                                    </td>
                                  </tr>
                                </tbody>
                                <?php } ?>
                        </table>
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
<?php
include 'footer.php';
?>