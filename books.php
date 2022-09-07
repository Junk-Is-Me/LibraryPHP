<?php
require_once "src/config.php";

$db = Database::getDBO();

$title = 'Книги';
$content = 'books';

$books = $db->getRows('books');

require_once 'html/main.php';
