<?php
require_once 'src/base.php';

header('HTTP/1.0 403 Forbiden');
$title = 'Нет прав доступа';
$content = '403';

require_once 'html/main.php';
