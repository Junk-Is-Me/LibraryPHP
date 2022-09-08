<?php

require_once 'src/base.php';

$title = 'Книги';
$content = 'books';

$books = $db->getRows('books', orderBy: 'title');

require_once 'html/main.php';
