<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?=$title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div style="float: left;">
        <?php if ($auth_user) { ?>
            <p>Здравствуйте, <?=$auth_user['name']?>!</p>
        <?php } else { ?>
            <form name="auth" action="" method="post">
                <h4>Вход на сайт</h4>
                <?php if ($error) { ?>
                    <p style="color: #c00;">Неверные логин и/или пароль!</p>
                <?php } ?>
                <p>
                    <label>Логин:</label>
                    <input type="text" name="login" />
                </p>
                <p>
                    <label>Пароль:</label>
                    <input type="password" name="password" />
                </p>
                <p>
                    <input type="submit" name="auth" value="Войти на сайт" />
                </p>
            </form>
        <?php } ?>
        <h4>Меню сайта</h4>
        <ul>
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
                <a href="books.php">Книги</a>
            </li>
            <li>
                <a href="authors.php">Авторы</a>
            </li>
            <?php if ($auth_user) { ?>
                <li>
                    <a href="mybooks.php">Мои книги</a>
                </li>
                <?php if ($auth_user['type'] >= LIBRARIAN) { ?>
                    <li>
                        <a href="debtors.php">Должники</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="?<?=http_build_query(array_merge($_GET, ['logout' => 1]))?>">Выход</a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div style="margin-left: 300px;"><?php require_once "html/$content.php";?></div>
</body>
</html>