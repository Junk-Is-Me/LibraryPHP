<?php

require_once 'src/base.php';

$id = $request->id ?? 0;
if (is_numeric($id)) {
    $book = $db->getRowById('books', $id);
    if ($book) {
        $title = $book['title'];
        $content = 'book';
        $avaliable_copies = $db->getCountRows('book_copies', '`book_id` = ? AND `return_date` IS NULL', [$book['id']]);
        $unavaliable_copies = $db->getCountRows('book_copies', '`book_id` = ? AND `return_date` IS NOT NULL', [$book['id']]);
        require_once 'html/main.php';
    } else {
        echo exit;
    }
}
to404();
