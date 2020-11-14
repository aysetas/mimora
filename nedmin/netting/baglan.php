<?php
ob_start();
if(!isset($_SESSION))
{
session_start();
}

$host="localhost";
$db_name="mimora";
$kullanici_adi="root";
$sifre="";
try{
    $db=new PDO("mysql:host=$host; dbname=$db_name; charset=utf8; port=3308", "$kullanici_adi","$sifre");
   
    
}
catch(PDOException $mesaj){
    echo $mesaj ->getMessage();
    
    
}

?>