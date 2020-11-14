<?php include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

if(isset($_POST['arama'])):
  $aranan=$_POST['ara'];
  $galerisorgu = $db -> prepare("select * from galeri where galeri_ad LIKE '%$aranan%' order by galeri_sira ASC limit 8");
  $galerisorgu-> execute (array());
  $galerilistele= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$galerisorgu ->rowCount();

else:
  $galerisorgu = $db -> prepare("select * from galeri order by galeri_sira ASC limit 8");
  $galerisorgu-> execute (array());
  $galerilistele= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$galerisorgu ->rowCount();
endif;
   
?>

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
                   
                    <h2>Galeri İşlemleri
                  
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
                   
                      <a href="galeri-ekle.php"><button class=" btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Ekle</button></a> 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                         
                            <th class="text-center">Ürünün Resmi</th>
                            <th class="text-center">Ürünün Adı</th>
                            <th class="text-center">Ürünün Sırası</th>
                            <th class="text-center">Ürün Başlığı</th>
                            <th class="text-center">Ürünün Fiyatı</th>
                            <th class="text-center">İndirimli fiyatı</th>
                            <th class="text-center" style="width:80px"></th>
                            <th class="text-center" style="width:80px"></th>
                            
                    
                          </tr>
                        </thead>


                   <?php
                   
                    foreach($galerilistele as $galericek) {
                    ?>
                        <tbody>
                          <tr class="odd pointer">
                            <td class="text-center "><img width="120" height="120" src="../<?php echo  $galericek['galeri_resim']; ?>" alt="galeri resmi"> </td>
                            <td class="text-center "><?php echo $galericek['galeri_ad'];?></td>
                            <td class=" text-center"><?php echo $galericek['galeri_sira'];?></td>
                            <td class="text-center "><?php echo $galericek['galeri_baslik'];?></td>
                            <td class=" text-center"><?php echo $galericek['galeri_fiyat'];?></td>
                            <td class=" text-center"><?php echo $galericek['galeri_indirim'];?></td>
   
                            <td class="text-center "><a href="galeri-duzenle.php?galeri_id=<?php echo $galericek['galeri_id'];?>"><button class=" btn btn-primary btn-xs " style="width:60px">Düzenle</button></a></td>
                            <td class=" text-center"><a href="../netting/islem.php?galeri_id=<?php echo $galericek['galeri_id'];?>&galerisil=ok&galeriresimsil=<?php echo $galericek['galeri_resim'];?>"><button class=" btn btn-danger btn-xs" style="width:60px">Sil</button></a></td>

                            
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
<?php
include 'footer.php';
?>