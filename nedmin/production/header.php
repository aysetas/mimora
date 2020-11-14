<?php 
include '../netting/baglan.php';


            
    $ayarsorgu = $db -> prepare("select * from ayar where ayar_id=?");
    $ayarsorgu -> execute (array(1));
    $ayarcek= $ayarsorgu -> Fetch(PDO::FETCH_ASSOC);       
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yönetim Paneli</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!--  Sliderda reslim ekleme için BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>
             <img alt="<?php echo $ayarcek['ayar_title']?> logosu" width="140" height="40" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src=../../img/logo.png></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?php echo $_SESSION['admin_kadi'];?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />
         
            <?php include 'sidebar.php';?>

          
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['admin_kadi'];?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul style="width:40% " class="dropdown-menu dropdown-usermenu pull-right">
                    <li style="width:100%; "><a href="login.php"><b>Güvenli Çıkış </b><i style="font-size:12px; " class="fas fa-sign-out-alt"></i></a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->