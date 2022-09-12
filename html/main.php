<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <div style="float: left;">
        <?php if ($auth_user) { ?>
            <p>Здравствуйте, <?= $auth_user['name'] ?></p>
        <?php } else { ?>
            <form name="auth" action="" method="POST">
                <h4>Вход на сайт</h4>
                <?php if ($error) { ?>
                    <p style="color: #c00;">Неверные логин или пароль</p>
                <?php } ?>
                <p>
                    <label>Логин:</label>
                    <input type="text" name="login">
                </p>
                <p>
                    <label>Пароль:</label>
                    <input type="password" name="password">
                </p>
                <p>
                    <input type="submit" name="auth" value="Войти на сайт">
                </p>
            </form>
        <?php } ?>
        <h4>Меню сайта</h4>
        <ul>
            <li><a href="/">Главная страница</a>
            </li>
            <li><a href="books.php">Книги</a>
            </li>
            <li> <a href="authors.php">Авторы</a>
            </li>
        </ul>
    </div>
    <div style="margin-left: 300px;"><?php require_once "html/$content.php"; ?></div>
</body>

</html>