<?php include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

  $galerisorgu = $db -> prepare("select * from menuler order by menu_id ASC limit 8");
  $galerisorgu-> execute (array());
  $galerilistele= $galerisorgu -> FetchALL(PDO::FETCH_ASSOC); 
  $say=$galerisorgu ->rowCount();

   
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
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-6">
                   
                      <h1>Menü İşlemleri
                        <ul class="nav navbar-right panel_toolbox">
                            <?php
                            if(@$_GET['durum']=="ok"):
                            ?>
                            <h4 style="color:green; ">İşlem başarılı...</h4>
                            <?php
                              elseif(@$_GET['durum']=="no"):
                            ?>
                            <h4 style="color:red;">İşlem başarısız...</h4>
                            <?php
                            endif;
                            ?>
                        </ul>
                      </h1>
                   
                    </div>
                    <div align= "right" class="col-md-6">
                    <b  style="color:green;"><i>
                    <?php
                   echo $say."  Kayıt listelendi...";?>
                  </i></b>
                   
                      <a href="menu-ekle.php"><button class=" btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Ekle</button></a> 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <div class="table-responsive">
                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th >Menü İd</th>
                                            <th style="width:250px;">Menü Adı</th>
                                            <th>Menü Link</th>
                                            <th>Menü İcon</th>
                                            <th style="width:30px;">Düzenle</th>
                                            <th style="width:30px;">Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $menusorgu = $db -> prepare("select * from menuler");
                                        $menusorgu -> execute (array());
                                        $menuliste= $menusorgu -> FetchALL(PDO::FETCH_ASSOC);
                                        foreach($menuliste as $menucek){
                                    ?>
                                            <tr>
                                            <td><?php echo  $menucek['menu_id']; ?></td>
                                            <td><?php echo  $menucek['menu_ad']; ?></td>
                                            <td><?php echo  $menucek['menu_link']; ?></td>
                                            <td><?php echo  $menucek['menu_icon']; ?></td>
                                            <td><a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'];?>"><button class=" btn btn-primary btn-xs " style="width:60px">Düzenle</button></a></td>
                                            <td> <a href="../netting/islem.php?menu_id=<?php echo $menucek['menu_id'];?>&menusil=ok"><button class="btn btn-danger btn-xs" style="width:60px">Sil</button></a></td>
                                        </tr>
                            <?php
                            }
                            ?>
                                    
                                       
                             </tbody>
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