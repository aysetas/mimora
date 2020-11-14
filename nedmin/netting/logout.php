<?php
session_start();
session_destroy();

header('Location:../production/login.php');
?>