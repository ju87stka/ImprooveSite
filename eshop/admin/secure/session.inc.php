<?php
session_start();
if(!isset($_SESSION['admin'])){ 
    header('Location: secure/login.php?ref=http://localhost'. $_SERVER['REQUEST_URI']);
    exit;
}
