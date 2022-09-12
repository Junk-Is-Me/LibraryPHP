<?php

require_once "src/config.php";

function to404()
{
    header('Location: 404.php');
    exit;
}

$db = Database::getDBO();
$request = new Request();
require_once "src/auth.php";
