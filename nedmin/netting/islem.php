<?php include ("baglan.php");?>

<?php
if (isset($_POST['loggin'])) {
  $admin_kadi = $_POST['admin_kadi'];
  $admin_sifre = md5($_POST['admin_sifre']);
  if ($admin_kadi && $admin_sifre) {
      
        $sorgula = $db -> prepare("SELECT admin_kadi, admin_sifre  FROM admin WHERE admin_kadi='$admin_kadi' AND admin_sifre='$admin_sifre' ");
        $sorgula->execute(array($admin_kadi,$admin_sifre));
        $row = $sorgula->fetch(PDO::FETCH_BOTH);

      if ($sorgula->rowCount() > 0) {
        $_SESSION['admin_kadi'] = $admin_kadi;
        header('Location:../production/index.php');
      }
      else
      {
        header('Location:../production/login.php?login=no');
      }
  }


}


if(isset($_POST['menukaydet'])){
  
    $kaydet=$db->prepare("INSERT INTO menuler SET menu_ad=:menu_ad, menu_link=:menu_link, menu_icon=:menu_icon");
  
    $ekle=$kaydet->execute(array(
     'menu_ad' =>$_POST['menu_ad'],
     'menu_link'=>$_POST['menu_link'],
     'menu_icon'=>$_POST['menu_icon'] 
     ));
   
   
    if($ekle){
      header("Location:../production/menu-ekle.php?durum=ok");
    }
    else{
      header("Location:../production/menu-ekle.php?durum=no");
    }
   
  
  
}
  
