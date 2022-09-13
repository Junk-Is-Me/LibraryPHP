<?php
require_once 'src/base.php';

if (!$auth_user) {
    to403();
}

$title = 'Мои книги';
$content = 'mybooks';

$book_copies = $db->getRows('book_copies', '`user_id` = ?', [$auth_user['id']], 'return_date');

$ids = [];
foreach ($book_copies as $book_copy) {
    $ids[] = $book_copy['book_id'];
}
$ids = array_values(array_unique($ids));
$book = $db->getRowsByIds('books', $ids);

print_r($ids);

require_once 'html/main.php';
