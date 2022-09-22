<h1>Мои книги</h1>
<?php if ($book_copies) { ?>
    <table border="1" style="text-align: center;">
        <tr>
            <td>Название книги</td>
            <td>Вернуть до</td>
        </tr>
        <?php foreach ($book_copies as $book_copy) { ?>
            <tr>
                <td>
                    <a href="book.php?id=<?=$book_copy['book_id']?>"><?=$books[$book_copy['book_id']]['title']?></a>
                </td>
                <td><?=date(DATE_FORMAT, $book_copy['return_date'])?></td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <p>Вы не должны никаких книг!</p>
<?php } ?>