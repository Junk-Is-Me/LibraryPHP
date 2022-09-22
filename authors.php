<?php
    require_once 'src/Base.php';
    
    $title = 'Авторы';
    $content = 'authors';
    
    $authors = $db->getRows('authors', order_by: 'name');
    
    require_once 'html/main.php';
?>