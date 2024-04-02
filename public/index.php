<?php

require_once '../config/db.php';
require_once '../controlers/ArticleController.php';
require_once '../controlers/AdminController.php';
global $db;



$action = new ArticleController($db);

$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':
        $login = new AdminController($db);
        $login->LogIn();
        break;
    case 'show':
        $action->show();
        break;
    case 'delete':
        $action->DeleteArticle();
        $action->show();
        break;
    case 'create':
        $action->createArticle();
        break;
    case 'view':
        $action->ViewArticle();
        break;
    case 'update':
        $action->UpdateArticle();
        break;

}
