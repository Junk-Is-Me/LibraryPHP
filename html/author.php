<h1><?= $author['name'] ?></h1>
<p><?= $author['description'] ?></p>
<h2>Книги автора</h2>
<ul>
    <?php foreach ($books as $book) { ?>
        <li>
            <a href="author.php?id=<?= $book['id'] ?>"><?= $book['title'] ?></a>
        </li>
    <?php } ?>
</ul>