<?php
session_start();
$dil=strip_tags($_GET["dil"]);
if($dil=="tr" || $dil=="en"):

    $_SESSION["dil"]=$dil;
    header("location:index.php");

else:
    header("location:index.php");

endif;
?>