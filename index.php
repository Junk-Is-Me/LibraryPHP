<?php
require_once "src/config.php";

$db = Database::getDBO();

$title = 'Библиотека';
$content = 'index';

$books = $db->getCountRows('books');
$books_copies = $db->getCountRows('book_copies');
$authors = $db->getCountRows('authors');
$users = $db->getCountRows('users');
$book_copies_avaliable = $db->getCountRows('book_copies', '`return_date` IS NULL');

require_once 'html/main.php';
