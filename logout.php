<?php 
    session_start(); 
    $_SESSION = array(); 
    session_destroy(); 
    header('location:index.php'); //轉跳回登入頁面

?>