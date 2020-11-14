<?php
include 'header.php';
include '../netting/baglan.php';
include '../netting/islem.php';

$menu_id=@$_GET['menu_id'];
$menusorgula = $db -> prepare("select * from menuler where menu_id='$menu_id'");
$menusorgula -> execute (array());
$menucek= $menusorgula -> Fetch(PDO::FETCH_ASSOC);


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
                                <h1 class="page-head-line">MENÜ DÜZENLE </h1>
                                <ul class="nav navbar-right panel_toolbox">
                                    <?php
                                    if(@$_GET['durum']=="ok"):
                                    ?>
                                    <b style="color:green;">Menü düzenlendi...</b>
                                    <?php
                                    elseif(@$_GET['durum']=="no"):
                                    ?>
                                    <b style="color:red;">Menü düzenlenemedi..</b>
                                    <?php
                                    endif;
                                    ?>
                                </ul>
                                
            
                            </div>
                           
                              <div class="clearfix"></div>
                            
                        </div>
                        <div class="x_content">
                        
                       
                            <form action="../netting/islem.php" method="POST">

                                        
                                <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id'];?>">   <!-- /gizli post gönderme"""-->

                                <div class=" col-md-12">   
                                    <div class="form-group  col-md-6">
                                        <label>Menü Adı</label>  
                                                        
                                        <input class="form-control" type="text" name="menu_ad"  value="<?php echo $menucek['menu_ad'];?>">
                                    </div>
                                </div>
                                <div class=" col-md-12">   
                                    <div class="form-group  col-md-6">
                                        <label>Menü Linki</label>                   
                                        <input class="form-control" type="text" name="menu_link" value="<?php echo $menucek['menu_link'];?>">
                                    </div>
                                </div>
                                <div class=" col-md-12">   
                                    <div class="form-group  col-md-6">
                                        <label>Menü İconu</label>                   
                                        <input class="form-control" type="text" name="menu_icon"  value="<?php echo $menucek['menu_icon'];?>">
                                    </div>
                                </div>
                                
                                <div class=" col-md-12 ">
                                    <div class="form-group  col-md-3">               
                                        <input style="width:%100" class="btn btn-success" type="submit" name="menuduzenle" value="Menü Düzenle">
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