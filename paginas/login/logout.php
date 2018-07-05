<?php 
    
    session_start();
    
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $_SESSION['admin'] = false;
    header('location:../home.php');

?>