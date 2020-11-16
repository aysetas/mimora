<?php

function __d($key){
    
    $dil = $_SESSION["dil"];
    $fileName = __DIR__.'/dil/translate.'.$dil.'.php';
    if(file_exists($fileName)){
        $dilPack = require $fileName;
        if(isset($dilPack[$key])){
            return $dilPack[$key];
        }
        return $key;
    }
    else{
        echo 'dil dosyası yok'. $fileName;
        die();
    }


}
?>