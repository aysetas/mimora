<?php include ("nedmin/netting/baglan.php");?>

<!DOCTYPE html>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
    $ayarsor=$db ->prepare("select * from ayar where ayar_id=?");
    $ayarsor->execute(array(1));
    $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

  ?>
   
    <title><?php echo $ayarcek['ayar_title'];?></title>	
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- RESPONSİVE hakkında bilgi verir -->
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>" />
	<meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
    

    <title>Mimora</title>
   
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="shortcut icon" href="img/icon.png">
    <!-- bxSlider CSS file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <link href="css/jquery.bxslider.min.css" rel="stylesheet" />
    

    <body cz-shortcut-listen="true" class="bodymenu">

       <header>
            <div class="header-top">
                <div class="container">
                    <div class="top-header">

                        <div class="social-contact">
                            <ul >
                                <li class="social__item">
                                    <a href="<?php echo $ayarcek['ayar_twitter'];?>" class="social__link">
                                    <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="<?php echo $ayarcek['ayar_googleplus'];?>"class="social__link">
                                    <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="<?php echo $ayarcek['ayar_facebook'];?>" class="social__link">
                                    <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="<?php echo $ayarcek['ayar_youtube'];?>" class="social__link">
                                    <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="<?php echo $ayarcek['ayar_instagram'];?>" class="social__link">
                                    <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <p><?php echo $ayarcek['ayar_text'];?> <span>“<?php echo $ayarcek['ayar_text2'];?>”</span></p>
                        </div>

                      
                            <div class="header-top-nav">
                                <div class="language-selector header-top-nav__item">
                                    <div class="dropdown header-top__dropdown">
                                        <a class="dropdown-toggle" id="languageID" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            EN-GB
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="languageID">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="currency-selector header-top-nav__item">
                                    <div class="dropdown header-top__dropdown">
                                        
                                        <a class="dropdown-toggle" id="currencyID" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            USD
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="currencyID">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info header-top-nav__item">
                                    <div class="dropdown header-top__dropdown">
                                        <a class="dropdown-toggle" id="userID" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           Hesabım
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="userID">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>

                             <!--ikinci başlık-->
            <div class="header-middle header-top-1">
                <div class="container">
                    <div class="row">
                       <div class="contact-info">
                         <img src="img/icon_phone.png" alt="Phone Icon">
                         <p>Call us <br> Free Support:<?php echo $ayarcek['ayar_tel'];?></p>
                       </div>

                        <div class="text-center">
                          <a href="index.php" class="logo-box mb-md--30">
                          <img src="<?php echo $ayarcek['ayar_logo'];?>" alt="logo">
                          </a>
                        </div>  
                    </div>
                </div>
            </div>
                        <!--üçüncü başlık-->
            <div class="headerMenu">
                <div class="container">
                    <div class="menuBar">
                        <div class="mobil"><i class="fas fa-bars">  MENU</i></div>
                        <div class="menuLink">
               
                            <ul >
                                <?php                
                                    $menu_id=@$_GET['menu_id'];
                                    $menusorgu = $db -> prepare("select * from menuler order by menu_id='$menu_id' ASC");
                                    $menusorgu -> execute (array());
                                    $menuliste= $menusorgu -> FetchALL(PDO::FETCH_ASSOC);
                                    foreach($menuliste as $menucek){
                                    
                                ?>
                                <li><a href="<?php echo $menucek['menu_link'];?>"><?php echo $menucek['menu_ad'];?></a></li>
                                <?php
                                 }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </header>