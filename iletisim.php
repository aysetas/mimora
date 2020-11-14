<?php
include("header.php");
?>
        <section class="page">
            <div class="pageTitle">
                <h1><?php echo __d('İletişim');?></h1>
            </div>
    
        </section>

        <section class="contact">              
            <div class="contactMenu">
                <div class="col2">
                        <div class="googleMap">
                            <iframe src="<?php echo $ayarcek['ayar_googlemap'];?>" width="1349" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                </div>
                <div class="col2">
                    <div class="container">
                        <div class="contactLower">
                            <h3 ><?php echo __d('iletisimformu');?></h3>
                            <form class="contact-form" action="#" method="post" enctype="multipart/form-data">
                                <label><span class="text-form"><?php echo __d('ad');?><sup>*</sup></span>
                                  <input type="text">
                                </label>
                                <label><span class="text-form">E-mail<sup>*</sup></span>
                                  <input type="text">
                                </label>
                                <label><span class="text-form"><?php echo __d('mesaj');?><sup>*</sup></span>
                                    <input type="text">
                                  </label>
                                <div class="button"> 
                                    <a  href="#"><?php echo __d('gonder');?></a>
                                </div>
                            </form>
                        </div>
                        
                     
                    </div>
                </div>

            </div>
        </section>



<?php
include("footer.php");
?>