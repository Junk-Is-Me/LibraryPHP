<h1>Авторы Книг</h1>
<ul>
    <?php foreach ($authors as $author) { ?>
        <li>
            <a href="author.php?id=<?= $author['id'] ?>"><?= $author['name'] ?></a>
        </li>
    <?php } ?>
</ul>