if(isset($_POST['menuduzenle']))
{
  
   $menu_id=$_POST['menu_id'];
   $menuguncelle = $db->prepare( "UPDATE menuler set
        menu_ad='".$_POST['menu_ad']."',
        menu_link='".$_POST['menu_link']."',
        menu_icon='".$_POST['menu_icon']."' where menu_id='$menu_id'");
  
    $menuguncelle->execute();
  
    if($menuguncelle->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
    {
       header("Location:../production/menu-duzenle.php?durum=ok&menu_id=$menu_id");
    }
    else
    {
       header("Location:../production/menu-duzenle.php?durum=no&menu_id=$menu_id"); 
    }
  
}

//menu sil

if(isset($_GET['menusil'])) {
    
    $sil=$db->exec("DELETE FROM  menuler WHERE menu_id='".$_GET['menu_id']."'");
  
  
    if($sil){
        header("Location:../production/menuler.php?durum=ok");
    }
    else{
      header("Location:../production/menuler.php?durum=no");
    }
   
}
//hakkımızda kısmı

if(isset($_POST["hakkimizdakaydet"])){

  $hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
      hakkimizda_baslik=:baslik,
      hakkimizda_icerik=:icerik,
      hakkimizda_resimyol=:resimyol
      WHERE hakkimizda_id=1");

  $update=$hakkimizdakaydet ->execute(array(
      'baslik'=>$_POST['hakkimizda_baslik'],
      'icerik'=>$_POST['hakkimizda_icerik'],
      'resimyol'=>$_POST['hakkimizda_resimyol']
  ));
  
  if($update){
      Header("location:../production/hakkimizda.php ? durum=ok");
  }
    else{
      Header("location:../production/hakkimizda.php ? durum=no");
    }  
  

}
//parallax kısmı

if(isset($_POST["parallaxkaydet"])){

  $parallaxkaydet=$db->prepare("UPDATE parallax SET
      parallax_baslik1=:baslik1,
      parallax_baslik2=:baslik2,
      parallax_icerik=:icerik,
      parallax_resimyol=:resimyol
      WHERE parallax_id=2");

  $update=$parallaxkaydet ->execute(array(
      'baslik1'=>$_POST['parallax_baslik1'],
      'baslik2'=>$_POST['parallax_baslik2'],
      'icerik'=>$_POST['parallax_icerik'],
      'resimyol'=>$_POST['parallax_resimyol']
  ));
  
  if($update){
      Header("location:../production/parallax.php ? durum=ok");
  }
    else{
      Header("location:../production/parallax.php ? durum=no");
    }  
  

}
//*****AYARLAR****

//Genel Ayarlar kısmı

if(isset($_POST["genelayarkaydet"])){

  $genelayarkaydet=$db->prepare("UPDATE ayar SET
      ayar_siteurl=:siteurl,
      ayar_title=:title,
      ayar_logo=:logo,
      ayar_keywords=:keywords,
      ayar_description=:description,
      ayar_author=:author,
      ayar_text=:text,
      ayar_text2=:text2
      WHERE ayar_id=1");

  $update=$genelayarkaydet ->execute(array(
      'siteurl'=>$_POST['ayar_siteurl'],
      'title'=>$_POST['ayar_title'],
      'logo'=>$_POST['ayar_logo'],
      'keywords'=>$_POST['ayar_keywords'],
      'description'=>$_POST['ayar_description'],
      'author'=>$_POST['ayar_author'],
      'text'=>$_POST['ayar_text'],
      'text2'=>$_POST['ayar_text2']
  ));
  
  if($update){
      Header("location:../production/genel-ayar.php ? durum=ok");
  }
    else{
      Header("location:../production/genel-ayar.php ? durum=no");
    }  
  

}
//İletişim Ayar kısmı

if(isset($_POST["iletisimayarkaydet"])){

  $iletisimayarkaydet=$db->prepare("UPDATE ayar SET
      ayar_tel=:tel,
      ayar_fax=:fax,
      ayar_mail=:mail,
      ayar_adres=:adres,
      ayar_ilce=:ilce,
      ayar_il=:il
      WHERE ayar_id=1");

  $update=$iletisimayarkaydet ->execute(array(
      'tel'=>$_POST['ayar_tel'],
      'fax'=>$_POST['ayar_fax'],
      'mail'=>$_POST['ayar_mail'],
      'adres'=>$_POST['ayar_adres'],
      'ilce'=>$_POST['ayar_ilce'],
      'il'=>$_POST['ayar_il']
  ));
  
  if($update){
      Header("location:../production/iletisim-ayar.php ? durum=ok");
  }
    else{
      Header("location:../production/iletisim-ayar.php ? durum=no");
    }  
  

}

//sosyal medya ayar kısmı

if(isset($_POST["sosyalayarkaydet"])){
  $sosyalayarkaydet=$db-> prepare("UPDATE ayar SET
   ayar_twitter=:twitter,
   ayar_googleplus=:googleplus,
   ayar_facebook=:facebook,
   ayar_instagram=:instagram,
   ayar_youtube=:youtube
   where ayar_id=1");

   $update=$sosyalayarkaydet ->execute(array(
    'twitter'=>$_POST['ayar_twitter'],
    'googleplus'=>$_POST['ayar_googleplus'],
    'facebook'=>$_POST['ayar_facebook'],
    'instagram'=>$_POST['ayar_instagram'],
    'youtube'=>$_POST['ayar_youtube']    
   ));

  if($update){
    Header("location:../production/sosyal-ayar.php ? durum=ok");
  }
  else{
    Header("location:../production/sosyal-ayar.php ? durum=no");
  }
  


}

//Api ayar kısmı

if(isset($_POST['apiayarkaydet'])){
  $apiayarkaydet=$db-> prepare("UPDATE ayar SET
  ayar_recapctha=:recapctha,
  ayar_googlemap=:googlemap,
  ayar_analystic=:analystic
  where ayar_id=1");


  $update=$apiayarkaydet->execute(array(
    'recapctha'=>$_POST['ayar_recapctha'],
    'googlemap'=>$_POST['ayar_googlemap'],
    'analystic'=>$_POST['ayar_analystic']
  ));

  if($update){
    Header("location:../production/api-ayar.php ? durum=ok");
  }
  else{
    Header("location:../production/api-ayar.php ? durum=no");
  }


}
//Mail ayar kısmı

if(isset($_POST['mailayarkaydet'])){
  $mailayarkaydet=$db-> prepare("UPDATE ayar SET
  ayar_smtphost =:smtphost,
  ayar_smtpuser=:smtpuser,
  ayar_smtppassword=:smtppassword,
  ayar_smtpport =:smtpport 
  where ayar_id=1");


  $update=$mailayarkaydet->execute(array(
    'smtphost'=>$_POST['ayar_smtphost'],
    'smtpuser'=>$_POST['ayar_smtpuser'],
    'smtppassword'=>$_POST['ayar_smtppassword'],
    'smtpport'=>$_POST['ayar_smtpport']
  ));

  if($update){
    Header("location:../production/mail-ayar.php ? durum=ok");
  }
  else{
    Header("location:../production/mail-ayar.php ? durum=no");
  }


}

//galeri kısmı

if(isset($_POST['galerikaydet'])) {

  $uploads_dir='../galerim';
 
  @$tmp_name = $_FILES['galeri_resim']["tmp_name"];
 
  @$name = $_FILES['galeri_resim']["name"];
 
  $benzersizsayi1=rand(20000,32000);
 
  $benzersizsayi2=rand(20000,32000);
 
  $benzersizsayi3=rand(20000,32000);
 
  $benzersizsayi4=rand(20000,32000);
 
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
 
  $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
 
  @move_uploaded_file($tmp_name, $uploads_dir . "/" . $benzersizad . $name);  
 
    $resimekle=$db->prepare("INSERT INTO galeri SET
      galeri_resim=:resim,
      galeri_ad=:ad,
      galeri_sira=:sira,
      galeri_baslik=:baslik,
      galeri_fiyat=:fiyat,
      galeri_indirim=:indirim"
    );

    $ekle=$resimekle->execute(array(
     'resim' =>$refimgyol,
     'ad'=>$_POST['galeri_ad'],
     'sira'=>$_POST['galeri_sira'],
     'baslik'=>$_POST['galeri_baslik'],
     'fiyat'=>$_POST['galeri_fiyat'],
     'indirim'=>$_POST['galeri_indirim']
     
     ));

  if($ekle) {
 
   header('Location:../production/galeri-ekle.php?durum=ok');
 
 
  } else {
 
   header('Location:../production/galeri-ekle.php?durum=no');
  }
}


//galeri sil

if(isset($_GET['galerisil'])) {
  
  $sil=$db->exec("DELETE FROM  galeri WHERE galeri_id='".$_GET['galeri_id']."'");
 
   if($sil){
    
    $resim_sil=$_GET['galeriresimsil']; //Dosyadan(Klasörden) resim silme kodu
    unlink("../$resim_sil");
    header("Location:../production/galeri.php?durum=ok");

   }
   else{
    header("Location:../production/galeri.php?durum=no");
   }
 }

//galeri duzenle

if(isset($_POST["galeriduzenle"])){

  if($_FILES['galeri_resim']["size"]>0){

    $uploads_dir='galerim';
 
    @$tmp_name = $_FILES['galeri_resim']["tmp_name"];
   
    @$name = $_FILES['galeri_resim']["name"];
   
    $benzersizsayi1=rand(20000,32000);
   
    $benzersizsayi2=rand(20000,32000);
   
    $benzersizsayi3=rand(20000,32000);
   
    $benzersizsayi4=rand(20000,32000);
   
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
   
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
   
    @move_uploaded_file($tmp_name, $uploads_dir . "/" . $benzersizad . $name);  
 
  
      $galeriguncelle = $db->prepare( "UPDATE galeri SET
          galeri_ad=:ad, 
          galeri_sira=:sira,
          galeri_baslik=:baslik,
          galeri_fiyat=:fiyat,
          galeri_indirim=:indirim,
          galeri_resim=:resim
         where galeri_id={$_POST['galeri_id']}"
      );
  
      
      $guncelle=$galeriguncelle->execute(array(
        'resim' =>$refimgyol,
        'ad'=>$_POST['galeri_ad'],
        'sira'=>$_POST['galeri_sira'],
        'baslik'=>$_POST['galeri_baslik'],
        'fiyat'=>$_POST['galeri_fiyat'],
        'indirim'=>$_POST['galeri_indirim']
      ));
 
      $galeri_id=$_POST['galeri_id'];
      if($guncelle) //Bu kısım PDO için değiştirilmiştir.

      {
        header("Location:../production/galeri-duzenle.php?durum=ok&galeri_id=$galeri_id");

      }
        else
        {
        header("Location:../production/galeri-duzenle.php?durum=no&galeri_id=$galeri_id"); 
        }   
  }


  else{
    $galeriguncelle = $db->prepare( "UPDATE galeri SET 
      galeri_ad=:ad, 
      galeri_sira=:sira,
      galeri_baslik=:baslik,
      galeri_fiyat=:fiyat,
      galeri_indirim=:indirim
      where galeri_id={$_POST['galeri_id']}"
    );


    $guncelle=$galeriguncelle->execute(array(
      'ad'=>$_POST['galeri_ad'],
      'sira'=>$_POST['galeri_sira'],
      'baslik'=>$_POST['galeri_baslik'],
      'fiyat'=>$_POST['galeri_fiyat'],
      'indirim'=>$_POST['galeri_indirim']
    ));

    $galeri_id=$_POST['galeri_id'];
    if($guncelle) //Bu kısım PDO için değiştirilmiştir.
    {
      header("Location:../production/galeri-duzenle.php?durum=ok&galeri_id=$galeri_id");
    }
      else
      {
      header("Location:../production/galeri-duzenle.php?durum=no&galeri_id=$galeri_id"); 
     } 
 
  }
}



//slider kısmı


if(isset($_POST["sliderkaydet"])){

  $uploads_dir = '../uploads';
 
  @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
 
  @$name = $_FILES['slider_resimyol']["name"];
 
  $benzersizsayi1=rand(20000,32000);
 
  $benzersizsayi2=rand(20000,32000);
 
  $benzersizsayi3=rand(20000,32000);
 
  $benzersizsayi4=rand(20000,32000);
 
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
 
  $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
 
  @move_uploaded_file($tmp_name, $uploads_dir . "/" . $benzersizad . $name);

    $kaydet=$db->prepare("INSERT INTO slider SET
      slider_ad=:ad, 
      slider_sira=:sira,
      slider_durum=:durum,
      slider_resimyol=:resimyol");

    $ekle=$kaydet ->execute(array(
      'ad' => $_POST['slider_ad'],
      'sira' => $_POST['slider_sira'],
      'durum' => $_POST['slider_durum'],
      'resimyol'=>$refimgyol
    ));

    if($ekle){
        Header("location:../production/slider.php ? durum=ok");
    }
      else{
        Header("location:../production/slider.php ? durum=no");
      }  


}

//Slider Sil

if(isset($_GET['slidersil'])=="ok"){ 

  $sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
  $kontrol=$sil->execute(array(

    'slider_id'=> $_GET['slider_id']
  ));

    if($kontrol){
      $resim_sil=$_GET['sliderresimsil']; //Dosyadan(Klasörden) resim silme kodu
      unlink("../../$resim_sil");
    Header("location:../production/slider.php ? durum=ok");
      }
    else{
    Header("location:../production/slider.php ? durum=no");
      }  

}

//slider Düzenle

if(isset($_POST["sliderduzenle"])){

  if($_FILES['slider_resimyol']["size"]>0){


    $uploads_dir = '../uploads';
  
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
  
    @$name = $_FILES['slider_resimyol']["name"];
  
    $benzersizsayi1=rand(20000,32000);
  
    $benzersizsayi2=rand(20000,32000);
  
    $benzersizsayi3=rand(20000,32000);
  
    $benzersizsayi4=rand(20000,32000);
  
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
  
    @move_uploaded_file($tmp_name, $uploads_dir . "/" . $benzersizad . $name);


          $duzenle=$db->prepare("UPDATE slider SET
          slider_ad=:ad, 
          slider_sira=:sira,
          slider_durum=:durum,
          slider_resimyol=:resimyol

        WHERE slider_id={$_POST['slider_id']}");

        $update=$duzenle ->execute(array(
        'ad' => $_POST['slider_ad'],
        'sira' => $_POST['slider_sira'],
        'durum' => $_POST['slider_durum'],
        'resimyol'=>$refimgyol

      ));


        $slider_id=$_POST['slider_id'];

        if($update){
              Header("location:../production/slider-duzenle.php?durum=ok&slider_id=$slider_id");
                  }
        else{
            Header("location:../production/slider-duzenle.php?durum=no&slider_id=$slider_id");
            } 



  }
  else{

    $duzenle=$db->prepare("UPDATE slider SET
      slider_ad=:ad, 
      slider_sira=:sira,
      slider_durum=:durum
    WHERE slider_id={$_POST['slider_id']}");

    $update=$duzenle ->execute(array(
        'ad' => $_POST['slider_ad'],
      'sira' => $_POST['slider_sira'],
      'durum' => $_POST['slider_durum']
    
    ));


    $slider_id=$_POST['slider_id'];
    
    if($update){
        Header("location:../production/slider-duzenle.php?durum=ok&slider_id=$slider_id");
    }
      else{
        Header("location:../production/slider-duzenle.php?durum=no&slider_id=$slider_id");
      } 
  }

}

//Slidertext ekle


if(isset($_POST["slidertextkaydet"])){

    $kaydet=$db->prepare("INSERT INTO slider SET
      slider_baslik1=:baslik1, 
      slider_baslik2=:baslik2,
      slider_baslik3=:baslik3, 
      slider_baslik4=:baslik4,
      slider_fiyat=:fiyat");

    $ekle=$kaydet ->execute(array(
      'baslik1' => $_POST['slider_baslik1'],
      'baslik2' => $_POST['slider_baslik2'],
      'baslik3' => $_POST['slider_baslik3'],
      'baslik4' => $_POST['slider_baslik4'],
      'fiyat' => $_POST['slider_fiyat']
    ));

    if($ekle){
        Header("location:../production/slider-text.php ? durum=ok");
    }
      else{
        Header("location:../production/slider-text.php ? durum=no");
      }  


}

//slider text sil

if(isset($_GET['slidertextsil'])=="ok"){ 

  $sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
  $kontrol=$sil->execute(array(

    'slider_id'=> $_GET['slider_id']
  ));

    if($kontrol){
    Header("location:../production/slider-text.php ? durum=ok");
      }
    else{
    Header("location:../production/slider-text.php ? durum=no");
      }  

}
//slider text düzenle

if(isset($_POST['slidertextduzenle']))
{
  
   $slider_id=$_POST['slider_id'];
   $guncelle = $db->prepare( "UPDATE slider set
        slider_baslik1='".$_POST['slider_baslik1']."',
        slider_baslik2='".$_POST['slider_baslik2']."',
        slider_baslik3='".$_POST['slider_baslik3']."',
        slider_baslik4='".$_POST['slider_baslik4']."',
        slider_fiyat='".$_POST['slider_fiyat']."'
         where slider_id='$slider_id'");
  
    $guncelle->execute();
  
    if($guncelle->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
    {
       header("Location:../production/slider-textduzenle.php?durum=ok&slider_id=$slider_id");
    }
    else
    {
       header("Location:../production/slider-textduzenle.php?durum=no&slider_id=$slider_id"); 
    }
  
}


//Kategori Kısmı 


if(isset($_POST["kategorikaydet"])){

  $uploads_dir = '../uploads';
 
  @$tmp_name = $_FILES['kategori_resimyol']["tmp_name"];
 
  @$name = $_FILES['kategori_resimyol']["name"];
 
  $benzersizsayi1=rand(20000,32000);
 
  $benzersizsayi2=rand(20000,32000);
 
  $benzersizsayi3=rand(20000,32000);
 
  $benzersizsayi4=rand(20000,32000);
 
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
 
  $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
 
  @move_uploaded_file($tmp_name, $uploads_dir . "/" . $benzersizad . $name);

  $kaydet=$db->prepare("INSERT INTO kategori SET
      kategori_ad=:ad, 
      kategori_baslik=:baslik,
      kategori_baslik2=:baslik2,
      kategori_link=:link,
      kategori_sira=:sira,
      kategori_resimyol=:resimyol");

  $ekle=$kaydet ->execute(array(
      'ad' => $_POST['kategori_ad'],
      'baslik'=> $_POST['kategori_baslik'],
      'baslik2'=> $_POST['kategori_baslik2'],
      'link'=> $_POST['kategori_link'],
      'sira'=> $_POST['kategori_sira'],
      'resimyol'=>$refimgyol
  ));

  if($ekle){
      header('Location:../production/kategori-ekle.php?durum=ok');

  }
  else{
        Header('location:../production/kategori-ekle.php?durum=no');
  }  


}

//Kategori Sil

if(isset($_GET['kategorisil'])=="ok"){ 

  $sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
  $kontrol=$sil->execute(array(

    'kategori_id'=> $_GET['kategori_id']
  ));

    if($kontrol){
      $resim_sil=$_GET['kategoriresimsil']; //Dosyadan(Klasörden) resim silme kodu
      unlink("../../$resim_sil");
    Header("location:../production/kategori.php ? durum=ok");
      }
    else{
    Header("location:../production/kategori.php ? durum=no");
      }  

}

//Kategori Düzenle

if(isset($_POST["kategoriduzenle"])){

  if($_FILES['kategori_resimyol']["size"]>0){


    $uploads_dir = '../galerim';
  
    @$tmp_name = $_FILES['kategori_resimyol']["tmp_name"];
  
    @$name = $_FILES['kategori_resimyol']["name"];
  
    $benzersizsayi1=rand(20000,32000);
  
    $benzersizsayi2=rand(20000,32000);
  
    $benzersizsayi3=rand(20000,32000);
  
    $benzersizsayi4=rand(20000,32000);
  
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
  
    @move_uploaded_file($tmp_name, $uploads_dir . "/" . $benzersizad . $name);


          $duzenle=$db->prepare("UPDATE kategori SET
          kategori_ad=:ad, 
          kategori_baslik=:baslik,
          kategori_baslik2=:baslik2,
          kategori_link=:link,
          kategori_sira=:sira,
          kategori_resimyol=:resimyol

        WHERE kategori_id={$_POST['kategori_id']}");

        $update=$duzenle ->execute(array(
        'ad' => $_POST['kategori_ad'],
        'baslik' => $_POST['kategori_baslik'],
        'baslik2' => $_POST['kategori_baslik2'],
        'link' => $_POST['kategori_link'],
        'sira' => $_POST['kategori_sira'],
        'resimyol'=>$refimgyol

      ));


        $kategori_id=$_POST['kategori_id'];

        if($update){
              Header("location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");
                  }
        else{
            Header("location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
            } 
  }
  else{

      $duzenle=$db->prepare("UPDATE kategori SET
      kategori_ad=:ad, 
      kategori_baslik=:baslik,
      kategori_baslik2=:baslik2,
      kategori_link=:link,
      kategori_sira=:sira
      WHERE kategori_id={$_POST['kategori_id']}");

    $update=$duzenle ->execute(array(
    'ad' => $_POST['kategori_ad'],
    'baslik' => $_POST['kategori_baslik'],
    'baslik2' => $_POST['kategori_baslik2'],
    'link' => $_POST['kategori_link'],
    'sira' => $_POST['kategori_sira']

    ));


    $kategori_id=$_POST['kategori_id'];

    if($update){
          Header("location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");
              }
    else{
        Header("location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
        } 

  }

}





?>