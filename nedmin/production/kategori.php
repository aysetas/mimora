<?php include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

if(isset($_POST['arama'])):
  $aranan=$_POST['ara'];
  $kategorisorgu = $db -> prepare("select * from Kategori where kategori_ad LIKE '%$aranan%' order by kategori_sira ASC limit 8");
  $kategorisorgu-> execute (array());
  $kategorilistele= $kategorisorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$kategorisorgu ->rowCount();

else:
  $kategorisorgu = $db -> prepare("select * from kategori order by kategori_sira ASC limit 8");
  $kategorisorgu-> execute (array());
  $kategorilistele= $kategorisorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$kategorisorgu ->rowCount();
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
                   
                    <h2>Kategori İşlemleri
                  
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
                   
                      <a href="kategori-ekle.php"><button class=" btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Ekle</button></a> 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                         
                            <th class="text-center">Kategori Resim </th>
                            <th class="text-center">Kategori Adı </th>
                            <th class="text-center">Birinci Başlık</th>
                            <th class="text-center">İkinci Başlık</th>
                            <th class="text-center">Kategori Link</th>
                            <th class="text-center">Kategori Sıra </th>
                            <th class="text-center" style="width:80px"></th>
                            <th class="text-center" style="width:80px"></th>
                            
                    
                          </tr>
                        </thead>


                   <?php
                   
                    foreach($kategorilistele as $kategoricek) {
                    ?>
                        <tbody>
                          <tr class="odd pointer">
                           <td class="text-center "><img width="120" height="120" src="../<?php echo $kategoricek['kategori_resimyol']; ?>" alt="kategori resmi"> </td>
                            <td class="text-center "><?php echo $kategoricek['kategori_ad'];?></td>
                            <td class="text-center "><?php echo $kategoricek['kategori_baslik'];?></td>
                            <td class=" text-center"><?php echo $kategoricek['kategori_baslik2'];?></td>
                            <td class=" text-center"><?php echo $kategoricek['kategori_link'];?></td>
                            <td class=" text-center"><?php echo $kategoricek['kategori_sira'];?></td>
   
                            <td class="text-center "><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id'];?>"><button class=" btn btn-primary btn-xs " style="width:60px">Düzenle</button></a></td>
                            <td class=" text-center"><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id'];?>&kategorisil=ok&kategoriresimsil=<?php echo $kategoricek['kategori_resimyol'];?>"><button class=" btn btn-danger btn-xs" style="width:60px">Sil</button></a></td>

                          
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