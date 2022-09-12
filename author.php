<?php
require_once 'src/base.php';

$id = $request->id ?? 0;
if (is_numeric($id)) {
    $author = $db->getRowById('authors', $id);
    if ($author) {
        $title = $author['name'];
        $content = 'author';
        $books = $db->getRows('books', '`author_id` = ?', [$author['id']], 'title');
        require_once 'html/main.php';
        exit;
    }
}
to404();
