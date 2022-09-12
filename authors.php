<?php
require_once 'src/base.php';

$title = 'Авторы';
$content = 'authors';

$authors = $db->getRows('authors', orderBy: 'name');

require_once 'html/main.php';
